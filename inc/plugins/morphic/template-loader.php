<?php 


// The template + the activate & deactive functions are defined here and used in the activate and deactivate.php

// The template that contains Morphic scripts and styles
include(MORPHIC_TEMPLATE . "morphic-includes.php");

// Add the hook where the global variable is inserted for execution
$plugins->add_hook('modcp_editprofile_start', 'scripts_styles');
function scripts_styles() {
    global $morphic_includes, $templates;

    eval("\$morphic_includes = \"".$templates->get("morphic_includes")."\";"); 
};




// The main Morphic Info section in the Mod CP
include(MORPHIC_TEMPLATE . "mod-cp.php");

// Add the hook where the global variable is inserted for execution
$plugins->add_hook('modcp_editprofile_start', 'mod_cp_template');
function mod_cp_template() {
    global $mod_cp, $templates, $mybb, $db, $characters_list;
    // echo '<pre style="text-align:left">';
    // print_r($mybb->input['uid']);
    // echo '</pre>';

    characters_list();

    eval("\$mod_cp = \"".$templates->get("morphic_mod_cp")."\";"); 
};
