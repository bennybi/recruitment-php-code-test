<?php

namespace App\Service;

use App\Util\Yii\ArrayHelper;

class ProductHandler {

    /**
     * 商品金额小计
     * Get products subtotal price
     * @param array $products
     * @param array $params
     */
    public static function getSubtotal($products, $params = []) {
        $result = 0;
        foreach ($products as $product) {
            $result += $product['price'] ?: 0;
        }
        return $result;
    }

    /**
     * 支持对商品多字段排序, 多元过滤
     * support products mutiple sorts and filters
     * 
     * @param type $products
     * @param type $sort
     * @param type $filters 
     * @return type
     */
    public static function sortAndFilters($products, $sorts, $filters) {
        $arrs = $products;
        ArrayHelper::multisort($arrs, $sorts, SORT_DESC, SORT_NUMERIC);
        $result = array_filter($arrs, function($item) use ($filters) {
            $flag = true;
            foreach ($filters as $k => $v) {
                if ($item[$k] !== $v) {
                    $flag = false;
                }
            }
            return $flag;
        });
        return $result;
    }

    public static function convertToTimestamp(&$products) {
        foreach ($products as &$product) {
            $product['create_at'] = strtotime($product['create_at']);
        }
    }

}
