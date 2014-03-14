<?php


switch ($modx->event->name) {

    case 'OnWebPageInit':
        /* @var modReferalUsers $profile */

        $modReferal = $modx->getService('modreferal', 'modReferal', $modx->getOption('modreferal_core_path', null, $modx->getOption('core_path') . 'components/modreferal/') . 'model/modreferal/', $scriptProperties);
        if (!($modReferal instanceof modReferal)) return '';

        $referrerVar = $modx->getOption('mod_referrer_code_var', null, 'ref', true);
        $cookieVar = $modx->getOption('mod_referrer_cookie_var', null, 'ref_var', true);
        $cookieTime = $modx->getOption('mod_referrer_time', null, 86400 * 365, true);

        if (!$modx->user->isAuthenticated() && !empty($_REQUEST[$referrerVar])) {

            $code = trim($_REQUEST[$referrerVar]);
            if ($profile = $modx->getObject('modReferalUsers', array('referrer_code' => $code))) {
                setcookie($cookieVar, $code, time() + $cookieTime);
            }
        }elseif (($modx->user->isAuthenticated() && !empty($_COOKIE[$cookieVar]))) {
            setcookie($cookieVar, '', time() - $cookieTime);
        }
        break;

    case 'OnUserFormSave':

        if ($mode == modSystemEvent::MODE_NEW) { //only mew registrations event.
            $modReferal = $modx->getService('modreferal', 'modReferal', $modx->getOption('modreferal_core_path', null, $modx->getOption('core_path') . 'components/modreferal/') . 'model/modreferal/', $scriptProperties);
            if (!($modReferal instanceof modReferal)) return '';

            $referrerVar = $modx->getOption('mod_referrer_code_var', null, 'ref', true);
            $cookieVar = $modx->getOption('mod_referrer_cookie_var', null, 'ref_var', true);
            $cookieTime = $modx->getOption('mod_referrer_time', null, 86400 * 365, true);


            /* @var modReferalUsers $profile */
            if ($profile = $modx->getObject('modReferalUsers', $id)) { //create profile

                if (!empty($_COOKIE[$cookieVar])) {
                    /* @var modReferalUsers $ref_profile */
                    if (!$profile->get('referrer_id') && ($ref_profile = $modx->getObject('modReferalUsers', array('referrer_code' => $_COOKIE[$cookieVar]))))
                    { //check for ref code is valid
                        if ($ref_user = $modx->getObject('modUser',array( 'id' => $ref_profile->get('id' )) ) ) //save only if refferer is valid active user
                        {
                            if ($ref_user->get('active')==1)
                            {
                            $profile->set('referrer_id', $ref_profile->get('id'));
                            $profile->save();
                            }else
                            {
                                $modx->log(modX::LOG_LEVEL_ERROR, '[modReferal]Error while accepting referrer_id for user id:'.$id. ' :  ref_user ID '.$ref_profile->get('id' ).' is not active now!');


                            }

                        }
                        else
                        {
                            $modx->log(modX::LOG_LEVEL_ERROR, '[modReferal]Error while accepting referrer_id for user id:'.$id. ' :  ref_user with ID '.$ref_profile->get('id' ).' does not exists!');

                        }
                    }
                }
                setcookie($cookieVar, '', time() - $cookieTime);

            }

        }


        break;


}