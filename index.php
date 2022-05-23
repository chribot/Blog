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

    // neuen Eintrag am Anfang einfügen
    array_unshift($arr_entries, $entry);

    // nach Erstelldatum sortieren
    //usort($arr_entries, "sortByDate");

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

function sortByDate($entry_a, $entry_b): int
{
    if ($entry_a['create'] === $entry_b['create'])
        return 0;
    return ($entry_a['create'] > $entry_b['create']) ? -1 : 1;
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
<?php if ($action === 'show') { ?>
    <div id="new">
        <a href="index.php?action=new">
            <button id="b-new">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-plus-square-fill" viewBox="0 0 16 16">
                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                </svg>
            </button>
        </a>
    </div>
<?php } ?>
    <div id="content">
        <?php
        // Seite anzeigen
        include 'view/' . $action . '.php';
        ?>
    </div>
</body>
</html>