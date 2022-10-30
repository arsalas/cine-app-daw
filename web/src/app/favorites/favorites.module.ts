import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AppRoutingModule } from '../app-routing.module';

import { FavoritesComponent } from './favorites.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { CardComponent } from '../shared/card/card.component';
import { SharedModule } from '../shared/shared.module';



@NgModule({
    declarations: [
        FavoritesComponent,
    ],
    imports: [
        CommonModule,
        AppRoutingModule,
        FormsModule,
        ReactiveFormsModule,
        SharedModule

    ],
    exports: [
        FavoritesComponent
    ],
})
export class FavoritesModule { }
