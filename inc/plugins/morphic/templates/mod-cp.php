<?php 

// Activation functions
function mod_cp_activate() {
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
};

// Deactivation functions
function mod_cp_deactivate() {
    global $db;
    require_once MYBB_ROOT."/inc/adminfunctions_templates.php";
    find_replace_templatesets(
        "usercp_profile_profilefields",
        "#" . preg_quote('{$mod_cp}') . "#i",
        ''
    );

    $db->delete_query("templates", "title = 'morphic_mod_cp'");
};

// Start of Morphic Info section
$mod_cp = '
<fieldset class="trow2 morphic-fields">
    <legend>
        <strong>Morphic Info</strong>
    </legend>
    <table cellspacing="0" cellpadding="5" width="100%">
        <div>
            {$characters_list}
            <button id="new-character" class="">+ New Character</button>
        </div>
    </table>
</fieldset>';

// Builds list of existing characters
function characters_list() {
    global $mod_cp, $mybb, $db, $characters_list;
    $uid = $mybb->input['uid'];

    $characters_list = '';
    
    $userchars = get_user_chars($uid);
    foreach($userchars as $char) {
        $char_input_key = 'char_' . $char['char_id'];
        $forms = get_char_forms($char['char_id']);

        $characters_list .= '<div class="character" data-char-id="' . $char['char_id'] . '">';
        $characters_list .= '<input type="text" id="' . $char_input_key .'" name="' . $char_input_key . '" class="textbox" maxlength="20" value="' . $char['name'] .'"><br>';
        if ($forms) {
            $characters_list .= '<div class="forms">';
            foreach($forms as $form) {
                $form_input_key = 'form_' . $form['form_id'];
                $characters_list .= '<input type="text" id="' . $form_input_key .'" name="' . $form_input_key . '" class="textbox" maxlength="20" value="' . $form['species'] .'"><br>';
            }
            
        }
        $characters_list .= '<button id="new-form" class="new-form">+ New Form</button>';
        $characters_list .= '</div>';
        $characters_list .= '<hr style="background-color: #ccc">';
        $characters_list .= '</div>';

        echo '<pre style="text-align: left;">';
        print_r(get_char_forms($char['char_id']));
        echo '</pre>';
        
    }
};