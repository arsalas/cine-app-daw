import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { HttpClient } from '@angular/common/http'

@Injectable({
    providedIn: 'root'
})

export class DataService {
    private urlAPI = 'https://jsonplaceholder.typicode.com/users'

    constructor(private http: HttpClient) { }


    getAllUsers(): Observable<any[]> {
        console.log(1)
        return this.http.get<any[]>(this.urlAPI)
    }
}