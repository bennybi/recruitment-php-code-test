<?php

/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  : 
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;
use App\App\Demo;
use App\Util\HttpRequest;

class DemoTest extends TestCase {

    protected $_logger;
    protected $_request;

    public function __construct() {
        parent::__construct();
//        $this->_logger = new AppLogger(AppLogger::TYPE_LOG4PHP);
        $this->_logger = new AppLogger(AppLogger::TYPE_LOGTP);
        $this->_request = new HttpRequest();
    }

    public function test_foo() {
        
    }

    /**
     * 題目 2：編寫單元測試
     */
    public function test_get_user_info() {
        $demo = new Demo($this->_logger, $this->_request);
        $data = $demo->get_user_info();
//        $this->_logger->info(print_r($data, true));
//        $this->_logger->debug('debug info');
//        $this->_logger->error('error info');
        
        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('username', $data);
    }

}
