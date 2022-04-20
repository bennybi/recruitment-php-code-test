<?php

namespace App\Service;

use think\facade\Log;

class AppLogger {

    const TYPE_LOG4PHP = 'log4php';
    const TYPE_LOGTP = 'think-log';

    private $logger;
    private $_type;

    public function __construct($type = self::TYPE_LOG4PHP) {
        $this->_type = $type;
        switch ($this->_type) {
            case static::TYPE_LOGTP:
                $this->logger = Log::instance();
                $this->logger->init([
                    'default' => 'file',
                    'channels' => [
                        'file' => [
                            'type' => 'file',
                            'path' => dirname(__DIR__) . "/logs/",
                        ],
                    ],
                ]);
                break;
            default:
                $this->logger = \Logger::getLogger("Log");
        }
    }

    public function info($message = '') {
        if ($this->_type == static::TYPE_LOGTP) {
            $this->logger->info(strtoupper($message));
            return;
        }
        $this->logger->info($message);
    }

    public function debug($message = '') {
        if ($this->_type == static::TYPE_LOGTP) {
            $this->logger->debug(strtoupper($message));
            return;
        }
        $this->logger->debug($message);
    }

    public function error($message = '') {
        if ($this->_type == static::TYPE_LOGTP) {
            $this->logger->error(strtoupper($message));
            return;
        }
        $this->logger->error($message);
    }

}
