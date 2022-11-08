<?php  
namespace Concrete\Package\CustomSocialLinks;

defined('C5_EXECUTE') or die('Access Denied.');

use \Concrete\Core\Package\Package;

class Controller extends Package
{
    protected $pkgHandle = 'custom_social_links';
    protected $appVersionRequired = '8.5.9';
    protected $pkgVersion = '0.1.0';

    public function getPackageDescription()
    {
        return t('Adds custom social links to your website.');
    }

    public function getPackageName()
    {
        return t('Custom Social Links');
    }

    public function install()
    {
        $pkg = parent::install();
        $this->app->make('cache/request')->disable();
        $this->installContentFile('config/install/theme.xml');
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->app->make('cache/request')->disable();
        $this->installContentFile('config/install/theme.xml');
    }
}
