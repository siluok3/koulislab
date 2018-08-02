<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class KoulisHubController extends Controller
{
    /**
     * @Route("/{username}", name="koulishub", defaults={ "username": "siluok3" })
     *
     * @param Request $request
     * @param string $username
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function koulisHubAction(Request $request, $username)
    {
        return $this->render('koulishub/index.html.twig', [
            'username'     => $username,
            'repo_count'   => 20,
            'most_stars'   => 4,
            'repos'        => [
                [
                    'name'             => 'first repo',
                    'url'              => 'https://github.com/siluok3',
                    'stargazers_count' => 10,
                    'description'      => 'first repo description'
                ],
                [
                    'name'             => 'second repo',
                    'url'              => 'https://github.com/siluok3',
                    'stargazers_count' => 2,
                    'description'      => 'second repo description'
                ],
                [
                    'name'             => 'third repo',
                    'url'              => 'https://github.com/siluok3',
                    'stargazers_count' => 5,
                    'description'      => 'third repo description'
                ],
            ]
        ]);
    }

    /**
     * @Route("/profile/{username}", name="profile")
     *
     * @param Request $request
     * @param string $username
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileAction(Request $request, $username)
    {
        $profileData = $this->get('koulishub_api')->getProfile($username);

        return $this->render('koulishub/profile.html.twig', $profileData);
    }
}