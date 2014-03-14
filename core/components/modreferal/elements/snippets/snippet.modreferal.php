<?php

if ($modx->user->isAuthenticated()) {
    if ($modx->getCount('modReferalUsers',$modx->user->id)) {
        /* @var modCustomerProfile $profile */
        $profile = $modx->getObject('modReferalUsers', $modx->user->id);

        $referrerVar = $modx->getOption('mod_referrer_code_var', null, 'ref', true);

        $link=$modx->makeUrl(1,'', array($referrerVar =>$profile->get(referrer_code)),'full');

        $output = $link;

    } else $output = "Нет реферальной ссылки.Обратитесь к администрации сайта за разъяснениями.";

} else $output = "Нужна авторизация";


return $output;
