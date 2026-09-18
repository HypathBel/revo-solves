<?php


namespace App\Application\UseCases\Products;

class CalculateProductCost
{
    public function execute(array $products, array $types): float
    {
        $cost = 0.0;

        for ($i = 0; $i < count($products); $i++) {

            if (!in_array(strtolower($products[$i]['product_type']), array_map('strtolower', $types))) {
                continue; // Skip if product type is not in the specified types
            }

            if (!array_key_exists('variants', $products[$i]) || !is_array($products[$i]['variants'])) {
                continue; // Skip if 'variants' key is missing or not an array
            }

            $cost += array_reduce(
                $products[$i]['variants'], 
                function ($carry, $variant) {
                    return $carry + floatval($variant['price']);
                }, 
                0
            );
        }

        return $cost;
    }
}