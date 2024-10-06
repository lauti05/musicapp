<?php
const DB_NAME = "db_songs";
const HOST = 'mysql:host=localhost;';
const DSN = HOST.'dbname='.DB_NAME.';charset=utf8';
CONST USERNAME = 'root';
const DB = new PDO(DSN, USERNAME, '');