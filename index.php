<?php
// lese Aktion (default = show)
$action = $_REQUEST['action'] ?? 'show';

// Aktion: neuer Eintrag
if ($action === 'new_entry') {
    new_entry();
    $action = 'show';
}

// Seite anzeigen
include 'view/' . $action . '.php';


//
// Funktionen
//

function new_entry(): void
{
    date_default_timezone_set('Europe/Berlin');
    $now = date('Y-m-d H:i:s');

    // Daten lesen
    $json_data = file_get_contents("data/entries.json");
    $arr_entries = json_decode($json_data, true);

    // neue ID bestimmen
    if ($arr_entries !== null)
        $new_id = $arr_entries[count($arr_entries)-1]['id'] + 1;
    else
        $new_id = 1;

    // neuer Eintrag
    $entry['id'] = $new_id;
    $entry['create'] = $now;
    $entry['edit'] = $now;
    $entry['content'] = $_REQUEST['content'] ?? '';

    // neuen Eintrag einfügen
    $arr_entries[] = $entry;

    // Daten speichern
    file_put_contents("./data/entries.json", json_encode($arr_entries), LOCK_EX);
}