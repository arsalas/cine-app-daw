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
   