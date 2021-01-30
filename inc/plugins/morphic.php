<?php

// Disallow direct access to this file for security reasons
if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.");
}

if(!defined('MORPHIC_PATH')) {
    define('MORPHIC_PATH', MYBB_ROOT . 'inc/plugins/morphic/');
}
if(!defined('MORPHIC_TEMPLATE')) {
    define('MORPHIC_TEMPLATE', MYBB_ROOT . 'inc/plugins/morphic/templates/');
}


include(MORPHIC_PATH . 'template-loader.php');


function morphic_info()
{
	return array(
		"name"			=> "Morphic - Pokemon URPG",
		"description"	=> "A plugin that installs advanced forum features created custom for the Pokemon URPG.",
		"website"		=> "",
		"author"		=> "K'sariya",
		"authorsite"	=> "",
		"version"		=> "1.0",
		"guid" 			=> "",
		"codename"		=> "morphic",
		"compatibility" => "*"
	);
}

function morphic_install()
{
    include(MORPHIC_PATH . '/setup/install.php');

};

function morphic_is_installed()
{
    global $db;

    if($db->table_exists("morphic_chars")) {
        return true;
    }

    return false;
}

function morphic_uninstall()
{
    include(MORPHIC_PATH . '/setup/uninstall.php');
}

function morphic_activate()
{
    include(MORPHIC_PATH . '/setup/activate.php');
}

function morphic_deactivate()
{
    include(MORPHIC_PATH . '/setup/deactivate.php');
}