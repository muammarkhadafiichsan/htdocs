import { Injectable } from '@angular/core';
import PouchDB from 'pouchdb';  
/*
Generated class for the NominalProvider provider.

See https://angular.io/guide/dependency-injection for more info on providers
and Angular DI.
*/
@Injectable()
export class NominalProvider {
	public db;
	private _nominal;
	constructor() {
		this.initDB();
	}

	initDB()
	{
		this.db = new PouchDB('nominal.db')
	}
	setNominalRecords(records)
	{
		this._nominal = records
	}
	getNominalRecords()
	{
		return this._nominal
	}
	onDatabaseChange(change)
	{
	}
	addNominal(data)
	{
		return this.db.post(data)
	}	
	updateNominal(data)
	{
		return this.db.put(data)
	}
	removeNominal(_id, _rev)
	{
		return this.db.remove(_id, _rev);
	}
	getNominal(force)
	{
		if(!this._nominal || force)
		{
			return this.db.allDocs({include_docs: true,descending:true})
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
