<?php
require_once MYBB_ROOT."/inc/adminfunctions_templates.php";
find_replace_templatesets(
    "usercp_profile_profilefields",
    "#" . preg_quote('{$mod_cp}') . "#i",
    ''
);