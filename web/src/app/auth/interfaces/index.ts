import { FormControl } from "@angular/forms";

export interface ILoginForm {
    email: string | null;
    password: string | null;
}

export interface ILoginApi {
    token: string;
}