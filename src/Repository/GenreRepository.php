<?php

namespace App\Repository;

use App\HttpClient\Url;
use App\Model\Genre;
use App\Repository\AbstractRepository;

class GenreRepository extends AbstractRepository
{
    const URI = '/genre/movie/list';

    public function list(array $params): array
    {
        return array_map(
            fn ($genre) => new Genre($genre->id, $genre->name), 
            json_decode($this->load(Url::LIST_GENRE, $params))->genres
        );
    }

}