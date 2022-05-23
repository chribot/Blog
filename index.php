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
    $id = $_REQUEST['id'] ?? 0;
    $id = intval($id);

    // speichern
    if (isset($_REQUEST['update'])) {
        if ($id !== 0)
            update_entry($id);
    }
    // löschen
    if (isset($_REQUEST['delete'])) {
        if ($id !== 0)
            delete_entry($id);
    }
    $action = 'show';
}

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
            break;
        }
    }

    // Daten speichern
    file_put_contents("./data/entries.json", json_encode($arr_entries), LOCK_EX);
}

function update_entry($id): void
{
    date_default_timezone_set('Europe/Berlin');
    $now = date('Y-m-d H:i:s');

    // Daten lesen
    $json_data = file_get_contents("data/entries.json");
    $arr_entries = json_decode($json_data, true);

    // Eintrag aktualisieren
    foreach ($arr_entries as &$entry) {
        if ($entry['id'] === $id) {
            if (isset($_REQUEST['content'])) {
                $entry['edit'] = $now;
                $entry['content'] = $_REQUEST['content'];
            }
            break;
        }
    }

    // Daten speichern
    file_put_contents("./data/entries.json", json_encode($arr_entries), LOCK_EX);
}
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Christophs Blog</title>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body onload="addEvents();">
<?php
// Seite anzeigen
include 'view/' . $action . '.php';
?>
</body>
</html>
