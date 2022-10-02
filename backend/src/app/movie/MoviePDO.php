<?php

use Src\Config\CONFIG;

class MoviePDO
{



    static public function search($data)
    {
        $movie = new stdClass;
        $movie->page = $data->page;
        $movie->results = array_map(function ($mov) {
            return MoviePDO::movie($mov);
        }, $data->results);
        $movie->totalPages =  $data->total_pages;
        $movie->totalResults =  $data->total_results;
        return $movie;
    }

    static public function movieDetails($data)
    {
        $movie = new stdClass;
        $movie->id = $data->id;
        $movie->genres =  array_map(function ($genre) {
            return $genre->name;
        }, $data->genres);
        $movie->originalTitle = $data->original_title;
        $movie->overview = $data->overview;
        $movie->popularity = $data->popularity;
        $movie->posterPath = CONFIG::$API_IMG_URL . $data->poster_path;
        $movie->releaseDate = $data->release_date;
        $movie->tagline = $data->tagline;
        $movie->title = $data->title;
        $movie->video = $data->video;
        $movie->voteAverage = $data->vote_average;
        $movie->voteCount = $data->vote_count;
        $movie->budget = $data->budget;
        return $movie;
    }

    static public function movie($data)
    {
        $movie = new stdClass;
        $movie->id = $data->id;
        $movie->originalTitle = $data->original_title;
        $movie->overview = $data->overview;
        $movie->popularity = $data->popularity;
        $movie->posterPath = CONFIG::$API_IMG_URL . $data->poster_path;
        $movie->releaseDate = $data->release_date;
        $movie->title = $data->title;
        $movie->voteAverage = $data->vote_average;
        $movie->voteCount = $data->vote_count;
        return $movie;
    }

    static public function nowPlaying($data)
    {
        $movie = new stdClass;
        $movie->page = $data->page;
        $movie->dates = $data->dates;
        $movie->results = array_map(function ($mov) {
            return MoviePDO::movie($mov);
        }, $data->results);
        $movie->totalPages =  $data->total_pages;
        $movie->totalResults =  $data->total_results;
        return $movie;
    }

    static public function populars($data)
    {
        $movie = new stdClass;
        $movie->page = $data->page;
        $movie->results = array_map(function ($mov) {
            return MoviePDO::movie($mov);
        }, $data->results);
        $movie->totalPages =  $data->total_pages;
        $movie->totalResults =  $data->total_results;
        return $movie;
    }
}
