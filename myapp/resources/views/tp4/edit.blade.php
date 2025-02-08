<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier Produit</title>
</head>
<body>
    <h1>Modifier Produit</h1>

    <form method="post" action="/enregister " >
        @csrf
        <fieldset>
            <legend>Formulaire de modification</legend>
            <input type="text" name="ii" value="{{ $p->id }}" hidden>
            <label for="">Nom :</label>
            <input type="text" name="nn" value="{{ $p->name }}"><br><br><br>
            <label for="">Prix :</label>
            <input type="number" name="pp" value="{{ $p->prix }}"><br><br><br>
            <input type="submit" value="Engristre">
        </fieldset>
    </form>
</body>
</html>
