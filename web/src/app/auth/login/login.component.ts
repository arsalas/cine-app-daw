import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { authStore } from 'src/store/auth';
import { AuthService } from '../auth.service';
import { ILoginForm } from '../interfaces';
import { Router } from '@angular/router';
import { ProfileService } from 'src/app/profile/profile.service';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

    checkoutForm;
    haveErrorsLogin: boolean = false;

    constructor(
        private formBuilder: FormBuilder,
        private authSvc: AuthService,
        private router: Router,
        private profileSvc: ProfileService,
    ) {
        this.checkoutForm = this.formBuilder.group({
            email: '',
            password: ''
        });
    }

    ngOnInit(): void {
    }

    async onSubmit(payload: Partial<ILoginForm>) {
        this.haveErrorsLogin = false
        const params = {
            email: payload.email!,
            password: payload.password!
        }
        try {
            await this.authSvc.logIn(params);
            await this.profileSvc.get();
            this.router.navigate(['/']);
        } catch (error) {
            this.haveErrorsLogin = true
        }

    }
}
