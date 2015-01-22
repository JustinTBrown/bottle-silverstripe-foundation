<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => 'root',
	"password" => 'wesleysnipes',
	"database" => 'SS_cfsunalta',
	"path" => '',
);

// Set the site locale
i18n::set_locale('en_US');