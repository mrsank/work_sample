<?php
/**
 * Product ORM Model
 *
 * @author     Rafal Wesolowski <wesolowski@nexus-netsoft.com>
 * @version    1.0
 */
class Product extends Model {

    /**
     * @todo Get all attributes for pizza product
     *
     * @return string
     */
    protected function _getPizzaAttr()
    {
        /*
         * @ Modified : Harisankar <mrsank@live.in>
         * @ Date : 08/11/2015
         * @ Purpose : Fetching and displaying the attribute of cat_id 1 (Pizza)
         */

        return $this->attribute; 
    }

    /**
     * Get product description.
     * For Pizza product -> all attributes
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @return string
     */
    public function getDescription()
    {
        return ((int)$this->cat_id === 1)
                ? $this->_getPizzaAttr()
                : $this->description;

    }
}