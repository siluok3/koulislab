<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class KoulisHubController extends Controller
{
    const KOULISHUB_API_SERVICE = 'koulishub_api';

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
            'username' => $username,
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
        $profileData = $this->get(static::KOULISHUB_API_SERVICE)->getProfile($username);

        return $this->render('koulishub/profile.html.twig', $profileData);
    }

    /**
     * @Route("/repos/{username}", name="repos")
     *
     * @param Request $request
     * @param string $username
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function reposAction(Request $request, $username)
    {
        $repoData = $this->get(static::KOULISHUB_API_SERVICE)->getRepos($username);

        return $this->render('koulishub/repos.html.twig', $repoData);
    }
}