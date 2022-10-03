import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CardComponent } from './card/card.component';
import { NavbarComponent } from './navbar/navbar.component';
import { AppRoutingModule } from '../app-routing.module';



@NgModule({
    declarations: [
        CardComponent,
        NavbarComponent
    ],
    imports: [
        CommonModule,
        AppRoutingModule,
    ],
    exports: [
        CardComponent,
        NavbarComponent,
    ]
})
export class SharedModule { }
