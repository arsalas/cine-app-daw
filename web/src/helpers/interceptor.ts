import { HttpEvent, HttpHandler, HttpInterceptor, HttpRequest } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { authStore } from 'src/store/auth';


@Injectable()
export class AuthInterceptor implements HttpInterceptor {
    intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
        req = req.clone({
            setHeaders: {
                // 'Content-Type': 'application/json; charset=utf-8',
                'Accept': 'application/json',
                'Authorization': `${authStore.token}`,
            },
        });
        return next.handle(req);
    }
}