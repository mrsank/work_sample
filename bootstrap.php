<?php

error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

require_once "vendor/autoload.php";
require_once "config.php";

require_once 'application/Load.class.php';
require_once 'application/Controller.abstract.php';
require_once 'application/Backend.class.php';
require_once 'application/Frontend.class.php';
require_once 'model/Product.class.php';
require_once 'model/Repository/ProductRepository.class.php';