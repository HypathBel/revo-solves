<?php

namespace App\Console\Commands;

use App\Application\UseCases\Github\CalculateGithubScore;
use App\Application\UseCases\Products\CalculateProductCost;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:products-cost {types} {json}')]
#[Description('Command description')]
class ProductsCost extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $types = $this->argument('types');
        $file = $this->argument('json');
        $cost = app(CalculateProductCost::class)->execute(
            json_decode(file_get_contents($file), true)['products'], 
            explode(',', $types)
        );
        $this->info("Total cost for specified product types: $cost");
    }
}
