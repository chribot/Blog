<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Neuer Eintrag</title>
</head>
<body>
<form action="index.php" method="post">
    <p><label for="entry">Neuer Blog Eintrag:</label></p>
    <textarea id="entry" name="content" rows="4" cols="50"></textarea>
    <input type="hidden" name="action" value="new_entry">
    <br>
    <input type="submit" value="Speichern">
</form>
</body>
</html>
