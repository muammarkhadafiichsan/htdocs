import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams,LoadingController, AlertController } from 'ionic-angular';
import { Contacts, Contact, ContactField, ContactName, ContactFieldType, ContactFindOptions } from '@ionic-native/contacts';
import { DomSanitizer } from '@angular/platform-browser';
import { CstorageProvider } from '../../providers/cstorage/cstorage';


/**
* Generated class for the OpencontactPage page.
*
* See https://ionicframework.com/docs/components/#navigation for more info on
* Ionic pages and navigation.
*/

@IonicPage()
@Component({
	selector: 'page-opencontact',
	templateUrl: 'opencontact.html',
})
export class OpencontactPage {

	contactLists:any = [];
	contactListsFilter:any = [];
	constructor(public navCtrl: NavController, private storage: CstorageProvider, public navParams: NavParams, private contacts: Contacts, private loadingCtrl: LoadingController, private alertCtrl: AlertController, private sanitize: DomSanitizer) {
		this.getContact();
	}

	getContact()
	{
		let loading = this.loadingCtrl.create({
	  		content: `
	  			<div class="custom-spinner-container">
		        	<div class="custom-spinner-box"></div>
		        	Mengambil Kontak
		      	</div>
	  		`,
	  	});

	  	loading.present();
		
		this.contacts.find(["*"], {filter: "", multiple: true})
		.then(data=>{
			loading.dismiss();
			console.log(data)
			this.contactLists = data;
			this.contactListsFilter = data;
		})
		.catch(error=>{
			let alert = this.alertCtrl.create({
				title: "Kesalahan",
	  			message: "Terdapat kesalahan ketika mengambil kontak. Silahkan coba kembali",
	  			buttons: ["Ok"]
			});

			alert.present();

			console.log(error)
			loading.dismiss();
		})
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad OpencontactPage');
	}

	sanitizeImage(url)
	{
		return this.sanitize.bypassSecurityTrustUrl(url)
	}

	filterContact(ev: any)
	{
		let val = ev.target.value;

		if(val && val.trim() != '')
		{
			this.contactListsFilter = this.contactLists.filter((item) => {
				return (item.displayName.indexOf(val) > -1 || (item.phoneNumbers && item.phoneNumbers.indexOf(val) > -1) )
			})
		}else
		{
			this.contactListsFilter = this.contactLists;
		}

		console.log(val, this.contactListsFilter)
	}

	selectedContact(item:any)
	{
		let prev = this.navCtrl.getPrevious()
		if(!item.phoneNumbers)
		{
			let alert = this.alertCtrl.create({
				title: "Kesalahan",
	  			message: "Kontak yang anda pilih tidak memiliki nomor telephone. Silahkan pilih yang lain.",
	  			buttons: ["Ok"]
			});
			alert.present();
			return false;
		}

		if(item.phoneNumbers.length > 1)
		{
			let alert = this.alertCtrl.create();
			alert.setTitle("Pilih nomor");

			let dataInput:any = [];
			item.phoneNumbers.forEach((value, index)=>{
				alert.addInput({
					type: 'radio',
					label: value.value,
					value: value.value,
				});
			});
			alert.addButton('Batal');
		    alert.addButton({
		        text: 'Lanjutkan',
		        handler: (data) => {
		        	if(!data)
		        	{
		        		return false;
		        	}
					let params = {q: data, from_contact: true, id_contact: item.id, contact: item}
					this.storage.setItem('contact', params)
					.then(()=>{
						this.navCtrl.pop()
					})
					.catch((error)=>{
						console.log(error)
					})
		        }
		      });
		    alert.present();
		}else
		{

			let params = {q: item.phoneNumbers[0].value, from_contact: true, id_contact: item.id, contact: item}
			this.storage.setItem('contact', params)
			.then(()=>{
				this.navCtrl.pop()
			})
		}
	}
}
