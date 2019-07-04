import { Component } from '@angular/core';
import { NavController, NavParams, LoadingController, ToastController, AlertController } from 'ionic-angular';
import { CstorageProvider } from '../../providers/cstorage/cstorage';
import { SliderFirstPage } from '../../pages/slider-first/slider-first';
import { OpencontactPage } from '../../pages/opencontact/opencontact';
import { DetailHistoryPage } from '../../pages/detail-history/detail-history';

import { NominalProvider } from '../../providers/nominal/nominal';
import { SmscenterProvider } from '../../providers/smscenter/smscenter';
import { SettingsProvider } from '../../providers/settings/settings';
import { HistoryProvider } from '../../providers/history/history';

import { SMS } from '@ionic-native/sms';

import * as moment from 'moment';

@Component({
    selector: 'page-home',
    templateUrl: 'home.html'
})
export class HomePage {


    nominalList = []
    smsCenterList = []
    settingsList:any = []
    credit:any ={}
    dataContact:any ={} // will filled if you use contact

    constructor(public navCtrl: NavController, public navParams: NavParams, private storage: CstorageProvider, public nominalProvider:NominalProvider, public smsCenter: SmscenterProvider, private sms: SMS, private settings: SettingsProvider, private alertCtrl: AlertController, public loadingCtrl: LoadingController, public toast: ToastController, private log: HistoryProvider) {

    }

    ionViewWillEnter()
    {
        console.log('enter')
        this.settings.fetchSetting('isFirstTime')
        .then(
        (data) => {
            console.log(data)
            if(data.value == true)
            {
                this.navCtrl.setPages([{page: SliderFirstPage}])
            }else
            {
                this.getSettings(true);
                this.getNominal(true);
                this.getSMSCenter(true);

                this.nominalOnChange();
                this.smsCenterOnChange();
                this.settingsOnChange();      
                this.storage.getItem('contact')
                .then((data)=>{

                    this.credit.number = data.q;
                    this.dataContact = data;
                    this.storage.removeItem('contact')
                })        
                .catch((error)=>{
                    console.log(error)
                })  
            }
        },
        (error) =>{
            console.log(error)
            this.navCtrl.setPages([{page: SliderFirstPage}])
        });
    }


    getNominal = (params) =>
    {
        this.nominalProvider.getNominal(params)
        .then(data => {
            data.forEach((value, index)=>{
                let moneyFormat = parseInt(value.doc.nominal_value).toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, '$1.');
                data[index].doc.nominal_value_rupiah = moneyFormat.substring(0, moneyFormat.length-2)
            })
            this.nominalList = data;
        })
    }

    nominalOnChange()
    {
        this.nominalProvider.db.changes({ live: true, since: 'now', include_docs: true})
        .on('change', this.getNominal);
    }

    // end Nominal
    

    // smsCenter
    getSMSCenter = (params) =>
    {
        this.smsCenter.getContact(params)
        .then(data => {
            this.smsCenterList = data;
        })
    }

    smsCenterOnChange()
    {
        this.smsCenter.db.changes({ live: true, since: 'now', include_docs: true})
        .on('change', this.getSMSCenter);
    }

    // end smscenter

    // settings
    getSettings = (params) =>
    {
        this.settings.getSetting(params)
        .then(data => {
            data.forEach((value, index)=>{
                this.settingsList[value.doc._id] = value.doc.value
            })
            this.credit.smscenter = this.settingsList.sms_center_default
        })
    }

    settingsOnChange()
    {
        this.settings.db.changes({ live: true, since: 'now', include_docs: true})
        .on('change', this.getSettings);
    }

    // end settings

    openContact()
    {     
        this.navCtrl.push(OpencontactPage);    
    }
    sendMessageCredit = ()=>
    {
        if(!this.credit.number || this.credit.number == '' || !this.credit.nominal || this.credit.nominal == '')
        {
            let alert = this.alertCtrl.create({
              title: 'kesalahan',
              subTitle: 'Silahkan lengkapi data masukan.',
              buttons: ['OK']
            });
            alert.present();
            return false;
        }
        let loading = this.loadingCtrl.create({
          content: `
              <div class="custom-spinner-container">
                <div class="custom-spinner-box"></div>
              </div>
              Mengirim Pesan. Silahkan tunggu
          `,
      });
      loading.present();
      let ToastNotif = this.toast.create({
          message: "Pesan berhasil dikirim",
          duration: 3000,

      });
        let nominal:any = {};
        let smscenter;
        let pin;
        this.nominalList.forEach((value, index)=>{
            if(value.doc._id == this.credit.nominal)
            {
                nominal = value.doc
                // nominal[] = value.doc.nominal_value;
            }
        });

        this.smsCenterList.forEach((value, index)=>{
            if(value.doc._id == this.credit.smscenter)
            {
                smscenter = value.doc.number_contact;
            }
        });
        let data = {
            nomor: this.credit.number,
            nominal: nominal.nominal_value,
            pin: this.settingsList.pin,
            kode: nominal.code
        }

        // console.log(nominal, smscenter, this.credit, this.settingsList);
        let msg = this.settings.changeComposeData(data, this.settingsList.compose)
        // console.log(data, msg)
        // send message
        this.sms.send(smscenter, msg)
        .then(()=>{
            console.log(this.dataContact._objectInstance)
            this.log.addHistory({
                credit_detail: this.credit,
                nominal_detail: nominal,
                data_sender: data,
                message: msg,
                sms_center: smscenter,
                created_at: moment().format(),
                contact: Object.keys(this.dataContact).length > 0 ? this.dataContact.contact._objectInstance : {},
                is_contact: Object.keys(this.dataContact).length > 0 ? true : false,
                status: 'lunas',
                pembayaran:[],
                total_dibayarkan: 0
            })
            .then((data)=>{
                this.dataContact = {}
                loading.dismiss();
                ToastNotif.present();
                this.navCtrl.push(DetailHistoryPage, {id: data.id})
            })
        })


            

        // add to history

    }
}
