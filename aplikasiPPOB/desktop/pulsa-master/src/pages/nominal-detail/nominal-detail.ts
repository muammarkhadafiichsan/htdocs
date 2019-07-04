import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController, LoadingController, ToastController } from 'ionic-angular';
import { NominalProvider } from '../../providers/nominal/nominal';

/**
 * Generated class for the NominalDetailPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-nominal-detail',
  templateUrl: 'nominal-detail.html',
})
export class NominalDetailPage {
	datanominal : any = {};
	private _id: String;

  constructor(public navCtrl: NavController, public navParams: NavParams, public nominalProvider:NominalProvider, public alertCtrl: AlertController, public loadingCtrl: LoadingController, public toast: ToastController) {
  	this._id = navParams.get('_id');
  	nominalProvider.db.get(this._id)
  	.then(
  			res=>{
  				console.log(res)
  				this.datanominal = res;
  			}
  		)
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad NominalDetailPage');
  }

  updateNominal()
  {

  	this.nominalProvider.updateNominal(this.datanominal)
  	.then(function (response) {
  		console.log(response)
	  // handle response
	}).catch(function (err) {
	  console.log(err);
	});
  } 

  removeNominal()
  {
  	let loading = this.loadingCtrl.create({
  		content: `
  			<div class="custom-spinner-container">
	        	<div class="custom-spinner-box"></div>
	      	</div>
  		`,
  	});
  	let ToastRemove = this.toast.create({
  		message: "Nominal berhasil dihapus",
  		duration: 3000,

  	});
  	let alert = this.alertCtrl.create({
  		title: "Hapus Nominal ini?",
  		message: "Apakah anda yakin ingin menghapus data nominal ini?",
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
  					this.nominalProvider.removeNominal(this.datanominal._id, this.datanominal._rev)
  					.then(
  							() => {
  								loading.dismiss();
  								ToastRemove.present();
  								this.navCtrl.pop();
  							},
  							() => 
  							{
  								this.showAlertRemoveFail();
  							}
  						)
  				}
  			}
  		]
  	});

  	alert.present();
  }

  showAlertRemoveFail = () =>
  {
  	let alert = this.alertCtrl.create({
  		title: "Menghapus nominal gagal",
  		message: "Terdapat kesalahan saat menghapus nominal. Silahkan coba kembali.",
  		buttons: ['Tutup']
  	})
  }

}
