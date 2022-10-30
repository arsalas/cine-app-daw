import { Component, OnInit, Output } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

import { AuthService } from 'src/app/auth/auth.service';
import { LoginComponent } from 'src/app/auth/login/login.component';
import { ProfileService } from 'src/app/profile/profile.service';
import { authStore } from 'src/store/auth';
@Component({
    selector: 'app-navbar',
    templateUrl: './navbar.component.html',
    styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {

    isAuth: boolean = false;
    isDdMenuOpen: boolean = false;
    avatar: string = '';
    formGroup: FormGroup;

    constructor(
        private loginApp: AuthService,
        private profileApp: ProfileService,
        private formBuilder: FormBuilder,
        private router: Router
    ) {
        this.loginApp.auth.subscribe(res => this.isAuth = true);
        this.profileApp.event.subscribe(res => this.avatar = authStore.user.avatar);
        this.formGroup = this.formBuilder.group({
            search: '',
        });
    }

    ngOnInit(): void {
    }

    toggleDdMenu(): void {
        this.isDdMenuOpen = !this.isDdMenuOpen
    }

    closeSession(): void {
        authStore.closeSession();
        this.isAuth = false;
    }

    onSubmit() {
        this.router.navigate(['/search'],
            { queryParams: { query: this.formGroup.value.search, page: 1 } });
    }
}
