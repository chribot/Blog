<?php
include_once 'class/Tagebuch.php';

// lese Aktion (default = show)
$action = $_REQUEST['action'] ?? 'show';

$diary = new Tagebuch();

// Aktion: neuer Eintrag
if ($action === 'new_entry') {
    $diary->newEntry();
    $action = 'show';
}

// Aktion: Eintrag ändern
if ($action === 'edit_entry') {
    $id = $_REQUEST['id'] ?? 0;
    $id = intval($id);

    // speichern
    if (isset($_REQUEST['update'])) {
        if ($id !== 0)
            $diary->updateEntry($id);
    }
    // löschen
    if (isset($_REQUEST['delete'])) {
        if ($id !== 0)
            $diary->deleteEntry($id);
    }
    $action = 'show';
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