<?php
/**
 * @var $diary
 * @var $id
 */
$entry = $diary->getEntryById($id);
?>
<form action="index.php" method="post">
    <p><label for="entry">Blog Eintrag ändern:</label></p>
    <textarea id="entry" name="content" rows="8" cols="57" placeholder="Bitte Text eingeben..."><?php echo $entry->getContent(); ?></textarea>
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
