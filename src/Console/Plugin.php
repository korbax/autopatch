<?php
namespace Xlear\Autopatch\Console;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\EventDispatcher\EventSubscriberInterface;

class Plugin implements PluginInterface, EventSubscriberInterface
{
//    public function postUpdate(Composer $composer, IOInterface $io)
    public function postUpdate()
    {
        file_put_contents('/var/www/magento2/xlear/vendor/xlear/var/log/composer.log', 111 . "\n",FILE_APPEND);

        $hhh = 88;
        print 111;
    }
    
//    public function warmCache(Composer $composer, IOInterface $io)
    public function warmCache()
    {
        file_put_contents('/var/www/magento2/xlear/vendor/xlear/var/log/composer.log', 222 . "\n",FILE_APPEND);

        $hhh = 88;
        print 222;
    }

//    public function postPackageInstall(Composer $composer, IOInterface $io)
    public function postPackageInstall()
    {
        file_put_contents('/var/www/magento2/xlear/vendor/xlear/var/log/composer.log', 333 . "\n",FILE_APPEND);

        $hhh = 88;
        print 333;
    }

//    public function installOrUpdate($event)
    public function installOrUpdate()
    {
        file_put_contents('/var/www/magento2/xlear/vendor/xlear/var/log/composer.log', 444 . "\n",FILE_APPEND);

        $hhh = 88;
        print 555;

        file_put_contents('/var/www/magento2/xlear/vendor/xlear/var/log/composer.log', __METHOD__ . "\n",FILE_APPEND);
        file_put_contents('/tmp/composer.log', __METHOD__ . "\n",FILE_APPEND);
        file_put_contents('/tmp/composer.log', get_class($event) . "\n",FILE_APPEND);
        file_put_contents('/tmp/composer.log', $event->getName() . "\n",FILE_APPEND);
    }

    public function activate(Composer $composer, IOInterface $io)
    {
        file_put_contents('/tmp/composer.log', __METHOD__ . "\n",FILE_APPEND);
    }

    public static function getSubscribedEvents()
    {
        return array(
            'post-install-cmd' => 'installOrUpdate',
            'post-update-cmd' => 'installOrUpdate',
        );
    }

    public function installOrUpdate($event)
    {
        file_put_contents('/tmp/composer.log', __METHOD__ . "\n",FILE_APPEND);
        file_put_contents('/tmp/composer.log', get_class($event) . "\n",FILE_APPEND);
    }
}
