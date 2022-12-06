import { Component, OnInit } from '@angular/core';
import { authStore } from 'src/store/auth';
import { AuthService } from './auth/auth.service';
import { ProfileService } from './profile/profile.service';

@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
    title = 'Cine app';

    constructor(
        private authSvc: AuthService,
        private profileSvc: ProfileService,
    ) { }

    ngOnInit(): void {
        console.log('INICIO')

        const token = sessionStorage.getItem('token')
        if (token) { 
            this.authSvc.setAuth(token);
            this.profileSvc.get();
         }
    }
}
