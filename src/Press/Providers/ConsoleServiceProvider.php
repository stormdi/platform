<?php

declare(strict_types=1);

namespace Orchid\Press\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Press\Console\Commands\MakeManyBehavior;
use Orchid\Press\Console\Commands\MakeSingleBehavior;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * The available command shortname.
     *
     * @var array
     */
    protected $commands = [
        MakeManyBehavior::class,
        MakeSingleBehavior::class,
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        foreach ($this->commands as $command) {
            $this->commands($command);
        }
    }
}