import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';
import { FormBuilder, FormGroup } from '@angular/forms';

import { IMovieDetails, IReview } from './interfaces';
import { MovieService } from './movie.service';
import { authStore } from 'src/store/auth';
import { ReviewService } from './review.service';
import { formatRelativeTime } from 'src/helpers/dates';
import { FavoritesService } from '../favorites/favorites.service';

@Component({
	selector: 'app-movie',
	templateUrl: './movie.component.html',
	styleUrls: ['./movie.component.scss']
})
export class MovieComponent implements OnInit {

	movie: IMovieDetails | undefined;
	reviews: IReview[] = [];
	id: number;
	url: SafeResourceUrl = '';
	isAuth: boolean;
	stars: number[] = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
	starUser: number = 0;
	reviewForm: FormGroup;
	isReviewOpen: boolean = false;
	userHaveReview: boolean = false;
	userId: number = 0;
	formatRelativeTime: any;
	userScore: number = 0;
	isFavorite = false;
	isEditing = false;
	editingId = 0;

	constructor(
		private moviesSvc: MovieService,
		private reviewSvc: ReviewService,
		private favoriteSvc: FavoritesService,
		private rutaActiva: ActivatedRoute,
		private domSanitizer: DomSanitizer,
		private formBuilder: FormBuilder,
	) {
		this.id = this.rutaActiva.snapshot.params['id'];
		this.isAuth = authStore.isAuth;
		this.reviewForm = this.formBuilder.group({
			review: '',
		});
		this.formatRelativeTime = formatRelativeTime

	}

	async ngOnInit(): Promise<void> {
		try {

			this.movie = await this.moviesSvc.getDetails(this.id)
			this.reviews = await this.reviewSvc.getByMovie(this.id)
			this.userId = authStore.id
			const userReview = this.reviews.find(review => review.userId === authStore.id);
			if (userReview) {
				this.userHaveReview = true;
				this.userScore = userReview.score
			}
			if (authStore.favorites.find(fav => fav.movieId == this.id))
				this.isFavorite = true
			this.movie.releaseDate = new Date(this.movie.releaseDate)
			if (this.movie.video)
				this.url = this.domSanitizer.bypassSecurityTrustResourceUrl('https://www.youtube.com/embed/' + this.movie.video.key);
		} catch (e) {
			console.log(e)
		}
	}

	countStar(star: number) {
		console.log('Value of star', star);
		this.starUser = star
	}

	async onSubmit() {
		if (this.starUser === 0 || this.reviewForm.value.review.trim().length === 0) {
			alert('formulario incorrecto')
			return
		}
		const params = {
			movieId: this.id,
			content: this.reviewForm.value.review.trim(),
			score: this.starUser
		}
		const response = await this.reviewSvc.createReview(params)
		if (response) {
			this.reviews = await this.reviewSvc.getByMovie(this.id)
			this.userScore = this.starUser;
			this.userHaveReview = true
		}
	}

	async addFavorite() {
		const response = await this.favoriteSvc.add(this.id)
		if (!response) return
		authStore.addFavorite(this.id);
		this.isFavorite = true;
	}

	async removeFavorite() {
		const response = await this.favoriteSvc.remove(this.id)
		if (!response) return
		authStore.removeFavorite(this.id);
		this.isFavorite = false;

	}

	async removeReview() {
		const response = await this.reviewSvc.deleteReview(this.id)
		if (!response) return
		this.userHaveReview = false;
		this.reviews = await this.reviewSvc.getByMovie(this.id)

	}

	activateEditing(review: IReview) {
		this.isEditing = true;
		this.editingId = review.movieId;
		this.reviewForm.setValue({ review: review.content })
		this.starUser = review.score;
	}

	async onSubmitEdit() {
		if (this.starUser === 0 || this.reviewForm.value.review.trim().length === 0) {
			alert('formulario incorrecto')
			return
		}
		const params = {
			movieId: this.id,
			content: this.reviewForm.value.review.trim(),
			score: this.starUser
		}
		const response = await this.reviewSvc.updateReview(params)
		if (response) {
			this.reviews = await this.reviewSvc.getByMovie(this.id)
			this.userScore = this.starUser;
			this.userHaveReview = true
		}
		this.isEditing = false;
	}

	cancelEdit() {
		this.isEditing = false
	}

}
