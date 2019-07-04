import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams,  LoadingController, ToastController } from 'ionic-angular';
import { NominalProvider } from '../../providers/nominal/nominal';

/**
 * Generated class for the NominalPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-nominal',
  templateUrl: 'nominal.html',
})
export class NominalPage {
	datanominal : any = {is_default: false};

  constructor(public navCtrl: NavController, public navParams: NavParams,  public nominalProvider: NominalProvider, public loadingCtrl: LoadingController, public toast: ToastController) {
    console.log('ionViewDidLoad NominalPage');
  }

  ionViewDidLoad() {
  }

  simpanNominal()
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
  		message: "Nominal berhasil ditambahkan",
  		duration: 3000,

  	});

  	this.nominalProvider.addNominal(this.datanominal)
  	.then((response) => {

	  	ToastNotif.present();
	  	loading.dismiss();
	  	this.navCtrl.pop();
	  // handle response
	}).catch(function (err) {
	  console.log(err);
	});
  } 
}
