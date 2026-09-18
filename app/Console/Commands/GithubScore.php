<?php

namespace App\Console\Commands;

use App\Application\UseCases\Github\CalculateGithubScore;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:github-score {nickname}')]
#[Description('Command description')]
class GithubScore extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nickname = $this->argument('nickname');
        $score = app(CalculateGithubScore::class)->execute($nickname);
        $this->info("Github score for {$nickname}: ⭐ {$score}");
    }
}
