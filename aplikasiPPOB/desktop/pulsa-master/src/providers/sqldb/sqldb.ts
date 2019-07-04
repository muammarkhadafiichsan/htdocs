import { Injectable } from '@angular/core';
import { SQLite, SQLiteObject } from '@ionic-native/sqlite';
/*
  Generated class for the SqldbProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class SqldbProvider {

  constructor(public sqlite: SQLite) {

    console.log('Hello SqldbProvider Provider');
  }

  initializeDatabase()
  {
  	this.sqlite.create({
  		name: 'ai_pulsaku.db',
  		location: 'default',
  	})
  	.then(
  			(db: SQLiteObject) =>
  			{
  				db.executeSql('CREATE TABLE nominal(id_nominal INT PRIMARY KEY NOT NULL AUTO_INCREMENT, nominal text, default_price text)', {})
  			}
  		)
  }

}
