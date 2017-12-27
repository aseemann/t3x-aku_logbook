<?php

namespace AxelKummer\AkuLogbook\Tests\Unit;

use AxelKummer\AkuLogbook\LogWriter;
use TYPO3\CMS\Core\Log\LogLevel;
use TYPO3\CMS\Core\Log\LogRecord;


/**
 * Class LogWriterTest
 *
 * @category TYPO3 Extension
 * @package  axel-kummer/aku-logbook
 * @author   Axel Kummer <kummeraxel@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @link     https://github.com/axel-kummer/aku-logbook
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