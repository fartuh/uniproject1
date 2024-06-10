<?php

session_start();

define('METHOD', strtolower($_SERVER['REQUEST_METHOD']));
define('PAGE', trim($_GET['url']));

require('core/BaseController.php');
require('core/DB.php');


$controller = new BaseController(METHOD, 'url');
$controller->map();



?>
