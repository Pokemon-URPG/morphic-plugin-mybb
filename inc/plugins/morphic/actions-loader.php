<?php

include(MORPHIC_PATH . '/actions/character-saving.php');

$plugins->add_hook('modcp_do_editprofile_start', 'save_new_characters');
$plugins->add_hook('modcp_do_editprofile_start', 'update_characters');
$plugins->add_hook('modcp_do_editprofile_start', 'save_new_forms');