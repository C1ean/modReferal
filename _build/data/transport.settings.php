<?php

$settings = array();

$tmp = array(
    'referrer_code_var' => array(
        'xtype' => 'textfield',
        'value' => 'ref',
        'area' =>'modreferal_main',

    ),
    'referrer_cookie_var' => array(
        'xtype' => 'textfield',
        'value' => 'ref_var',
        'area' =>'modreferal_main',

    ),
    'referrer_time' => array(
        'xtype' => 'numberfield',
        'value' => '31536000',
        'area' =>'modreferal_main',

    ),
);

foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
			'key' => 'modreferal_'.$k,
			'namespace' => PKG_NAME_LOWER,
		), $v
	),'',true,true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;
