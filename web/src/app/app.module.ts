import { HttpClientModule } from '@angular/common/http';
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { FormsModule, ReactiveFormsModule } from '@angular/forms'

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AuthComponent } from './auth/auth.component';
import { MovieComponent } from './movie/movie.component';
import { SharedModule } from './shared/shared.module';
import { SearchModule } from './search/search.module';
import { HomeModule } from './home/home.module';



@NgModule({
    declarations: [
        AppComponent,
        AuthComponent,
        MovieComponent,
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        HttpClientModule,
        FormsModule,
        ReactiveFormsModule,
        SharedModule,
        HomeModule,
        SearchModule,
    ],
    exports: [
        AppComponent
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule { }
