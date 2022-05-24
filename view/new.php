<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Neuer Eintrag</title>
</head>
<body>
<form action="index.php" method="post">
    <p><label for="entry">Neuer Blog Eintrag:</label></p>
    <textarea id="entry" name="content" rows="8" cols="57" placeholder="Bitte Text eingeben..."></textarea>
    <input type="hidden" name="action" value="new_entry">
    <br>
    <div class="button-wrapper">
        <input class="b-save" type="submit" value="Speichern">
    </div>
</form>
</body>
</html>
