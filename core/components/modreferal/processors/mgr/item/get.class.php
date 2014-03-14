<?php
/**
 * Get an Item
 */
class modReferalItemGetProcessor extends modObjectGetProcessor {
	public $objectType = 'modReferalItem';
	public $classKey = 'modReferalItem';
	public $languageTopics = array('modreferal:default');
}

return 'modReferalItemGetProcessor';