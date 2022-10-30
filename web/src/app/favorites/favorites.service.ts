import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { HttpClient } from '@angular/common/http'
import { API_URL } from "src/config";
import { IMovieDetails, IReview, MovieI, NowPlayingI } from "../movie/interfaces";
import { IFavorites } from "./interfaces/favorites";

@Injectable({
    providedIn: 'root'
})

export class FavoritesService {
    private urlAPI = API_URL + '/favorite'

    constructor(private http: HttpClient) { }

    async getFavoritesList(): Promise<IFavorites[]> {
        try {
            const response = await this.http.get<IFavorites[]>(`${this.urlAPI}/list`).toPromise();
            if (!response) throw new Error("");
            return response;

        } catch (error) {
            throw new Error("");
        }
    }

    async getFavoritesDetails(): Promise<MovieI[]> {
        try {
            const response = await this.http.get<MovieI[]>(`${this.urlAPI}`).toPromise();
            if (!response) throw new Error("");
            return response;

        } catch (error) {
            throw new Error("");
        }
    }
    async add(id: number): Promise<boolean> {
        try {
            const response = await this.http.post<{ msg: string }>(`${this.urlAPI}/${id}`, {}).toPromise();
            if (!response) throw new Error("");
            return true;
        } catch (error) {
            return false
        }
    }
    async remove(id: number): Promise<boolean> {
        try {
            const response = await this.http.delete<{ msg: string }>(`${this.urlAPI}/${id}`).toPromise();
            if (!response) throw new Error("");
            return true;
        } catch (error) {
            return false
        }
    }

}