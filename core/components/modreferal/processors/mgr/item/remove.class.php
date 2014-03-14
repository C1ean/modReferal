<?php
/**
 * Remove an Item
 */
class modReferalItemRemoveProcessor extends modObjectRemoveProcessor {
	public $checkRemovePermission = true;
	public $objectType = 'modReferalItem';
	public $classKey = 'modReferalItem';
	public $languageTopics = array('modreferal');

}

return 'modReferalItemRemoveProcessor';