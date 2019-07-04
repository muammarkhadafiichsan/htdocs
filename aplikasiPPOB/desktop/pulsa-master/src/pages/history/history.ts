import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { HistoryProvider } from '../../providers/history/history';
import { DomSanitizer } from '@angular/platform-browser';
import * as moment from 'moment';
import { DetailHistoryPage } from '../../pages/detail-history/detail-history';
/**
* Generated class for the HistoryPage page.
*
* See https://ionicframework.com/docs/components/#navigation for more info on
* Ionic pages and navigation.
*/

@IonicPage()
@Component({
	selector: 'page-history',
	templateUrl: 'history.html',
})
export class HistoryPage {
	variable: any = {how_to_show_data:'month'};
	datalogs: any = [];
	constructor(public navCtrl: NavController, public navParams: NavParams, private logs: HistoryProvider, private sanitize: DomSanitizer) {
		this.getHistory(true);
		// this.logsOnChange();
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad HistoryPage');
	}


    // settings
    getHistory = (params) =>
    {
        this.logs.getHistory(params)
        .then(data => {
	    	this.datalogs = [] // reset 

        	switch (this.variable.how_to_show_data) {
        		case "month":
			        	data.forEach((value, index)=>{
			        		let isValid = this.filtering_data(value.doc.created_at, moment().format('YYYY-MM-01'), moment().format('YYYY-MM-DD'))
			        		if(isValid)
			        		{
			        			value.doc.human_time = moment(value.doc.created_at).fromNow()
			        			this.datalogs.push(value);
			        		}
			        	})
        			
        			break;
        		case 'choose':
        			data.forEach((value, index)=>{
		        		let isValid = this.filtering_data(value.doc.created_at, this.variable.timeStarts, this.variable.timeEnd)
		        		if(isValid)
		        		{
		        			value.doc.human_time = moment(value.doc.created_at).fromNow()
		        			this.datalogs.push(value);
		        		}
		        	})
        			break
        		default:
        			data.forEach((value, index)=>{
	        			value.doc.human_time = moment(value.doc.created_at).fromNow()
	        			this.datalogs.push(value);
		        	})
        			// code...
        			break;
        	}
        	
        })
    }

    updateFilter(usingDate, searchWithDate)
    {
    	if(!usingDate)
    	{
	    	this.getHistory(true);
    	}

    	if(usingDate && searchWithDate)
    	{
	    	this.getHistory(true);
    	}
    }

    filtering_data(date, start, end)
    {
    	let mdate = moment(date, 'YYYY-MM-DD');
    	if(mdate.isValid())
    	{
	    	return mdate.isBetween(start, end, null, '[]');
    	}
    	return false;
    }

    logsOnChange()
    {
        this.logs.db.changes({ live: true, since: 'now', include_docs: true})
        .on('change', this.getHistory);
    }

    sanitizeImage(url)
	{
		return this.sanitize.bypassSecurityTrustUrl(url)
	}

	openHistory(item:any)
	{ 
		this.navCtrl.push(DetailHistoryPage, {id: item.id})
	}

}
