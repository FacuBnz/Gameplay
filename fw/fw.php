<?php

// fw/fw.php

require '../fw/Database.php';
require '../fw/Model.php';
require '../fw/View.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

if(!isset($_SESSION)){
    session_start();
}