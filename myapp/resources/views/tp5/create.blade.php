<form action="/marque" method="post">
    @csrf
    <label for="">Name :</label>
    <input type="text" name="nn" ><br><br>
    <label for="">Desc :</label><br><br>
    <textarea name="desc" id="" cols="30" rows="10"></textarea><br><br>
    <input type="submit" value="Enregistrer">

</form>
