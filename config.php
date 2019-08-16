<?php
date_default_timezone_set("America/Sao_Paulo");
define('CHARSET', 'UTF-8');
setlocale(LC_ALL, 'pt-BR');
ini_set('error_reporting', E_ALL);
ini_set('log_errors', true);
ini_set('html_errors', true);
ini_set('display_errors', true);
require 'environment.php';
global $config;
global $db;
$config = array();
define("BASE_URL", "http://localhost/esmalteria/");
define('VERSAO', '1.0.0'); //Maior / Menor / Release
define('BUILD', 'Beta');
$db = new PDO("mysql:dbname=esmalteria;host:localhost", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8, lc_time_names='pt_BR';"));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
