<?php

namespace AxelKummer\AkuLogBook;

use AxelKummer\LogBook\LoggerUtility;
use TYPO3\CMS\Core\Log\Writer\AbstractWriter;
use TYPO3\CMS\Core\Log\Writer\WriterInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Class LogWriter
 *
 * @category Category
 * @package  Package
 * @author   Axel Kummer <kummeraxel@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @link     https://github.com/axel-kummer/logbook-php
 */
class LogWriter extends AbstractWriter
{
    /**
     * @param \TYPO3\CMS\Core\Log\LogRecord $record
     *
     * @throws \AxelKummer\LogBook\Exception
     *
     * @return WriterInterface
     */
    public function writeLog(\TYPO3\CMS\Core\Log\LogRecord $record)
    {
        DebuggerUtility::var_dump($record, "LogRecord");
        DebuggerUtility::var_dump($this, "LogWriter");

        $logger = LoggerUtility::getLogger($record->getComponent());
        $logger->log(
            $record->getLevel(),
            $record->getMessage(),
            ['requestId' => $record->getRequestId(), 'data'=> $record->getData()]
        );

        return $this;
    }
}