<?php

declare(strict_types=1);

namespace PhpUnitGen\Console\Adapters\Laravel;

use Illuminate\Support\ServiceProvider;
use PhpUnitGen\Console\Container\ConsoleContainerFactory;

/**
 * Class PhpUnitGenServiceProvider.
 *
 * @author  Paul Thébaud <paul.thebaud29@gmail.com>
 * @author  Killian Hascoët <killianh@live.fr>
 * @license MIT
 */
class PhpUnitGenServiceProvider extends ServiceProvider
{
    /**
     * Add the publishable configuration and register the command.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../../config/phpunitgen.php' => $this->app->configPath('phpunitgen.php'),
        ], 'config');

        $this->commands([
            ConsoleContainerFactory::make()->get(PhpUnitGenCommand::class),
        ]);
    }
}