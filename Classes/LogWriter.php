<?php

namespace AxelKummer\AkuLogBook;

use AxelKummer\LogBook\LoggerUtility;
use AxelKummer\LogBook\Request\HttpRequest;
use TYPO3\CMS\Core\Log\Writer\AbstractWriter;
use TYPO3\CMS\Core\Log\Writer\WriterInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extensionmanager\Utility\ConfigurationUtility;

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
    private $configuration;

    /**
     * LogWriter constructor.
     *
     * @param array $options
     *
     * @throws \AxelKummer\LogBook\Exception
     * @throws \TYPO3\CMS\Core\Log\Exception\InvalidLogWriterConfigurationException
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);

        $conf = $this->getConfiguration();

        LoggerUtility::setupRequest(
            $this->getRequestClass($conf),
            $conf['applicationName']['value'],
            $conf['hostName']['value'],
            $conf['port']['value']
        );
    }

    /**
     * Loads and returns the extension configuration
     *
     * @return array
     */
    private function getConfiguration()
    {
        if (!empty($this->configuration)) {
            return $this->configuration;
        }

        $configurationUtility = $this->getConfigurationUtility();
        $this->configuration = $configurationUtility->getCurrentConfiguration('aku_logbook');

        return $this->configuration;
    }

    /**
     * returns the classname of request class to use
     *
     * @param array $conf Config array
     *
     * @return string
     */
    private function getRequestClass(array $conf)
    {
        if ($conf['requestClass']['value'] !== $conf['requestClass']['dafult_value']) {
            return $conf['requestClass']['value'];
        } elseif ($conf['requestType']['value'] === "http") {
            return HttpRequest::class;
        }

        return '';
    }

    /**
     * Returns the configuration utility
     *
     * @return ConfigurationUtility
     */
    private function getConfigurationUtility()
    {
        $om = GeneralUtility::makeInstance(ObjectManager::class);
        return $om->get(ConfigurationUtility::class);
    }

    /**
     * @param \TYPO3\CMS\Core\Log\LogRecord $record
     *
     * @throws \AxelKummer\LogBook\Exception
     *
     * @return WriterInterface
     */
    public function writeLog(\TYPO3\CMS\Core\Log\LogRecord $record)
    {
        $logger = LoggerUtility::getLogger($record->getComponent());
        $logger->log(
            $record->getLevel(),
            $record->getMessage(),
            ['requestId' => $record->getRequestId(), 'data'=> $record->getData()]
        );

        return $this;
    }
}