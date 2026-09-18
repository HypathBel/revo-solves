<?php

namespace App\Infraestructure\Adapters;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class GithubAdapter
{

    public function getEvents(string $nickname): Response
    {
        return Http::get(env("GITHUB_URL") . "/users/{$nickname}/events");
    }
}