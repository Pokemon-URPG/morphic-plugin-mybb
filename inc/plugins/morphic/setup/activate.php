<?php
global $db, $mod_cp;

$insert_array = array(
    'title' => 'morphic_mod_cp',
    'template' => $db->escape_string($mod_cp),
    'sid' => '-1',
    'version' => '',
    'dateline' => time(),
);

$db->insert_query('templates', $insert_array);

require_once MYBB_ROOT."/inc/adminfunctions_templates.php";
find_replace_templatesets(
    "usercp_profile_profilefields",
    "#" . preg_quote('</fieldset>') . "#i",
    '</fieldset>{$mod_cp}'
);