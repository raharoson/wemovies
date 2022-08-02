<?php

namespace App\Controller;


use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WeMovieController extends AbstractController
{
    public function __construct(
        private GenreRepository $genreRepository,
        private MovieRepository $movieRepository
    ) {}

    #[Route('/', name: 'list')]
    public function list(Request $request, string $tmdbApiKey): Response 
    {
        $searchTerm = $request->query->get('query');
        
        $movies = $this->movieRepository->list([
            'api_key' => $tmdbApiKey, 
            'with_genres' => $request->get('genre_id'),
        ]);

        if ($request->query->get('preview')) {
            return $this->render('_search-movies.html.twig', [
                'movies' => $this->movieRepository->search([
                    'api_key' => $tmdbApiKey, 
                    'query'   => $searchTerm
                ])
            ]);
        }

        $movieId = $request->query->get('movieId') ?? $movies[0]->getId();

        return $this->render('index.html.twig', [
            'genres' => $this->genreRepository->list(['api_key' => $tmdbApiKey]),
            'movies' => $movies,
            'videos' => $this->movieRepository->findVideos($movieId, ['api_key' => $tmdbApiKey]),
            'searchTerm' => $searchTerm
        ]);
    }

    #[Route('/movie', name: 'movie')]
    public function getOneMovie(Request $request, string $tmdbApiKey): Response
    {
        return $this->render('_show-movie.html.twig', [
            'videos' => $this->movieRepository->findVideos($request->get('movie_id'), ['api_key' => $tmdbApiKey])
        ]);        
    }
}
