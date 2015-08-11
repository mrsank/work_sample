<?php
/**
 * Class for View-Load
 *
 * @author     Rafal Wesolowski <wesolowski@nexus-netsoft.com>
 * @version    1.0
 */
class Load {

    /**
     * Smarty Tpl-Parameter
     *
     * @var array
     */
    protected $aData = [];

    /**
     * Smarty Class
     *
     * @var object
     */
    protected $oSmarty = null;

    /**
     * Class constructor, sets Smarty
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     */
    public function __construct()
    {
        $this->oSmarty = new Smarty();
        $this->oSmarty->setCacheDir(SMARTY_PATH);
        $this->oSmarty->setCompileDir(SMARTY_PATH.DS."templates_c");
    }

    /**
     * Binds template files with a Smarty
     *
     * @author Rafal Wesolowski <wesolowski@nexus-netsoft.com>
     * @param string $sFileName template filename
     * @return void
     */
    public function render( $sFileName )
    {
        $sTplPath = dirname(__DIR__) . '/views/page/';
        $this->oSmarty->setTemplateDir( $sTplPath );
        $this->oSmarty->assign( $this->aData );
        $this->oSmarty->display( $sTplPath . $sFileName .'.tpl' );
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
        $this->aData[$sParamName] = $mValue;
    }

}




