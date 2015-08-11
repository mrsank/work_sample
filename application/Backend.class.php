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


    /*
      * @ Modified : Harisankar <mrsank@live.in>
      * @ Date : 08/11/2015
      * @ Purpose : Generation of XML file
      */

    public function getXmlFile(){

        $aProductInfo = $this->_getProductReposirty()->getProductAndCategory();

        header( "content-type: application/xml; charset=ISO-8859-15" );
        $xml = new DOMDocument( "1.0", "ISO-8859-15" );

        $xml_products = $xml->createElement( "products" );

        foreach ($aProductInfo as $value) {

            $xml_product = $xml->createElement( "product" );
            $xml_name = $xml->createElement( "name", $value->name);
            $xml_product->appendChild( $xml_name );
            $xml_price = $xml->createElement( "price", $value->cost);
            $xml_product->appendChild( $xml_price );
            $xml_description = $xml->createElement( "description", $value->description);
            $xml_product->appendChild( $xml_description );
            $xml_category = $xml->createElement( "category", $value->catname);
            $xml_product->appendChild( $xml_category );

            $id = $value->id;
            $attribute = $this->_getProductReposirty()->getAttribute($id);
            $xml_attribute = $xml->createElement( "attributes" );

            foreach ($attribute as $attr) {
                $xml_attri = $xml->createElement( "attribute", $attr->name);
                $xml_attribute->appendChild( $xml_attri );
                $attri = $attr->name;
            }

            $xml_product->appendChild( $xml_attribute );
            
            $xml_products->appendChild( $xml_product );
            
            $xml->appendChild( $xml_products );
        }

        print $xml->saveXML();
    }

}