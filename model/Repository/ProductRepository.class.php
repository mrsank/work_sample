<?php
/**
 * ProductRepostry fpr Product Model
 * @author     Rafal Wesolowski <wesolowski@nexus-netsoft.com>
 * @version    1.0
 */
class ProductRepository
{
    /**
     * Get alle product by Category
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @param  string $sCategoryName category name
     * @return object
     */
    public function getProductByCategory( $sCategoryName )
    {
        return Model::factory('product')
                    ->select('product.*')
                    ->join('categories', ['product.cat_id', '=', 'categories.id'])
                    ->where('categories.name', $sCategoryName)
                    ->order_by_asc('pos')
                    ->find_many();
    }

    /**
     * Get all product
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @return object
     */
    public function getAllProduct()
    {
        return Model::factory('product')
            ->select('product.*' )
            ->select('categories.name', 'catname' )
            ->join('categories', ['product.cat_id', '=', 'categories.id'])
            ->order_by_asc('categories.id')
            ->order_by_asc('pos')
            ->find_many();
    }



}