<?php
const DB_NAME = "db_songs";
const HOST = 'mysql:host=localhost;';
const DSN = HOST.'dbname='.DB_NAME.';charset=utf8';
const USERNAME = 'root';
const DB = new PDO(DSN, USERNAME, '');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
