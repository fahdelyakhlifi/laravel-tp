<form action="/marque/{{$marqs->id}}/edit" method="post">
    @csrf
    @method('put')
    <label for="">Name :</label>
    <input type="text" name="nn" value="{{ $marqs->name }}" ><br><br>
    <label for="">Desc :</label><br><br>
    <textarea name="desc" id="" cols="30" rows="10">{{ $marqs->desc }}</textarea><br><br>
    <input type="hidden" name="ii" value="{{ $marqs->id }}" >
    <input type="submit" name="" id="" value="env">

</form>
