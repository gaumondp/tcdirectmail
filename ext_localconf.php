<?php

$tempFilePath = t3lib_extMgm::extPath('tcdirectmail');
$TYPO3_CONF_VARS['EXTCONF']['tcdirectmail']['includeClassFiles'] = array(
    $tempFilePath.'class.tx_tcdirectmail_target_beusers.php',
    $tempFilePath.'class.tx_tcdirectmail_target_csvfile.php',
    $tempFilePath.'class.tx_tcdirectmail_target_fegroups.php',
    $tempFilePath.'class.tx_tcdirectmail_target_fepages.php',
    $tempFilePath.'class.tx_tcdirectmail_target_html.php',
    $tempFilePath.'class.tx_tcdirectmail_target_csvlist.php',
    $tempFilePath.'class.tx_tcdirectmail_target_csvurl.php',
    $tempFilePath.'class.tx_tcdirectmail_target_rawsql.php',
    $tempFilePath.'class.tx_tcdirectmail_target_ttaddress.php',
    $tempFilePath.'class.tx_tcdirectmail_plain_html2text.php',
    $tempFilePath.'class.tx_tcdirectmail_plain_lynx.php',
    $tempFilePath.'class.tx_tcdirectmail_plain_simple.php',
    $tempFilePath.'class.tx_tcdirectmail_plain_template.php');
    
   
if (!isset($TYPO3_CONF_VARS['EXTCONF']['tcdirectmail']['extraMailHeaders']['X-Mailer'])) $TYPO3_CONF_VARS['EXTCONF']['tcdirectmail']['extraMailHeaders']['X-Mailer'] = 'TYPO3 CMS - tcdirectmail extension';
if (!isset($TYPO3_CONF_VARS['EXTCONF']['tcdirectmail']['extraMailHeaders']['X-Precedence'])) $TYPO3_CONF_VARS['EXTCONF']['tcdirectmail']['extraMailHeaders']['X-Precedence'] = 'bulk';
if (!isset($TYPO3_CONF_VARS['EXTCONF']['tcdirectmail']['extraMailHeaders']['X-Provided-by'])) $TYPO3_CONF_VARS['EXTCONF']['tcdirectmail']['extraMailHeaders']['X-Sponsored-by'] = 'http://www.casalogic.dk/ - Open Source Experts.';
$TYPO3_CONF_VARS['EXTCONF']['kickstarter']['sections']['tx_tcdirectmail_targets'] = array(
    'classname' => 'tx_tcdirectmail_section_targets',
    'filepath' => 'EXT:tcdirectmail/sections/class.tx_tcdirectmail_section_targets.php',
    'title' => 'Make a new directmail target',
    'description' => 'Create additional directmail targets, based on your own tables.',
);

/** * Registering class to scheduler
*/
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_tcdirectmail_scheduler'] = array(
	'extension' => $_EXTKEY,
	'title' => 'TcDirectMail task',
	'description' => 'This task invokes tcdirectmail in order to process queued messages.',
);

?>