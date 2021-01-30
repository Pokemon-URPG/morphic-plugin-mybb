<?php
global $db;

$db->drop_table('morphic_chars');
$db->drop_table('morphic_forms');
$db->drop_table('morphic_posts');

$db->delete_query("templates", "title = 'morphic_mod_cp'");
