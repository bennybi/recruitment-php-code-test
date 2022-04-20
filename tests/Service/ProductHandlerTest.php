<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase {

    protected $_logger;

    public function __construct() {
        parent::__construct();
        $this->_logger = new AppLogger('log4php');
    }

    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    /**
     * 1. 在 \App\Service\ProductHandler 類 (class)，並編寫一個函数（function) ，用來計算商品總金額
     */
    public function testGetTotalPrice() {
//        $totalPrice = 0;
//        foreach ($this->products as $product) {
//            $price = $product['price'] ?: 0;
//            $totalPrice += $price;
//        }

        $totalPrice = ProductHandler::getSubtotal($this->products);

        $this->assertEquals(143, $totalPrice);
    }

    /**
     * 2. 在 \App\Service\ProductHandler 類，編寫一個函數，把商品以金額排序（由大至小），並篩選商品類種是 “dessert” 的商品。
     */
    public function testSortAndFilters() {
//        $result = ProductHandler::sortAndFilters($this->products, 'price', ['type' => 'Dessert']);
////        $result = ProductHandler::sortAndFilters($this->products, 'price', ['type' => 'Dessert', 'name' => 'Persi']);
//        $this->_logger->info("\n 2. 在 \App\Service\ProductHandler 類，編寫一個函數，把商品以金額排序（由大至小），並篩選商品類種是 “dessert” 的商品。");
//        $this->_logger->info(print_r($result, true) . "\n");
    }

    /**
     * 3. 在 \App\Service\ProductHandler 類，編寫一個函數，把創建日期轉換為 unix timestamp。
     */
    public function testConvertToTimestamp() {
//        ProductHandler::convertToTimestamp($this->products);
//        $this->_logger->info("\n 3. 在 \App\Service\ProductHandler 類，編寫一個函數，把創建日期轉換為 unix timestamp。");
//        $this->_logger->info(print_r($this->products, true) . "\n");
    }

}
