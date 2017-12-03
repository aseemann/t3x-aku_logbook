<?php

namespace AxelKummer\AkuLogBook;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;


/**
 * Class DevLogger
 *
 * @category DevLogger
 * @package  axel-kummer/aku-logbook
 * @author   Axel Kummer <kummeraxel@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @link     https://github.com/axel-kummer/logbook-php
 */
class DevLogger
{
    /**
     * DevLogger
     *
     * @param array $params Array with logging parameters
     *
     * @return void
     */
    public function devLogger(array $params)
    {
        /**
         * @var LogManager $logManager
         */
        $logManager = GeneralUtility::makeInstance(LogManager::class);
        $logger = $logManager->getLogger($params['extKey']);

        $data = is_array($params['dataVar']) ? $params['dataVar'] : [];
        $severity = ($params['severity'] < 0) ? $params['severity'] * -1: $params['severity'];


        $logger->log($severity, $params['msg'], $data);
    }
}