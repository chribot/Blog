<?php
$json_data = file_get_contents("data/entries.json");
$arr_entries = json_decode($json_data, true);

$content = '';
$id = 0;
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    foreach ($arr_entries as $entry) {
        if ($entry['id'] === $id) {
            $content = $entry['content'];
        }
    }
}
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Eintrag ändern</title>
</head>
<body>
<form action="index.php" method="post">
    <p><label for="entry">Blog Eintrag ändern:</label></p>
    <textarea id="entry" name="entry" rows="4" cols="50"><?php echo $content; ?></textarea>
    <input type="hidden" name="action" value="edit_entry">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <br>
    <input type="submit" name="delete" value="Löschen">
    <input type="submit" name="save" value="Speichern">
</form>
</body>
</html>
