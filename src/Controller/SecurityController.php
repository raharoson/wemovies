<?php

namespace App\Controller;

use App\HttpClient\Url;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGenerator;

class SecurityController extends AbstractController
{    
    public function __construct(private HttpClientInterface $httpClient, private string $tmdbApiKey)
    {}

    #[Route('/login/tmdb', name: 'login_tmdb')]
    public function tmdb(): Response
    {
        $tokenResponse = $this->httpClient->request(
            'GET',
            Url::CLAIM_NEW_TOKEN, [
                'query' => ['api_key' => $this->tmdbApiKey]
            ]
        );

        $token = ((array)json_decode($tokenResponse->getContent()))['request_token'];

        return new RedirectResponse(
            sprintf(
                Url::AUTHENTICATE . "/%s?redirect_to=%s",
                $token,
                $this->generateUrl('list', [], UrlGeneratorInterface::ABSOLUTE_URL)
            )
        );
    }
}
