import { Component }  from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, ToastController, AlertController } from 'ionic-angular';
import { HistoryProvider } from '../../providers/history/history';
import * as moment from 'moment';
import { DomSanitizer } from '@angular/platform-browser';

/**
* Generated class for the DetailHistoryPage page.
*
* See https://ionicframework.com/docs/components/#navigation for more info on
* Ionic pages and navigation.
*/

@IonicPage()
@Component({
	selector: 'page-detail-history',
	templateUrl: 'detail-history.html',
})
export class DetailHistoryPage {
	datahistory:any = {contact:{_objectInstance:{displayName:'', photos: undefined}}, credit_detail: {}, nominal_detail:{}}
	variables:any = {settingsTab:'dashboard'}
	constructor(public navCtrl: NavController, public navParams: NavParams, private logs: HistoryProvider, private sanitize: DomSanitizer, public loadingCtrl: LoadingController, public toast: ToastController, public alertCtrl: AlertController) {
		
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad DetailHistoryPage');
		var id = this.navParams.get('id');
		this.logs.fetchHistory(id)
		.then((data) => {
			console.log(data)
			this.variables.avatar = !data.contact._objectInstance || !data.contact._objectInstance.photos ? false : true
			this.datahistory = data;
		});
	}
	ionViewWillEnter() {
		
	}

	sanitizeImage(url)
	{
		return this.sanitize.bypassSecurityTrustUrl(url)
	}

	get_history(id)
	{
		
	}

	readable_time(time)
	{
		return moment(time).fromNow()
	}

	statusOnChange()
	{
		console.log(this.datahistory.status)
		switch (this.datahistory.status) {
			case "lunas":
			case "hutang":
				// code...
				this.updateHistory();
				break;

			case "cicil":
				let alert = this.alertCtrl.create({
					title: 'Jumlah cicilan',
				    inputs: [
				      {
				        name: 'cicilan',
				        placeholder: 'Jumlah Cicilan',
				        type: 'number'
				      }
				    ],
				    buttons: ['Batal',
				      {
				        text: 'Simpan',
				        handler: data => {
				          this.datahistory.pembayaran.push({jumlah: data.cicilan, pada: moment().format("YYYY-MM-DD")});
				          this.updateHistory();
				        }
				      }
				    ]
				});
				alert.present();
				break;
			
			default:
				this.updateHistory();
				break;
		}
	}

	updateHistory()
	{
		console.log(this.datahistory)
		this.logs.updateHistory(this.datahistory)
		.then((data) => {
			let ToastNotif = this.toast.create({
		  		message: "Status berhasil diubah",
		  		duration: 3000,
		  	});
		  	ToastNotif.present();	
		});
				
	}
}
