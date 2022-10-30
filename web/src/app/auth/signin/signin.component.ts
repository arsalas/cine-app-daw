import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { authStore } from 'src/store/auth';
import { AuthService } from '../auth.service';
import { ILoginForm } from '../interfaces';
import { Router } from '@angular/router';

@Component({
    selector: 'app-signin',
    templateUrl: './signin.component.html',
    styleUrls: ['./signin.component.scss']
})
export class SigninComponent implements OnInit {

    checkoutForm;
    haveErrorsLogin: boolean = false;

    constructor(
        private formBuilder: FormBuilder,
        private authSvc: AuthService,
        private router: Router
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
            await this.authSvc.signIn(params);
            this.router.navigate(['/']);
        } catch (error) {
            this.haveErrorsLogin = true
        }

    }
}
