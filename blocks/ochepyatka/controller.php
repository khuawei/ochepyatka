<?php defined('C5_EXECUTE') or die(_("Access Denied."));
	
class OchepyatkaBlockController extends BlockController {
	
	//protected $btTable = "btBlockLink";
	//protected $btInterfaceWidth = "650";
	//protected $btInterfaceHeight = "650";

	public function getBlockTypeName() {
		return t('Очепятка');
	}

	public function getBlockTypeDescription() {
		return t('Подключает JS и выводит баннер очепятки');
	}
}
