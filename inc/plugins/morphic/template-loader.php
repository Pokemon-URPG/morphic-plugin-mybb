<?php 

include(MORPHIC_TEMPLATE . "mod-cp.php");

$plugins->add_hook('modcp_editprofile_start', 'mod_cp_template');

function mod_cp_template() {
    global $mod_cp, $templates;

    eval("\$mod_cp = \"".$templates->get("morphic_mod_cp")."\";"); 
};