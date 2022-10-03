import { Component, OnInit } from '@angular/core';
import { NowPlayingI, MovieI } from '../movie/interfaces';
import { MovieService } from '../movie/movie.service';

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

    nowPlaying: MovieI[] = [];
    populars: MovieI[] = [];
    limit = 12;

    constructor(
        private movieSvc: MovieService
    ) {

    }


    ngOnInit(): void {
        this.movieSvc.getNowPlaying().subscribe(data => {
            this.nowPlaying = data.results.slice(0, this.limit)

        });
        this.movieSvc.getPopulars().subscribe(data => {
            this.populars = data.results.slice(0, this.limit);

        });
    }

}
