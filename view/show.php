<?php
$json_data = file_get_contents("data/entries.json");
$arr_entries = json_decode($json_data, true);
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Christophs Blog</title>
    <script src="../js/script.js"></script>
</head>
<body onload="addEvents();">
<table>
    <tr>
        <td></td>
        <td></td>
        <td><a href="index.php?action=new">
                <button id="new">Neu</button>
            </a></td>
    </tr>
<?php foreach ($arr_entries as $entry) { ?>
    <tr>
        <td><?php echo $entry['create']; ?><br><?php echo $entry['edit']; ?></td>
        <td><?php echo $entry['content']; ?></td>
        <td>
            <form action="index.php?action=edit" method="post">
                <input type="hidden" value="<?php echo $entry['id']; ?>" name="id">
                <button class="change" type="submit">Ändern</button>
            </form>
        </td>
    </tr>
<?php } ?>
</table>
</body>
</html>