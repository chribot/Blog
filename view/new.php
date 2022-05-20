<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Neuer Eintrag</title>
</head>
<body>
<form action="../index.php" method="post">
    <p><label for="entry">Neuer Blog Eintrag:</label></p>
    <textarea id="entry" name="entry" rows="4" cols="50"></textarea>
    <input type="hidden" name="action" value="show">
    <br>
    <input type="submit" value="Speichern">
</form>
</body>
</html>
