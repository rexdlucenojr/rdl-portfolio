<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class GitHubController extends Controller
{
    private const USERNAME = 'rexdlucenojr';

    public function index(): View
    {
        return view('portfolio.repositories', [
            'profileUrl' => 'https://github.com/'.self::USERNAME.'?tab=repositories',
            'repositories' => $this->repositories(),
        ]);
    }

    /**
     * @return array<int, array{name: string, description: string, url: string, homepage: ?string, language: ?string, stars: int, forks: int, updated_at: ?string}>
     */
    private function repositories(): array
    {
        try {
            $response = Http::withHeaders([
                'Accept' => 'application/vnd.github+json',
                'User-Agent' => 'rdl-portfolio',
            ])->connectTimeout(2)->timeout(4)->get('https://api.github.com/users/'.self::USERNAME.'/repos', [
                'per_page' => 100,
                'sort' => 'updated',
                'type' => 'owner',
            ]);

            if ($response->successful()) {
                $repositories = collect($response->json())
                    ->reject(fn (array $repository) => (bool) ($repository['fork'] ?? false))
                    ->map(fn (array $repository) => [
                        'name' => (string) $repository['name'],
                        'description' => filled($repository['description'] ?? null)
                            ? (string) $repository['description']
                            : 'No description provided.',
                        'url' => (string) $repository['html_url'],
                        'homepage' => filled($repository['homepage'] ?? null) ? (string) $repository['homepage'] : null,
                        'language' => filled($repository['language'] ?? null) ? (string) $repository['language'] : null,
                        'stars' => (int) ($repository['stargazers_count'] ?? 0),
                        'forks' => (int) ($repository['forks_count'] ?? 0),
                        'updated_at' => $repository['updated_at'] ?? null,
                    ])
                    ->values()
                    ->all();

                if ($repositories !== []) {
                    return $repositories;
                }
            }
        } catch (\Throwable) {
            // Fall back to the known public repositories below.
        }

        return $this->fallbackRepositories();
    }

    /**
     * @return array<int, array{name: string, description: string, url: string, homepage: ?string, language: ?string, stars: int, forks: int, updated_at: ?string}>
     */
    private function fallbackRepositories(): array
    {
        return [
            [
                'name' => 'rdl-portfolio',
                'description' => 'Personal portfolio built with Laravel, Tailwind CSS, and Vite, deployed on Vercel.',
                'url' => 'https://github.com/'.self::USERNAME.'/rdl-portfolio',
                'homepage' => 'https://rdl-portfolio.vercel.app',
                'language' => 'Blade',
                'stars' => 0,
                'forks' => 0,
                'updated_at' => null,
            ],
            [
                'name' => 'rexdlucenojr.github.io',
                'description' => 'Personal GitHub Pages website.',
                'url' => 'https://github.com/'.self::USERNAME.'/rexdlucenojr.github.io',
                'homepage' => null,
                'language' => 'HTML',
                'stars' => 0,
                'forks' => 0,
                'updated_at' => null,
            ],
            [
                'name' => self::USERNAME,
                'description' => 'GitHub profile repository.',
                'url' => 'https://github.com/'.self::USERNAME.'/'.self::USERNAME,
                'homepage' => null,
                'language' => null,
                'stars' => 0,
                'forks' => 0,
                'updated_at' => null,
            ],
        ];
    }
}
