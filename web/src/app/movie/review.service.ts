import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { HttpClient } from '@angular/common/http'
import { API_URL } from "src/config";
import { IMovieDetails, IReview, NowPlayingI } from "./interfaces";

@Injectable({
    providedIn: 'root'
})

export class ReviewService {
    private urlAPI = API_URL + '/review'

    constructor(private http: HttpClient) { }

    async createReview(params: { movieId: number, content: string, score: number }): Promise<boolean> {
        try {
            const response = await this.http.post<{ msg: string }>(`${this.urlAPI}`, params).toPromise();
            if (!response) throw new Error("");
            return true;

        } catch (error) {
            // throw new Error("");
            return false;
        }
    }

    async getByMovie(movieId: number): Promise<IReview[]> {
        try {
            const response = await this.http.get<IReview[]>(`${this.urlAPI}/${movieId}`).toPromise();
            if (!response) throw new Error("");
            return response;

        } catch (error) {
            throw new Error("");
        }
    }


}