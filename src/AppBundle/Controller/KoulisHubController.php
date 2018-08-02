<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class KoulisHubController extends Controller
{
    /**
     * @Route("/", name="koulishub")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function koulisHubAction(Request $request)
    {
        return $this->render('koulishub/index.html.twig', [
            'avatar_url' => 'https://avatars1.githubusercontent.com/u/11785506?v=4',
            'name'       => 'Kiriakos Papachristou',
            'login'      => 'siluok3',
            'details'    => [
                'company'   => 'trivago',
                'location'  => 'Palma De Mallorca',
                'joined_on' => 'Joined on 3rd of April 2015'

            ],
            'blog'         => 'https://www.linkedin.com/in/kiriakospapachristou/',
            'social_data'  => [
                "Public repos" => 19,
                "Followers"    => 0,
                "Following"    => 1
            ],
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
     * @Route("/profile", name="profile")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    /*public function profileAction(Request $request)
    {
        return $this->render('koulishub/profile.html.twig', [
            'avatar_url' => 'https://avatars1.githubusercontent.com/u/11785506?v=4',
            'name'       => 'Kiriakos Papachristou',
            'login'      => 'siluok3',
            'details'    => [
                'company'   => 'trivago',
                'location'  => 'Palma De Mallorca',
                'joined_on' => 'Joined on 3rd of April 2015'

            ],
            'blog'         => 'https://www.linkedin.com/in/kiriakospapachristou/',
            'social_data'  => [
                "Public repos" => 19,
                "Followers"    => 0,
                "Following"    => 1
            ]
        ]);
    }*/
}