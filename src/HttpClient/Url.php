<?php

namespace App\HttpClient;

class Url
{
    public const AUTHENTICATE = 'https://www.themoviedb.org/authenticate'; 
    public const BASE_API = 'https://api.themoviedb.org';
    public const CLAIM_NEW_TOKEN = self::BASE_API . '/3/authentication/token/new';
    public const CLAIM_SESSION_ID = self::BASE_API . '/3/authentication/session/new';
    public const LIST_GENRE = self::BASE_API . '/3/genre/movie/list';
    public const LIST_MOVIE = self::BASE_API . '/3/discover/movie';
    public const POSTER = 'https://image.tmdb.org/t/p/original';
    public const GET_VIDEO = self::BASE_API . '/3/movie';

    public const SEARCH_MOVIE = self::BASE_API. '/3/search/movie';
}