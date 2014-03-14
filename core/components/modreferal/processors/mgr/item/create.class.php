<?php
/**
 * Create an Item
 */
class modReferalItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'modReferalItem';
	public $classKey = 'modReferalItem';
	public $languageTopics = array('modreferal');
	public $permission = 'new_document';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$alreadyExists = $this->modx->getObject('modReferalItem', array(
			'name' => $this->getProperty('name'),
		));
		if ($alreadyExists) {
			$this->modx->error->addField('name', $this->modx->lexicon('modreferal_item_err_ae'));
		}

		return !$this->hasErrors();
	}

}

return 'modReferalItemCreateProcessor';