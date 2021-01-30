<?php
global $db, $templates;

if (!$db->table_exists('morphic_chars')) {
    $db->write_query(
        "CREATE TABLE " . TABLE_PREFIX . "morphic_chars(
            `char_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `uid` int(10) unsigned NOT NULL,
            `name` varchar(20),
            PRIMARY KEY (`char_id`),
            FOREIGN KEY (`uid`) REFERENCES `" . TABLE_PREFIX . "users` (`uid`)
        ) ENGINE=MyISAM{$collation};"
    );
};

if (!$db->table_exists('morphic_forms')) {
    $db->write_query(
        "CREATE TABLE " . TABLE_PREFIX . "morphic_forms(
            `form_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `post_id` int(10) unsigned NOT NULL,
            `species` varchar(30),
            PRIMARY KEY (`form_id`),
            FOREIGN KEY (`post_id`) REFERENCES `" . TABLE_PREFIX . "posts` (`pid`)
        ) ENGINE=MyISAM{$collation};"
    );
};

if (!$db->table_exists('morphic_posts')) {
    $db->write_query(
        "CREATE TABLE " . TABLE_PREFIX . "morphic_posts(
            `form_id` int(10) unsigned NOT NULL,
            `post_id` int(10) unsigned NOT NULL,
            FOREIGN KEY (`form_id`) REFERENCES `" . TABLE_PREFIX . "morphic_forms` (`form_id`),
            FOREIGN KEY (`post_id`) REFERENCES `" . TABLE_PREFIX . "posts` (`pid`)
        ) ENGINE=MyISAM{$collation};"
    );
};