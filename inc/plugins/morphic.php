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

// Global helper functions
function get_user_chars($uid) {
    global $db;

    $userchars = $db->query("SELECT * FROM ". TABLE_PREFIX ."morphic_chars WHERE uid=" . $uid);
    $chararray = [];
    while($results = mysqli_fetch_assoc($userchars)) {
        foreach($userchars as $char) {
            $chararray[] = $char;
        }
    }

    return $chararray;
};

function get_user_char_ids($uid) {
    global $db;

    $userchars = $db->query("SELECT char_id FROM ". TABLE_PREFIX ."morphic_chars WHERE uid=" . $uid);
    while($results = mysqli_fetch_assoc($userchars)) {
        foreach($userchars as $char) {
            $chararray[] = $char;
        }
    }

    return $chararray;
};

function get_char_forms($char_id) {
    global $db;

    $userchars = $db->query("SELECT * FROM ". TABLE_PREFIX ."morphic_forms WHERE char_id=" . $char_id);
    while($results = mysqli_fetch_assoc($userchars)) {
        foreach($userchars as $char) {
            $chararray[] = $char;
        }
    }

    return $chararray;
};


include(MORPHIC_PATH . 'template-loader.php');
include(MORPHIC_PATH . 'actions-loader.php');