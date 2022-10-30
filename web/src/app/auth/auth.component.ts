import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
// import { DataService } from './auth.service';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
    selector: 'app-auth',
    templateUrl: './auth.component.html',
    styleUrls: ['./auth.component.scss']
})
export class AuthComponent implements OnInit {

    data: any[] = [];
    checkoutForm;
    url;

    constructor(
        // private dataSvc: DataService,
        private formBuilder: FormBuilder,
        private domSanitizer: DomSanitizer
    ) {
        this.url = domSanitizer.bypassSecurityTrustResourceUrl('https://www.youtube.com/embed/2GJh4ElbEjA');
        this.checkoutForm = this.formBuilder.group({
            name: '',
            address: ''
        });
    }

    ngOnInit(): void {
        // this.dataSvc.getAllUsers().subscribe(data => this.data = data)
    }

    onSubmit(customerData: any) {
        // Process checkout data here
        // this.items = this.cartService.clearCart();
        this.checkoutForm.reset();

        console.warn('Your order has been submitted', customerData);
    }
}
