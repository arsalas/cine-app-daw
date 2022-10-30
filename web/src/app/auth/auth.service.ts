import { EventEmitter, Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { HttpClient } from '@angular/common/http'
import { API_URL } from "src/config";
import { ILoginApi, ILoginForm } from "./interfaces";
import { authStore } from "src/store/auth";

@Injectable({
    providedIn: 'root'
})

export class AuthService {
    private urlAPI = API_URL + '/auth/'
    auth = new EventEmitter<any>();

    constructor(private http: HttpClient) { }


    async signIn(params: ILoginForm): Promise<void> {
        try {
            const response = await this.http.post<ILoginApi>(this.urlAPI + 'signin', params).toPromise();
            if (!response) throw new Error("");
            this.setAuth(response.token)
        } catch (error) {
            throw new Error("");
        }
    }

    setAuth(token: string) {
        this.auth.emit();
        authStore.logIn(token);
    }

    async logIn(params: ILoginForm): Promise<void> {
        try {
            const response = await this.http.post<ILoginApi>(this.urlAPI + 'login', params).toPromise();
            if (!response) throw new Error("");
            this.setAuth(response.token)
        } catch (error) {
            throw new Error("");
        }
    }
}