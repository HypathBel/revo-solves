<?php


namespace App\Application\UseCases\Github;

use App\Enums\GithubEvent;
use App\Infraestructure\Adapters\GithubAdapter;
use Throwable;

class CalculateGithubScore
{
    public function __construct(
        private readonly GithubAdapter $adapter
    )
    {
        
    }

    public function execute(string $nickname): int
    {
        $score = 0;
        try {
            $response = $this->adapter->getEvents($nickname);
            if ($response->failed()) {
                return -1;
            }

            $responseBody = $response->json();
            
            for ($i = 0; $i < count($responseBody); $i++) {
                $score += $this->mapEventToScore(GithubEvent::tryFrom($responseBody[$i]['type']) ?? GithubEvent::OTHER);
            }

        } catch (Throwable $e) {
            return -1;
        }
        
        return $score;
    }

    private function mapEventToScore(GithubEvent $event): int
    {
        return match ($event) {
            GithubEvent::PushEvent => 5,
            GithubEvent::CreateEvent => 4,
            GithubEvent::IssuesEvent => 3,
            GithubEvent::CommitCommentEvent => 2,
            GithubEvent::OTHER => 1,
        };
    }
}