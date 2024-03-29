<?php
/**
 * The home manager controller for modReferal.
 *
 */
class modReferalHomeManagerController extends modReferalMainController {
	/* @var modReferal $modReferal */
	public $modReferal;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('modreferal');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addJavascript($this->modReferal->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->modReferal->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->modReferal->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "modreferal-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->modReferal->config['templatesPath'] . 'home.tpl';
	}
}