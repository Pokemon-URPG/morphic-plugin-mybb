<?php
global $morphic_includes;

function morphic_includes_activate() {
    global $db, $morphic_includes;
    $insert_array = array(
        'title' => 'morphic_includes',
        'template' => $db->escape_string($morphic_includes),
        'sid' => '-1',
        'version' => '',
        'dateline' => time(),
    );

    $db->insert_query('templates', $insert_array);

    require_once MYBB_ROOT."/inc/adminfunctions_templates.php";
    find_replace_templatesets(
        "headerinclude",
        "#" . preg_quote('{$stylesheets}') . "#i",
        '{$morphic_includes}{$stylesheets}'
    );
};

// Deactivation functions
function morphic_includes_deactivate() {
    global $db;

    require_once MYBB_ROOT."/inc/adminfunctions_templates.php";
    find_replace_templatesets(
        "headerinclude",
        "#" . preg_quote('{$morphic_includes}') . "#i",
        ''
    );

    $db->delete_query("templates", "title = 'morphic_includes'");
};

$morphic_includes = '
    <script type="text/javascript" src="' . $mybb->asset_url . '/jscripts/morphic.js"></script>
';