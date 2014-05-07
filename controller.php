<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

class OchepyatkaPackage extends Package {

    protected $pkgHandle = 'ochepyatka';
    protected $appVersionRequired = '5.5';
    protected $pkgVersion = '1.0';

    public function getPackageName() {
        return 'Очепятка';
    }

    public function getPackageDescription() {
        return 'Скрипт служит для отправки сообщений об ошибке';
    }

    public function install() {
        $pkg = parent::install();

        // install block
        BlockType::installBlockTypeFromPackage('ochepyatka', $pkg);
    }

    public function uninstall() {
        parent::uninstall();
        //$db = Loader::db();
        //$db->Execute('DROP TABLE btManualNav, btManualNavLinks');
    }


}