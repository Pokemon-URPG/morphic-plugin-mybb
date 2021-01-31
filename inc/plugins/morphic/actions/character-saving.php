<?php
global $mybb, $db;

function save_new_characters() {
    global $mybb, $db;
    $uid = $mybb->input['uid']; // get user's ID
    $names = $_POST['newcharname']; // get entered character name
    if($names) {
        foreach($names as $name) {
            if(!empty($name)) {
                $db->insert_query('morphic_chars', [ // add new character as a row in database
                    'uid' => $uid,
                    'name'=> $name
                ]);
            }
        };
    }
}

function save_new_forms() {
    global $mybb, $db;
    $uid = $mybb->input['uid']; // get user's ID

    $current_char_ids = get_user_char_ids($uid); // get array of current characters

    $new_form_species = []; // create an array with each new form species and char id
    foreach($current_char_ids as $char_id) {
        $field_key = 'char_' . $char_id['char_id'] . '-newformspecies';
        $values = $_POST[$field_key];

        if(!empty($values)) {
            foreach ($values as $value) {
                $new_form_species[] = [
                    'species' => $value,
                    'char_id' => $char_id['char_id']
                ];
            }
        }
    }

    if(!empty($new_form_species)) {
        $db->insert_query_multiple('morphic_forms', $new_form_species);
    }


    
    // echo '<pre style="text-align: left;">';
    // print_r($new_form_species);
    // echo '</pre>';
}

function update_characters() {
    global $mybb, $db;
    $uid = $mybb->input['uid']; // get user's ID

    $existing_characters = get_user_chars($uid); // get array of current characters
    $form_keys = [];
    foreach($existing_characters as $char) {
        $form_keys[] = 'char_' . $char['char_id'];
    }

    $previous_data = [];
    foreach($existing_characters as $char) { // list of prev character names
        $previous_data[] = [
            'name' => $char['name'],
            'char_id' => $char['char_id'],
        ];
    };

    $current_data = [];
    foreach($form_keys as $index=>$input_names) { // use keys to get current input values
        $current_data[] = [
            'name' => $_POST[$input_names],
            'char_id' => $existing_characters[$index]['char_id'],
        ];
    };

    // Checks if the previous name is same as current
    foreach($previous_data as $index=>$previously) {
        if(!($previously['name'] === $current_data[$index]['name']) && (!empty($current_data[$index]['name']))) { // If is not the same
            $db->update_query(
                'morphic_chars', 
                ['name' => $current_data[$index]['name']],
                "char_id='" . $current_data[$index]['char_id'] . "'");
        }
    }


}