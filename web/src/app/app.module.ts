import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
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
import { LoginComponent } from './auth/login/login.component';
import { AuthInterceptor } from 'src/helpers/interceptor';
import { SigninComponent } from './auth/signin/signin.component';
import { ProfileComponent } from './profile/profile.component';
import { FavoritesComponent } from './favorites/favorites.component';
import { FavoritesModule } from './favorites/favorites.module';


@NgModule({
    declarations: [
        AppComponent,
        AuthComponent,
        MovieComponent,
        LoginComponent,
        SigninComponent,
        ProfileComponent,
        // FavoritesComponent
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
        // FavoritesModule
    ],
    exports: [
        AppComponent
    ],
    providers: [
        {
            provide: HTTP_INTERCEPTORS,
            useClass: AuthInterceptor,
            multi: true,
        }
    ],
    bootstrap: [AppComponent]
})
export class AppModule { }
