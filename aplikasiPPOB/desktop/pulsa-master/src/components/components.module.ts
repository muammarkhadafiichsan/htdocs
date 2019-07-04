import { NgModule } from '@angular/core';
import { HistoryComponent } from './history/history';
import { CStoragesComponent } from './c-storages/c-storages';
@NgModule({
	declarations: [HistoryComponent,
    CStoragesComponent],
	imports: [],
	exports: [HistoryComponent,
    CStoragesComponent]
})
export class ComponentsModule {}
