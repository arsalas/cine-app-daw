import { findIndex } from "rxjs";
import { IFavorites } from "src/app/favorites/interfaces/favorites";

interface IAuthStore {
    isAuth: boolean;
    token: string;
    id: number;
    user: {
        name: string,
        avatar: string
    };
    favorites: IFavorites[]
    logIn(user: any): void;
    closeSession(): void;
    setProfile(id: number, name: string, avatar: string): void;
    addFavorite(movieId: number): void;
    removeFavorite(movieId: number): void;
}

export const authStore: IAuthStore = {
    isAuth: false,
    token: '',
    id: 0,
    user: {
        name: '',
        avatar: ''
    },
    favorites: [],

    logIn(token: string) {
        this.token = token;
        this.isAuth = true;
        sessionStorage.setItem('token', token);
    },

    addFavorite(movieId: number) {
        this.favorites.push({
            userId: this.id,
            movieId,
            createdAt: new Date,
            updateddAt: new Date
        })
    },
    removeFavorite(movieId: number) {
        const i = this.favorites.findIndex(fav => fav.movieId == movieId)
        if (i == -1) return;
        this.favorites.splice(i, 1);
    },

    setProfile(id: number, name: string, avatar: string) {
        this.id = id;
        this.user.name = name;
        this.user.avatar = avatar;
    },

    closeSession() {
        this.user = {
            name: '',
            avatar: ''
        }
        this.isAuth = false
        sessionStorage.removeItem('token');
    }
}