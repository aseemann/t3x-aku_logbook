<?php
/**
 * Extension Configuration Script.
 *
 * Application Common
 */
if(!defined('TYPO3_MODE')){
    die('Access denied.');
}

/**
 * Add writer to TYPO3
 */
$writerConfiguration = array(
    // add a LogBook Writer
    \AxelKummer\AkuLogbook\LogWriter::class => array()
);

if (false === is_array($GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::DEBUG])) {
    $GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::DEBUG] = [];
}

$GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::DEBUG] = array_merge(
    $writerConfiguration,
    $GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::DEBUG]
);

/**
 * Register DevLogger
 */
if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_div.php']['devLog'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_div.php']['devLog'] = [];
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_div.php']['devLog'][]
    = \AxelKummer\AkuLogbook\DevLogger::class . "->devLogger";