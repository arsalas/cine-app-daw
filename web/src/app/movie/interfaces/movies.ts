export interface NowPlayingI {
    page:         number;
    results:      MovieI[];
    totalPages:   number;
    totalResults: number;
   }
   
export interface MovieI {
    id:            number;
    originalTitle: string;
    overview:      string;
    popularity:    number;
    posterPath:    string;
    releaseDate:   Date;
    title:         string;
    voteAverage:   number;
    voteCount:     number;
   }
   

   export interface Video {
    id:           string;
    iso_3166_1:   string;
    iso_639_1:    string;
    key:          string;
    name:         string;
    official:     boolean;
    published_at: Date;
    site:         string;
    size:         number;
    type:         string;
   }
   

   export interface IMovieDetails {
    budget:        number;
    genres:        string[];
    id:            number;
    originalTitle: string;
    overview:      string;
    popularity:    number;
    posterPath:    string;
    releaseDate:   Date;
    tagline:       string;
    title:         string;
    video:         Video | false;
    voteAverage:   number;
    voteCount:     number;
    backdrop_path: string;
   }
   

   export interface ISearch {
    page:         number;
    results:      MovieI[];
    totalPages:   number;
    totalResults: number;
   }
   

   