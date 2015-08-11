<?php
/**
 * (Controller-) Class for Public-View
 *
 * @author     Rafal Wesolowski <wesolowski@nexus-netsoft.com>
 * @version    1.0
 */
class Frontend extends Controller {

    /**
     * Renders the start page
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @return void
     */
    public function homeAction()
    {
        $this->addTplParam( 'url', 'menu-pizza.html' );
        $this->render('index');
    }

    /**
     * Renders the main page
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @return void
     */
    public function mainAction()
    {
        $sNameSpies = $_GET['spies'];

        $oProductInfo = $this->_getProductReposirty()->getProductByCategory( $sNameSpies );

        $this->addTplParam( 'sNameSpies', $sNameSpies );
        $this->addTplParam( 'oProductInfo', $oProductInfo );

        $this->render('menu');
    }

}