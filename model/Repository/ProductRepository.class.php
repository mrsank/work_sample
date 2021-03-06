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

        /*
         * @ Modified : Harisankar <mrsank@live.in>
         * @ Date : 08/11/2015
         * @ Purpose : Checking category name "Pizza" and fetching attributes accordingly
         */

        if($sCategoryName=="pizza" || $sCategoryName=="Pizza"){
            return Model::factory('product')
                ->raw_query('SELECT product.cat_id,product.name,product.cost, GROUP_CONCAT(attr.name) AS `attribute`
                from `attr`
                JOIN `attr2pizza` ON attr2pizza.attr_id = attr.id
                JOIN `product` ON attr2pizza.pizza_id = product.id
                WHERE attr.id = attr2pizza.attr_id AND product.id = attr2pizza.pizza_id
                GROUP BY attr2pizza.pizza_id')->find_many();
        }

        /* # Modification ends here... */
        
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

     /*
      * @ Modified : Harisankar <mrsank@live.in>
      * @ Date : 08/11/2015
      * @ Purpose : Fetching the products and category for generating XML
      */

    public function getProductAndCategory(){

        return Model::factory('product')
            ->raw_query('SELECT DISTINCT(product.id),product.name, product.cost, product.description, categories.name AS catname 
            FROM `product`
            LEFT JOIN `attr2pizza` on product.id = attr2pizza.pizza_id
            LEFT JOIN `categories` on product.cat_id = categories.id')->find_many();
    }

    /*
     * @ Modified : Harisankar <mrsank@live.in>
     * @ Date : 08/11/2015
     * @ Purpose : Fetching attributes for XML on the basis of product id
     */

    public function getAttribute($id){

       return Model::factory('product')
            ->raw_query("SELECT attr2pizza.pizza_id, attr.name FROM `attr2pizza` 
            JOIN `attr` ON attr2pizza.attr_id = attr.id 
            WHERE attr2pizza.pizza_id = $id")->find_many();
    }

}