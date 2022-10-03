import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { MovieI } from '../movie/interfaces';
import { MovieService } from '../movie/movie.service';

@Component({
    selector: 'app-search',
    templateUrl: './search.component.html',
    styleUrls: ['./search.component.scss']
})
export class SearchComponent implements OnInit {

    page = 1;
    checkoutForm;
    movies: MovieI[] = [];

    constructor(
        private movieSvc: MovieService,
        private formBuilder: FormBuilder,
    ) {
        this.checkoutForm = this.formBuilder.group({
            query: '',
        });
    }

    ngOnInit(): void {
    }

    onSubmit(formData: Partial<{ query: string | null; }>): void {
        console.log(formData)
        if (!formData || !formData.query) return;
        this.movieSvc.search(formData.query, this.page).subscribe(data => {
            this.movies = data.results
        });
    }

}
