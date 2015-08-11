<?php

/**
 * (Controller-) Class for Admin-View
 * @author     Rafal Wesolowski <wesolowski@nexus-netsoft.com>
 * @version    1.0
 */
class Backend extends Controller  {

    /**
     * Renders the admin page
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @return void
     */
    public function showProduct()
    {
        $oProductInfo = $this->_getProductReposirty()->getAllProduct();

        $this->addTplParam( 'oProductInfo', $oProductInfo );
        $this->addTplParam( 'url', 'menu-pizza.html' );

        $this->render('admin');
    }

}