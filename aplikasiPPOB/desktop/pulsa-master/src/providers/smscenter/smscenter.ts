import { Injectable } from '@angular/core';
import PouchDB from 'pouchdb';  

/*
Generated class for the SmscenterProvider provider.

See https://angular.io/guide/dependency-injection for more info on providers
and Angular DI.
*/
@Injectable()
export class SmscenterProvider {

	constructor() {
		this.initDB();
	}

	public db;
	private _nominal;

	initDB()
	{
		this.db = new PouchDB('smscenter.db');
	}
	
	addContact(data)
	{
		return this.db.post(data)
	}	
	updateContact(data)
	{
		return this.db.put(data)
	}
	removeContact(_id, _rev)
	{
		return this.db.remove(_id, _rev);
	}
	fetchContact(_id)
	{
		return this.db.get(_id)
	}
	getContact(force)
	{
		if(!this._nominal || force)
		{
			return this.db.allDocs({include_docs: true, descending: true})
			.then(docs => {
				this._nominal = docs.rows;
				return this._nominal;
			})
		}else
		{
			return Promise.resolve(this._nominal);
		}
	}
}
