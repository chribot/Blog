<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Christophs Blog</title>
    <script src="script.js"></script>
</head>
<body onload="addEvents();">
<table>
    <tr>
        <td></td>
        <td></td>
        <td><a href="./new_entry.php"><button id="new">Neu</button></a></td>
    </tr>
    <tr>
        <td>2022-05-20 10:52</td>
        <td>Dies ist der ein Beispieleintrag.</td>
        <td>
            <form action="./change_entry.php" method="post">
                <input type="hidden" value="1" name="id">
                <button class="change" type="submit">Ändern</button>
            </form>
        </td>
    </tr>
    <tr>
        <td>2022-05-20 06:34</td>
        <td>Dies ist der ein Beispieleintrag.</td>
        <td>
            <form action="change_entry.php" method="post">
                <input type="hidden" value="2" name="id">
                <button class="change" type="submit">Ändern</button>
            </form>
        </td>
    </tr>
    <tr>
        <td>2022-05-18 14:11</td>
        <td>Dies ist der ein Beispieleintrag.</td>
        <td>
            <form action="change_entry.php" method="post">
                <input type="hidden" value="3" name="id">
                <button class="change" type="submit">Ändern</button>
            </form>
        </td>
    </tr>
</table>
</body>
</html>
