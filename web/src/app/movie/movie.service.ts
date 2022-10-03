import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { HttpClient } from '@angular/common/http'
import { API_URL } from "src/config";
import { NowPlayingI } from "./interfaces";

@Injectable({
    providedIn: 'root'
})

export class MovieService {
    private urlAPI = API_URL + '/movies'

    constructor(private http: HttpClient) { }


    getNowPlaying(page: number = 1): Observable<NowPlayingI> {
        return this.http.get<NowPlayingI>(this.urlAPI + `/now_playing&page=${page}`)
    }
    getPopulars(page: number = 1): Observable<NowPlayingI> {
        return this.http.get<NowPlayingI>(this.urlAPI + `/populars&page=${page}`)
    }
    search(query: string, page: number = 1): Observable<NowPlayingI> {
        return this.http.get<NowPlayingI>(this.urlAPI + `/search&query=${query}&page=${page}`)
    }
}