<?php
// lese Aktion (default = show)
$action = $_REQUEST['action'] ?? 'show';

// Aktion: neuer Eintrag
if ($action === 'new_entry') {
    new_entry();
    $action = 'show';
}

// Aktion: Eintrag ändern
if ($action === 'edit_entry') {
    // speichern
    if (isset($_REQUEST['save'])) {
        // ...
    }
    // löschen
    if (isset($_REQUEST['delete'])) {
        if (isset($_REQUEST['id'])) {
            $id = intval($_REQUEST['id']);
            if ($id !== 0)
            delete_entry($id);
        }
        $action = 'show';
    }
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

function delete_entry($id): void
{
    // Daten lesen
    $json_data = file_get_contents("data/entries.json");
    $arr_entries = json_decode($json_data, true);

    // Eintrag löschen
    foreach ($arr_entries as $i => $entry) {
        if ($entry['id'] === $id) {
            array_splice($arr_entries, $i, 1);
        }
    }

    // Daten speichern
    file_put_contents("./data/entries.json", json_encode($arr_entries), LOCK_EX);
}