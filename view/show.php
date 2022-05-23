<?php
$json_data = file_get_contents("data/entries.json");
$arr_entries = json_decode($json_data, true);
?>
<div id="content">
    <a href="index.php?action=new"><button id="new">Neu</button></a>
<?php foreach ($arr_entries as $entry) { ?>
    <div class="entry">
        <div class="created">
            <?php echo $entry['create']; ?>
        </div>
        <div class="message">
            <div class="message-text">
                <?php echo $entry['content']; ?>
            </div>
            <div class="edited">
                <?php echo $entry['edit']; ?>
            </div>
            <form class="edit-form" action="index.php?action=edit" method="post">
                <input type="hidden" value="<?php echo $entry['id']; ?>" name="id">
                <button class="change" type="submit">Ändern</button>
            </form>
        </div>
    </div>
<?php } ?>
</div>