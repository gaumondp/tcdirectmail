<?php
/**
 * This is the htmlmail-opened-ping script, that detects if a user has opened the mail
 */
 
$authcode = addslashes($_REQUEST['c']);
$sendid = intval($_REQUEST['s']); 

require ('browserrun.php');
require (t3lib_extMgm::extPath('tcdirectmail').'class.tx_tcdirectmail_target.php');
require (t3lib_extMgm::extPath('tcdirectmail').'class.tx_tcdirectmail_tools.php');


/* Talk talk talk :) */
$TYPO3_DB->sql_query("UPDATE tx_tcdirectmail_sentlog SET beenthere = 1 WHERE authcode = '$authcode' AND uid = $sendid");

$rs = $TYPO3_DB->sql_query("SELECT target, user_uid FROM tx_tcdirectmail_sentlog WHERE authcode = '$authcode' AND uid = $sendid");
if (list($targetUid, $userUid) = $TYPO3_DB->sql_fetch_row($rs)) {
	$target = tx_tcdirectmail_target::getTarget($targetUid);
	$target->registerOpen($userUid);
}

header ('Content-type: image/gif');
readfile (BASE.'clear.gif');
?>
