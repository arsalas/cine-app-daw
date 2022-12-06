import { Component, OnInit } from '@angular/core';
import { MovieI } from '../movie/interfaces';
import { FavoritesService } from './favorites.service';

@Component({
    selector: 'app-favorites',
    templateUrl: './favorites.component.html',
    styleUrls: ['./favorites.component.css']
})
export class FavoritesComponent implements OnInit {

    movies: MovieI[] = [];

    constructor(
        private favoritesSvc: FavoritesService,
    ) {

    }

    async ngOnInit(): Promise<void> {
        this.movies = await this.favoritesSvc.getFavoritesDetails();
    }



}
