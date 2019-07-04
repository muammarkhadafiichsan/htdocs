import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { ChartsModule } from 'ng2-charts';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { HistoryPage } from '../pages/history/history';
import { SettingsPage } from '../pages/settings/settings';
import { SliderFirstPage } from '../pages/slider-first/slider-first';
import { NominalPage } from '../pages/nominal/nominal';
import { NominalDetailPage } from '../pages/nominal-detail/nominal-detail';
import { OpencontactPage } from '../pages/opencontact/opencontact';

import { SmscenterPage } from '../pages/smscenter/smscenter';
import { DetailHistoryPage } from '../pages/detail-history/detail-history';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { NativeStorage } from '@ionic-native/native-storage';
import { SQLite } from '@ionic-native/sqlite';
import { SMS } from '@ionic-native/sms';
import { Contacts } from '@ionic-native/contacts'

import { CstorageProvider } from '../providers/cstorage/cstorage';
import { SqldbProvider } from '../providers/sqldb/sqldb';
import { NominalProvider } from '../providers/nominal/nominal';
import { SmscenterProvider } from '../providers/smscenter/smscenter';
import { SettingsProvider } from '../providers/settings/settings';
import { HistoryProvider } from '../providers/history/history';


@NgModule({
  declarations: [
    MyApp,
    HomePage,
    HistoryPage,
    SettingsPage,
    SliderFirstPage,
    NominalPage,
    NominalDetailPage,
    SmscenterPage,
    OpencontactPage,
    DetailHistoryPage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp),
    ChartsModule
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    HistoryPage,
    SettingsPage,
    SliderFirstPage,
    NominalPage,
    NominalDetailPage,
    SmscenterPage,
    OpencontactPage,
    DetailHistoryPage
    
  ],
  providers: [
    StatusBar,
    SplashScreen,
    NativeStorage,
    SQLite,
    SMS,
    Contacts,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    CstorageProvider,
    SqldbProvider,
    NominalProvider,
    SmscenterProvider,
    SettingsProvider,
    HistoryProvider,
  ]
})
export class AppModule {}
