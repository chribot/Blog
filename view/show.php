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
        <td><a href="../index.php?action=new"><button id="new">Neu</button></a></td>
    </tr>
    <tr>
        <td>2022-05-20 10:52</td>
        <td>Dies ist der ein Beispieleintrag.</td>
        <td>
            <form action="../index.php?action=change" method="post">
                <input type="hidden" value="1" name="id">
                <button class="change" type="submit">Ändern</button>
            </form>
        </td>
    </tr>
    <tr>
        <td>2022-05-20 06:34</td>
        <td>Dies ist der ein Beispieleintrag.</td>
        <td>
            <form action="../index.php?action=change" method="post">
                <input type="hidden" value="2" name="id">
                <button class="change" type="submit">Ändern</button>
            </form>
        </td>
    </tr>
    <tr>
        <td>2022-05-18 14:11</td>
        <td>Dies ist der ein Beispieleintrag.</td>
        <td>
            <form action="../index.php?action=change" method="post">
                <input type="hidden" value="3" name="id">
                <button class="change" type="submit">Ändern</button>
            </form>
        </td>
    </tr>
</table>
</body>
</html>
