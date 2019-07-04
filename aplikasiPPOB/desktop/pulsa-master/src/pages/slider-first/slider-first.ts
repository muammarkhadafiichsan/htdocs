import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { SettingsPage } from '../../pages/settings/settings';
import { CstorageProvider } from '../../providers/cstorage/cstorage';
import { SettingsProvider } from '../../providers/settings/settings';
import PouchDB from 'pouchdb';  

/**
 * Generated class for the SliderFirstPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-slider-first',
  templateUrl: 'slider-first.html',
})
export class SliderFirstPage {

  constructor(public navCtrl: NavController, public navParams: NavParams, public storage: CstorageProvider, private settings: SettingsProvider) {
  	this.navCtrl = navCtrl;

  }

  slides = [
    {
      title: "Selamat datang di Pulsaku!",
      description: "Sebuah layanan yang akan membantu bisnis pulsa anda berkembang lebih besar",
      image: "assets/imgs/ica-slidebox-img-1.png",
    },
    {
      title: "Apa itu pulsaku?",
      description: "Pulsaku adalah layanan aplikasi yang akan membantu manajemen bisnis pulsa anda mulai dari keuangan, pengiriman SMS, dan pengingat hutang costumer",
      image: "assets/imgs/ica-slidebox-img-2.png",
    },
    {
      title: "Apa saja layanan yang saya dapatkan?",
      description: "Aplikasi <b>Pulsaku</b> akan membantu anda dalam pengiriman pulsa, manajemen keuangan sampai dengan pengingat untuk costumer yang belum lunas dalam pembelian pulsa.",
      image: "assets/imgs/ica-slidebox-img-3.png",
    }
  ];

  gotoHomePage()
  {
      new PouchDB('history.db');
      new PouchDB('nominal.db');
      new PouchDB('smscenter.db');
      this.settings.initializeDBFirstTime();
      
      this.storage.setIsFirstTime(true)
      this.navCtrl.setPages([{page: SettingsPage}])

  }
}
