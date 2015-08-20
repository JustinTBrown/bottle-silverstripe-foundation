<?php
global $project;
$project = 'project';
define('SOURCE_PATH', dirname(realpath(__FILE__)));
if (isset($_SERVER) && array_key_exists('SERVER_NAME', $_SERVER)) {
  $serverName = $_SERVER['SERVER_NAME'];
} else {
  global $_FILE_TO_URL_MAPPING;
  $basePath = dirname(SOURCE_PATH);
  $urlInfo = parse_url($_FILE_TO_URL_MAPPING[$basePath]);
  $serverName = $urlInfo['host'];
}
global $databaseConfig;
switch ($serverName) {
  // LIVE SITE SETTINGS
  case 'production.com':
    Director::set_environment_type('live');
    $databaseConfig = array(
      "type" => 'MySQLDatabase',
      "server" => 'localhost',
      "username" => 'database_username',
      "password" => 'username_password',
      "database" => 'database',
      "path" => '',
    );
  break;
  // STAGING SITE SETTINGS
  case 'project.stagingserver.com':
    Director::set_environment_type('test');
    $databaseConfig = array(
      "type" => 'MySQLDatabase',
      "server" => 'localhost',
      "username" => 'project',
      "password" => 'password',
      "database" => 'project_com',
      "path" => '',
    );
  break;
  // STAGING SITE SETTINGS
  case 'project.bottle.is':
    Director::set_environment_type('test');
    $databaseConfig = array(
      "type" => 'MySQLDatabase',
      "server" => 'localhost',
      "username" => 'project',
      "password" => 'project',
      "database" => 'project',
      "path" => '',
    );
  break;
  // LOCAL DEV SITE SETTING
  default:
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
    Director::set_environment_type('dev');
    $databaseConfig = array(
      "type" => 'MySQLDatabase',
      "server" => 'localhost',
      "username" => 'project',
      "password" => 'project',
      "database" => 'project',
      "path" => '',
    );
  break;
}
// New in 3.1 MySQLDatabase.connection_charset
MySQLDatabase::set_connection_charset('utf8');
SSViewer::set_theme('project-theme');
// Set the site locale
i18n::set_locale('en_CA');
// IF WE USE BLOG
// BlogEntry::allow_wysiwyg_editing();
// Enable nested URLs for this site (e.g. page/sub-page/)
if(class_exists('SiteTree')) SiteTree::enable_nested_urls();
// Config the TinyMCE editor
HtmlEditorConfig::get('cms')->setOptions(array(
  'theme_advanced_blockformats' => 'p,h2,h3,h4',
  'extended_valid_elements' => "select[class|id|style],option[value],img[class|src|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|usemap],iframe[src|name|width|height|align|frameborder|marginwidth|marginheight|scrolling|class],object[width|height|data|type],param[name|value],map[class|name|id],area[shape|coords|href|target|alt],script[charset|defer|language|src|type],onclick[class]",
  'verify_html,div[style|class]' => TRUE,
  'cleanup' => TRUE,
  'cleanup_on_startup' => FALSE,
  'theme_advanced_statusbar_location' => 'bottom',
  'theme_advanced_path' => TRUE
  //'validate_children' => TRUE,
));
HtmlEditorConfig::get('cms')->insertButtonsAfter('formatselect', 'removeformat');
HtmlEditorConfig::get('cms')->insertButtonsAfter('formatselect', 'sup');
HtmlEditorConfig::get('cms')->insertButtonsAfter('formatselect', 'sub');
HtmlEditorConfig::get('cms')->removeButtons('justifyfull');
// HtmlEditorConfig::get('cms')->removeButtons('blockquote');
HtmlEditorConfig::get('cms')->removeButtons('paste', 'copy', 'cut');
// Default Admin Email for From
Email::setAdminEmail('contact@bottle.is');
// Set up a default admin / pass
Security::setDefaultAdmin('admin','password');
// Up the JPG quality
GD::set_default_quality(100);
// Remove Comment Admin
//CMSMenu::remove_menu_item('CommentAdmin');
// Object::add_extension('Page', 'FoundationExtension');
// Object::add_extension('SiteConfig', 'CustomSiteConfig');
FulltextSearchable::enable();
// Object::add_extension('SiteConfig', 'CustomSiteConfig');
// Shortcode Setup
//ShortcodeParser::get()->register('VideoPlayer', array('VideoExtension', 'VideoHandler'));
// Object::add_extension('Page', 'DataObjectOnVersioningDecorator');