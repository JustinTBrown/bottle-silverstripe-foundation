<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => 'user',
	"password" => 'password',
	"database" => 'SS_[database name here]',
	"path" => '',
);

// Set the site locale
i18n::set_locale('en_US');