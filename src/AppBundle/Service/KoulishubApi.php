<?php

namespace AppBundle\Service;


class KoulishubApi
{
    /**
     * @param $username
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProfile($username)
    {
        $client  = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/' . $username);
        $data = json_decode($response->getBody()->getContents(), true);

        return [
            'avatar_url' => $data['avatar_url'],
            'name'       => $data['name'],
            'login'      => $data['login'],
            'details'    => [
                'company'   => $data['company'],
                'location'  => $data['location'],
                'joined_on' => 'Joined on ' . (new \DateTime($data['created_at']))->format('d m Y'),
            ],
            'blog'         => $data['blog'],
            'social_data'  => [
                "Public repos" => $data['public_repos'],
                "Followers"    => $data['followers'],
                "Following"    => $data['following'],
            ]
        ];
    }

    /**
     * @param $username
     * @return array $data
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRepos($username)
    {
        $client =  new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/'.$username.'/repos');
        $data = json_decode($response->getBody()->getContents(), true);

        return [
            'repo_count'   => count($data),
            'most_stars'   => $this->getRepositoriesMostStars($data),
            'repos'        => $data,
        ];
    }

    /**
     * @param $data
     * @return int $mostStarredRepo
     */
    private function getRepositoriesMostStars($data)
    {
        $mostStarredRepo = array_reduce($data, function($mostStars, $currentRepo) {
            $currentStars = $currentRepo['stargazers_count'];
            return $currentStars > $mostStars ? $currentStars : $mostStars;
        }, 0);

        return $mostStarredRepo;
    }
}