import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { MovieI } from '../movie/interfaces';
import { MovieService } from '../movie/movie.service';

@Component({
    selector: 'app-search',
    templateUrl: './search.component.html',
    styleUrls: ['./search.component.css']
})
export class SearchComponent implements OnInit {

    page:number = 1;
    totalPages = 1;
    query = '';
    checkoutForm;
    movies: MovieI[] = [];

    constructor(
        private movieSvc: MovieService,
        private formBuilder: FormBuilder,
        private route: ActivatedRoute,
        private router: Router
    ) {
        this.checkoutForm = this.formBuilder.group({
            query: '',
        });
    }

    async ngOnInit(): Promise<void> {
        this.route.queryParams
            .subscribe(params => {
                this.page = params['page'];
                this.query = params['query'];
                this.getMovies()
            });
    }

    async getMovies() {
        const res = await this.movieSvc.search(this.query, this.page)
        this.totalPages = res.totalPages;
        this.movies = res.results
    }

    async onSubmit(formData: Partial<{ query: string | null; }>): Promise<void> {
        if (!formData || !formData.query) return;
        this.router.navigate(['/search'],
        { queryParams: { query: formData.query, page: 1 } });
        
    }
    
    navigate(page: number){
        console.log(1)
        this.router.navigate(['/search'],
        { queryParams: { query: this.query, page } });

    }

}
