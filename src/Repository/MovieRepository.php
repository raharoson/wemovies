<?php

namespace App\Repository;

use App\HttpClient\Url;
use App\Model\Movie;

class MovieRepository extends AbstractRepository
{
    public function list(array $params): array
    {
        $movies = $this->load(Url::LIST_MOVIE, $params);
        return $this->fetch(json_decode($movies)->results);
    }

    public function search(array $params): array
    {
        $movies = $this->load(Url::SEARCH_MOVIE, $params);
        return $this->fetch(json_decode($movies)->results);
    }

    public function findVideos(int $movieId, array $params): array
    {
        $response = $this->load('https://api.themoviedb.org/3/movie/'. $movieId .'/videos', $params);
        return json_decode($response)->results;
    }

    private function fetch(array $movies): array
    {
        return array_map(
            fn ($movie) => new Movie(
                $movie->id,
                $movie->title,
                $movie->overview,
                $movie->release_date,
                $movie->vote_count,
                $movie->poster_path,
                $movie->backdrop_path
            ),
            $movies
        );
    }
}