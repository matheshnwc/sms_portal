 <?php namespace App\Providers;

use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;
use ReflectionClass;

class BusServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
    *
    * @param  \Illuminate\Bus\Dispatcher $dispatcher
    * @return void
    */
    public function boot(Dispatcher $dispatcher)
    {
        // map namespace for Command Handlers
        $dispatcher->mapUsing(function ($command) {
            list($commandNamespace, $handlerNamespace) = $this->resolveHandlerNamespace($command);

            return Dispatcher::simpleMapping(
            $command, $commandNamespace, $handlerNamespace
        );
    });
}

/**
 *  Dynamically resolve handler class using command namespace.
 * @param $command
 * @return array
 */
private function resolveHandlerNamespace($command)
{
    $reflection = new ReflectionClass($command);
    $commandNamespace = $reflection->getNamespaceName();
    $handlerNamespace = str_replace('Commands', 'Handlers\\Commands', $commandNamespace);

    return array($commandNamespace, $handlerNamespace);
}


/**
 * Register any application services.
 *
 * @return void
 */
public function register()
{
    //
}

}
