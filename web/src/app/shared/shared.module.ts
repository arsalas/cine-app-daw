import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CardComponent } from './card/card.component';
import { NavbarComponent } from './navbar/navbar.component';
import { AppRoutingModule } from '../app-routing.module';

import { FormsModule, ReactiveFormsModule } from '@angular/forms'


@NgModule({
    declarations: [
        CardComponent,
        NavbarComponent
    ],
    imports: [
        CommonModule,
        AppRoutingModule,
        FormsModule,
        ReactiveFormsModule,
    ],
    exports: [
        CardComponent,
        NavbarComponent,
    ]
})
export class SharedModule { }
