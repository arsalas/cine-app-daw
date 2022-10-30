import { EventEmitter, Injectable } from "@angular/core";
import { HttpClient } from '@angular/common/http'
import { API_URL } from "src/config";
import { authStore } from "src/store/auth";
import { IProfileApi } from "./interfaces";
import { FavoritesService } from "../favorites/favorites.service";

@Injectable({
    providedIn: 'root'
})

export class ProfileService {
    private urlAPI = API_URL + '/profile'
    event = new EventEmitter<any>();

    constructor(
        private http: HttpClient,
        private srvFavorite: FavoritesService
    ) { }

    async get(): Promise<IProfileApi> {
        try {
            const response = await this.http.get<IProfileApi>(this.urlAPI).toPromise();
            if (!response) throw new Error("");
            const favorites = await this.srvFavorite.getFavoritesList()
            authStore.favorites = favorites;
            authStore.setProfile(response.id, response.name, response.avatar);
            authStore.setProfile(response.id, response.name, response.avatar);
            this.event.emit();
            return response;

        } catch (error) {
            throw new Error("");
        }
    }

    async update(name: string, avatar: string, file: File): Promise<void> {
        try {
            let formData = new FormData();
            formData.append("file", file);
            formData.append("name", name);
            formData.append("avatar", avatar);
            const response = await this.http.post<void>(this.urlAPI, formData).toPromise();
            if (!response) throw new Error("");
            this.get();

        } catch (error) {
            throw new Error("");
        }
    }


}