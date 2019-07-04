import { Component } from '@angular/core';

/**
 * Generated class for the CStoragesComponent component.
 *
 * See https://angular.io/api/core/Component for more info on Angular
 * Components.
 */
@Component({
  selector: 'c-storages',
  templateUrl: 'c-storages.html'
})
export class CStoragesComponent {

  text: string;

  constructor() {
    console.log('Hello CStoragesComponent Component');
    this.text = 'Hello World';
  }

  

}
