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
    // configuration for ERROR level log entries
    \TYPO3\CMS\Core\Log\LogLevel::DEBUG => array(
        // add a FileWriter
        \AxelKummer\AkuLogBook\LogWriter::class => array()
    )
);