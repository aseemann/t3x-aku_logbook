<?php

namespace AxelKummer\AkuLogBook\Tests\Unit;

use AxelKummer\AkuLogBook\LogWriter;
use TYPO3\CMS\Core\Log\LogLevel;
use TYPO3\CMS\Core\Log\LogRecord;


/**
 * Class LogWriterTest
 *
 * @category Category
 * @package  Package
 * @author   Axel Kummer <kummeraxel@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @link     https://github.com/axel-kummer/logbook-php
 */
class LogWriterTest
{
    public function testWriteLog()
    {
        $logWriter = new LogWriter();
        $record = new LogRecord('TestLogger', LogLevel::DEBUG, 'TestMessage');

        $logWriter->writeLog($record);
    }
}