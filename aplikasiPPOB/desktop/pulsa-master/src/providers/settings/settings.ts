import { Injectable } from '@angular/core';
import PouchDB from 'pouchdb';  

/*
  Generated class for the SettingsProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class SettingsProvider {

  constructor() {
		this.initDB();
	}

	public db;
	private _nominal;

	initDB()
	{
		this.db = new PouchDB('settings.db')
		
	}

	initializeDBFirstTime()
	{
		this.db.get('compose')
		.then((data)=>{
		})
		.catch((err) => {
			this.updateSetting({_id: 'compose', value: ':nomor :nominal :pin'})
		})

		this.db.get('pin')
		.then((data)=>{
		})
		.catch((err) => {
			this.updateSetting({_id: 'pin', value: ''})
		})

		this.db.get('isFirstTime')
		.then((data)=>{
		})
		.catch((err) => {
			this.updateSetting({_id: 'isFirstTime', value: false}) // false because this records initialize after slider page
		})

		this.db.get('sms_center_default')
		.then((data)=>{
		})
		.catch((err) => {
			this.updateSetting({_id: 'sms_center_default', value: ''})
		})

	}
	
	addSetting(data)
	{
		return this.db.post(data)
	}	
	updateSetting(data)
	{
		return this.db.put(data)
	}
	removeSetting(_id, _rev)
	{
		return this.db.remove(_id, _rev);
	}
	fetchSetting(_id)
	{
		return this.db.get(_id)
	}
	getSetting(force)
	{
		if(!this._nominal || force)
		{
			return this.db.allDocs({include_docs: true})
			.then(docs => {
				this._nominal = docs.rows;
				return this._nominal;
			})
		}else
		{
			return Promise.resolve(this._nominal);
		}
	}

	changeComposeData(data, compose)
	{
		for(const i in data)
		{
			let pattern = ':'+i;
            var reg = new RegExp(pattern, 'g');
            var value = (data[i])? data[i] : '';
            compose = compose.replace(reg, value);
		}
		return compose;
	}

}
