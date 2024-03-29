import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AppRoutingModule } from '../app-routing.module';

import { SearchComponent } from './search.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { CardComponent } from '../shared/card/card.component';
import { SharedModule } from '../shared/shared.module';



@NgModule({
    declarations: [
        SearchComponent,
    ],
    imports: [
        CommonModule,
        AppRoutingModule,
        FormsModule,
        ReactiveFormsModule,
        SharedModule

    ],
    exports: [
        SearchComponent
    ],
})
export class SearchModule { }
