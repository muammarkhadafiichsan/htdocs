import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, ToastController, AlertController } from 'ionic-angular';
import { SmscenterProvider } from '../../providers/smscenter/smscenter'
import { SettingsProvider } from '../../providers/settings/settings';
import { CstorageProvider } from '../../providers/cstorage/cstorage';
import { OpencontactPage } from '../../pages/opencontact/opencontact';

/**
* Generated class for the SmscenterPage page.
*
* See https://ionicframework.com/docs/components/#navigation for more info on
* Ionic pages and navigation.
*/

@IonicPage()
@Component({
	selector: 'page-smscenter',
	templateUrl: 'smscenter.html',
})
export class SmscenterPage {
	dataSmsCenter:any = {}
	dataSmsCenterList = []
	datasetting_smscenter: any = {}
	constructor(public navCtrl: NavController, public navParams: NavParams, private storage: CstorageProvider,  public smsProvider: SmscenterProvider, public loadingCtrl: LoadingController, public toast: ToastController, public alertCtrl: AlertController, private settings: SettingsProvider) {
		this.settings.fetchSetting('sms_center_default')
		.then((res) => {
			this.datasetting_smscenter = res;
			if(this.navParams.get('isNew') == 1)
			{
				
			}else{
				let _id = this.navParams.get('_id');
				this.smsProvider.fetchContact(_id)
				.then(
						(data) => {
							this.dataSmsCenter = data;
							this.dataSmsCenter.is_default = this.dataSmsCenter._id == this.datasetting_smscenter.value? true : false
						}
					)

			}
		})

	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad SmscenterPage');
	}
	ionViewWillEnter() {
		this.storage.getItem('contact')
        .then((data)=>{
        	console.log(data)
            this.dataSmsCenter.name_contact = data.contact._objectInstance.displayName;
            this.dataSmsCenter.number_contact = data.q;
            this.storage.removeItem('contact')
        })        
        .catch((error)=>{
            console.log(error)
        })  
		console.log('ionViewDidLoad SmscenterPage');
	}

	removeContact()
	{
		if(!this.dataSmsCenter._id)
		{
			return false;
		}
		let loading = this.loadingCtrl.create({
  		content: `
	  			<div class="custom-spinner-container">
		        	<div class="custom-spinner-box"></div>
		      	</div>
	  		`,
	  	});
	  	let ToastRemove = this.toast.create({
	  		message: "Kontak berhasil dihapus",
	  		duration: 3000,

	  	});
	  	let alert = this.alertCtrl.create({
	  		title: "Hapus kontak ini?",
	  		message: "Apakah anda yakin ingin menghapus kontak ini?",
	  		buttons: [
	  			{
	  				text: "Batalkan",
	  				role: "cancel",
	  				handler: () => {
	  					// do nothing
	  				}
	  			},
	  			{
	  				text: "Hapus",
	  				handler: () => {
	  					loading.present();
	  					this.smsProvider.removeContact(this.dataSmsCenter._id, this.dataSmsCenter._rev)
	  					.then(
	  							() => {
	  								loading.dismiss();
	  								ToastRemove.present();
	  								this.navCtrl.pop();
	  							},
	  							() => 
	  							{
	  							}
	  						)
	  				}
	  			}
	  		]
	  	});

	  	alert.present();

	}
	actionSmsCenter()
	{
		let load = this.loadingCtrl.create({
			content: `
	  			<div class="custom-spinner-container">
		        	<div class="custom-spinner-box"></div>
		      	</div>
  			`,
		})
		load.present();

		if(this.navParams.get('isNew') == 1)
		{
			let isDefault = this.dataSmsCenter.is_default;
		  	delete this.dataSmsCenter.is_default;
			this.smsProvider.addContact(this.dataSmsCenter)
			.then(
					(data) => {
						console.log(data, this.dataSmsCenter)
						if(isDefault == true)
						{
							this.datasetting_smscenter.value = data.id;
							this.settings.updateSetting(this.datasetting_smscenter)
						}
						let ToastCreate = this.toast.create({
					  		message: "Contact SMS Server telah berhasil ditambahkan",
					  		duration: 3000,

					  	});
					  	ToastCreate.present();
					  	load.dismiss();
						this.navCtrl.pop();
					}
				)
		}else{
			let ToastUpdate = this.toast.create({
		  		message: "Contact SMS Server telah berhasil diperbarui",
		  		duration: 3000,

		  	});
		  	let isDefault = this.dataSmsCenter.is_default;
		  	delete this.dataSmsCenter.is_default;
			this.smsProvider.updateContact(this.dataSmsCenter)
			.then(
					(data) => {
						console.log(data, this.dataSmsCenter)
						if(isDefault == true)
						{
							this.datasetting_smscenter.value = data.id;
							this.settings.updateSetting(this.datasetting_smscenter)
						}
						ToastUpdate.present();
					  	load.dismiss();
						this.navCtrl.pop();
					}
				)

		}
	}

	openContact()
    {     
        this.navCtrl.push(OpencontactPage);    
    }

}
