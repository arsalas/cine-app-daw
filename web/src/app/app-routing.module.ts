import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AuthComponent } from './auth/auth.component';
import { HomeComponent } from './home/home.component';
import { MovieComponent } from './movie/movie.component';
import { SearchComponent } from './search/search.component';
import { pathRoutes } from '../helpers/routes'
import { LoginComponent } from './auth/login/login.component';
import { SigninComponent } from './auth/signin/signin.component';
import { ProfileComponent } from './profile/profile.component';
import { FavoritesComponent } from './favorites/favorites.component';


const routes: Routes = [
    {
        path: pathRoutes.home, // ''
        component: HomeComponent,
        pathMatch: 'full',
        title: 'Cine App'
    },
    {
        path: pathRoutes.search, // 'search'
        component: SearchComponent,
        pathMatch: 'full',
        title: 'Busqueda'
    },
    {
        path: pathRoutes.profile, //'profile'
        component: ProfileComponent,
        pathMatch: 'full',
        title: 'Perfil'
    },
    {
        path: pathRoutes.favorites, //'profile'
        component: FavoritesComponent,
        pathMatch: 'full',
        title: 'Favoritos'
    },
    {
        path: pathRoutes.auth, //'auth'
        component: AuthComponent,
        title: 'Auth',
        children: [
            {
                path: pathRoutes.logIn, //'log-in'
                component: LoginComponent,
                title: 'Iniciar Sesion'
            },
            {
                path: pathRoutes.signIn, // 'sign-in'
                component: SigninComponent,
                title: 'Registro'
            },
        ]
    },
    {
        path: pathRoutes.movies + '/:id', // 'movies'
        component: MovieComponent,
        pathMatch: 'full',
        title: 'Peliculas',

    },
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})
export class AppRoutingModule { }
