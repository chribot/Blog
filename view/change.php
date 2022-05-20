<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Eintrag ändern</title>
</head>
<body>
<form action="index.php" method="post">
    <p><label for="entry">Blog Eintrag ändern:</label></p>
    <textarea id="entry" name="entry" rows="4" cols="50"><?php echo $_POST['id']; ?></textarea>
    <input type="hidden" name="action" value="show">
    <br>
    <input type="submit" value="Löschen">
    <input type="submit" value="Speichern">
</form>
</body>
</html>
