import { Injectable } from '@angular/core';
import { NativeStorage } from '@ionic-native/native-storage';

/*
  Generated class for the CstorageProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class CstorageProvider {

  constructor(public nativeStorage: NativeStorage) {
    console.log('Hello CstorageProvider Provider');
  }

  setItem(name, value)
  {
    return this.nativeStorage.setItem(name, value)
  }

  getItem(name)
  {
    return this.nativeStorage.getItem(name)
  }

  removeItem(name)
  {
    return this.nativeStorage.remove(name)
  }

  isFirstTime()
  {
  	return this.nativeStorage.getItem('isFirstTime')
  }

  setIsFirstTime(params)
  {
  	this.nativeStorage.setItem('isFirstTime', params)
  }

}
