<?php

/**
 * Class modReferalMainController
 */
abstract class modReferalMainController extends modExtraManagerController {
	/** @var modReferal $modReferal */
	public $modReferal;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('modreferal_core_path', null, $this->modx->getOption('core_path') . 'components/modreferal/');
		require_once $corePath . 'model/modreferal/modreferal.class.php';

		$this->modReferal = new modReferal($this->modx);

		$this->addCss($this->modReferal->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->modReferal->config['jsUrl'] . 'mgr/modreferal.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			modReferal.config = ' . $this->modx->toJSON($this->modReferal->config) . ';
			modReferal.config.connector_url = "' . $this->modReferal->config['connectorUrl'] . '";
		});
		</script>');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('modreferal:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends modReferalMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}