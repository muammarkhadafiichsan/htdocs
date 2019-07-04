import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, ToastController } from 'ionic-angular';
import { NominalPage } from '../../pages/nominal/nominal';
import { SmscenterPage } from '../../pages/smscenter/smscenter';
import { NominalDetailPage } from '../../pages/nominal-detail/nominal-detail';
import { NominalProvider } from '../../providers/nominal/nominal';
import { SmscenterProvider } from '../../providers/smscenter/smscenter';
import { SettingsProvider } from '../../providers/settings/settings';

/**
* Generated class for the SettingsPage page.
*
* See https://ionicframework.com/docs/components/#navigation for more info on
* Ionic pages and navigation.
*/

@IonicPage()
@Component({
	selector: 'page-settings',
	templateUrl: 'settings.html',
})
export class SettingsPage {
	settingsTab: string = 'nominal';
	nominalList = []
	smsCenterList = []
	datasettings:any = {}
	datasettings_ori:any = {}
	constructor(public navCtrl: NavController, public navParams: NavParams, public nominalProvider:NominalProvider, public smsCenter: SmscenterProvider, public settingsProvider: SettingsProvider, public loadingCtrl: LoadingController, public toast: ToastController, ) {

		this.getNominal(true);
		this.getSMSCenter(true);
		this.getSettings(true);

		this.nominalOnChange();
		this.smsCenterOnChange();
		this.settingsOnChange();
	}
	ionViewDidLoad() {
		this.nominalProvider.getNominal(true)
		.then(function(data){
		})
	}

	// page
	addNominal()
	{
		this.navCtrl.push(NominalPage)
	}

	openDetailNominal(item)
	{
		this.navCtrl.push(NominalDetailPage, {_id:item._id})
	}

	openNumberPanel(docs)
	{
		console.log(docs)
		if(docs == false)
		{
			this.navCtrl.push(SmscenterPage, {isNew: 1})
		}else{
			
			this.navCtrl.push(SmscenterPage, {isNew: 0, _id: docs._id})
		}
	}
	// end page

	// nominal

	getNominal = (params) =>
	{
		this.nominalProvider.getNominal(params)
		.then(data => {
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

	// settings
    getSettings = (params) =>
    {
        this.settingsProvider.getSetting(params)
        .then(data => {
            data.forEach((value, index)=>{
            	this.datasettings_ori[value.doc._id] = value;
                this.datasettings[value.doc._id] = value.doc.value
            })
        })
    }

    settingsOnChange()
    {
        this.settingsProvider.db.changes({ live: true, since: 'now', include_docs: true})
        .on('change', this.getSettings);
    }

	// end nominal

	updateSetting(name)
	{
		let loading = this.loadingCtrl.create({
	  		content: `
	  			<div class="custom-spinner-container">
		        	<div class="custom-spinner-box"></div>
		      	</div>
	  		`,
	  	});
	  	loading.present();
	  	let ToastNotif = this.toast.create({
	  		message: "Setting berhasil diperbarui",
	  		duration: 3000,

	  	});

		let data = {_id: name, value: this.datasettings[name], _rev: this.datasettings_ori[name].doc._rev}
		console.log(data, name)
		this.settingsProvider.updateSetting(data)
		.then(()=>{
		  	loading.dismiss();
		  	ToastNotif.present();
		})

	}
}
