import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { HttpClient } from '@angular/common/http'
import { API_URL } from "src/config";
import { IMovieDetails, ISearch, NowPlayingI } from "./interfaces";

@Injectable({
    providedIn: 'root'
})

export class MovieService {
    private urlAPI = API_URL + '/movies'

    constructor(private http: HttpClient) { }

    async getDetails(id: number): Promise<IMovieDetails> {
        try {
            const response = await this.http.get<IMovieDetails>(`${this.urlAPI}/${id}`).toPromise();
            if (!response) throw new Error("");
            return response;

        } catch (error) {
            throw new Error("");
        }
    }

    async search(query: string, page: number = 1): Promise<ISearch> {
        try {
            const response = await this.http.get<ISearch>(`${this.urlAPI}/search&query=${query}&page=${page}`).toPromise();
            if (!response) throw new Error("");
            return response;

        } catch (error) {
            throw new Error("");
        }
    }

    getNowPlaying(page: number = 1): Observable<NowPlayingI> {
        return this.http.get<NowPlayingI>(this.urlAPI + `/now_playing&page=${page}`)
    }
    getPopulars(page: number = 1): Observable<NowPlayingI> {
        return this.http.get<NowPlayingI>(this.urlAPI + `/populars&page=${page}`)
    }
    // search(query: string, page: number = 1): Observable<NowPlayingI> {
    //     return this.http.get<NowPlayingI>(this.urlAPI + `/search&query=${query}&page=${page}`)
    // }
}