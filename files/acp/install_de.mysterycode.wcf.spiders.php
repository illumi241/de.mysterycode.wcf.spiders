<?php

use wcf\data\cronjob\CronjobAction;
use wcf\data\cronjob\CronjobList;

$cronList = new CronjobList();
$cronList->getConditionBuilder()->add('cronjob.className = ?', array('wcf\system\cronjob\RefreshSearchRobotsCronjob'));
$cronList->readObjects();
$cron = $cronList->current();

if (!$cron->isDisabled) {
	$cronAction = new CronjobAction(array($cron), 'toggle');
	$cronAction->executeAction();
}
