<?php
/**
 * @package modreferal
 */
class modReferalUsers extends xPDOObject {

    public static function load(xPDO & $xpdo, $className, $criteria, $cacheFlag= true) {
        /* @var $instance modCustomerProfile */
        $instance = parent::load($xpdo, 'modReferalUsers', $criteria, $cacheFlag);

        if(!is_object($instance) || !($instance instanceof $className)) {
            if (is_numeric($criteria) || (is_array($criteria) && !empty($criteria['id']))) {
                $id = is_numeric($criteria) ? $criteria : $criteria['id'];
                if ($xpdo->getCount('modUser', array('id' => $id))) {
                    $instance = $xpdo->newObject('modReferalUsers');
                    $time = time();
                    $instance->set('id', $id);
                    $instance->fromArray(array(
                        'createdon' => $time,
                        'referrer_code' => md5($id . $time),
                    ));
                    $instance->save();
                }
            }
        }

        return $instance;
    }



}