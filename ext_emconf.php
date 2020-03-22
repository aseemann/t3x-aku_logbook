<?php
/**
 * Meta configuration for LogBook-PHP Wrapper
 */
$EM_CONF[$_EXTKEY] = array (
    'title' => 'LogBook PHP',
    'description' => 'TYPO3 Extension to send logs to the logbook server',
    'category' => 'plugin',
    'version' => '1.0.2',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearcacheonload' => 1,
    'author' => 'Axel Seemann',
    'author_email' => 'kummeraxel@gmail.com',
    'author_company' => '',
    'constraints' =>
        array (
            'depends' =>
                array (
                    'typo3' => '7.6.00-8.7.99',
                ),
            'conflicts' =>
                array (
                ),
            'suggests' =>
                array (
                ),
        ),
);
