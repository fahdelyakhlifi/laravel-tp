<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <form method="POST" action='/inserer' >
        @csrf
        <fieldset>
            <legend>formulaire d'ajout</legend>

            <label for="">Nom :</label>
            <input type="text" name="nn"><br><br><br>
            <label for="">Prix :</label>
            <input type="number" name="pp"><br><br><br>
            <label for="">Description :</label>
            <textarea name="des" rows="4" cols="50"></textarea><br><br><br>
            <label for="">discount:</label>
            <input type="number" name="disco"><br><br><br>
            <input type="submit" value="envoyer">

        </fieldset>
    </form>
</body>
</html>
