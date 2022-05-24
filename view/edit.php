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
            break;
        }
    }
}
?>
<form action="index.php" method="post">
    <p><label for="entry">Blog Eintrag ändern:</label></p>
    <textarea id="entry" name="content" rows="8" cols="57"><?php echo $content; ?></textarea>
    <input type="hidden" name="action" value="edit_entry">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <br>
    <div id="edit-buttons">
        <div class="button-wrapper">
            <input class="b-delete" type="submit" name="delete" value="Löschen">
        </div>
        <div class="button-wrapper">
            <input class="b-save" type="submit" name="update" value="Speichern">
        </div>
    </div>
</form>
