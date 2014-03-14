<?php
/**
 * Update an Item
 */
class modReferalItemUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'modReferalItem';
	public $classKey = 'modReferalItem';
	public $languageTopics = array('modreferal');
	public $permission = 'edit_document';
}

return 'modReferalItemUpdateProcessor';
