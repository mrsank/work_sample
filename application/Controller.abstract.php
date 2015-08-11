<?php

/**
 * Pattern for Controller
 *
 * @author     Rafal Wesolowski <wesolowski@nexus-netsoft.com>
 * @version    1.0
 */
abstract class Controller {

    /**
     * Load Class
     *
     * @var object
     */
    protected $oLoad = null;

    /**
     * ProductRepository Class
     *
     * @var object
     */
    protected $oProductRepository = null;

    /**
     * Class constructor, sets oLoad and oProductRepository.
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     */
    public function __construct()
    {
        $this->oLoad = new Load();
        $this->oProductRepository = new ProductRepository();
    }

    /**
     * Getter for oProductRepository
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @return ProductRepository
     */
    protected function _getProductReposirty()
    {
        return $this->oProductRepository;
    }

    /**
     * Call Active Page
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @return void
     */
    public function init()
    {
        if(!isset($_GET['page']))
        {
            $this->homeAction();
        }
        elseif ( method_exists($this,$_GET['page']) )
        {
            $sNameFunction = $_GET['page'];
            $this->$sNameFunction();
        }
        else
        {
            $this->error404Action();
        }
    }

    /**
     * Call Error Page
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @return void
     */
    public function error404Action()
    {
        $this->render('index');
    }

    /**
     * Render Function
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @param  string $sPage Pagename
     * @return void
     */
    public function render( $sPage )
    {
        $this->oLoad->render( $sPage );
    }

    /**
     * Getter for aData
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @param  string $sParamName parameter name
     * @param  mixed  $mValue     parameter value
     * @return void
     */
    public function addTplParam( $sParamName, $mValue )
    {
        $this->oLoad->addTplParam( $sParamName, $mValue );
    }
}