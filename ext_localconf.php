<?php
/**
 * Extension Configuration Script.
 *
 * Application Common
 */
if(!defined('TYPO3_MODE')){
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'] = array(
    // configuration for DEBUG level log entries
    \TYPO3\CMS\Core\Log\LogLevel::DEBUG => array(
        // add a FileWriter
        \AxelKummer\AkuLogBook\LogWriter::class => array()
    )
);

if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_div.php']['devLog'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_div.php']['devLog'] = [];
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_div.php']['devLog'][]
    = \AxelKummer\AkuLogBook\DevLogger::class . "->devLogger";