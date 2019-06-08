<?php
namespace Xlear\Autopatch\Console;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\EventDispatcher\EventSubscriberInterface;

class Plugin implements PluginInterface, EventSubscriberInterface
{
    public function postUpdate(Composer $composer, IOInterface $io)
    {
        print 111;
    }
    
    public function warmCache(Composer $composer, IOInterface $io)
    {
        print 222;
    }

    public function postPackageInstall(Composer $composer, IOInterface $io)
    {
        print 333;
    }

    public function installOrUpdate($event)
    {
        print 555;

        file_put_contents('/tmp/composer.log', __METHOD__ . "\n",FILE_APPEND);
        file_put_contents('/tmp/composer.log', get_class($event) . "\n",FILE_APPEND);
        file_put_contents('/tmp/composer.log', $event->getName() . "\n",FILE_APPEND);
    }
}
