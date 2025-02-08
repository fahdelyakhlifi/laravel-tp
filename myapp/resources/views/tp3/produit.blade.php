

@if($p)
<table border="1">
    <tr>
        <td>id</td>
        <td>nom</td>
        <td>prix</td>
    </tr>

<tr>
    <td>{{$p->id}}</td>
    <td>{{$p->name}}</td>
    <td>{{$p->prix}}</td>
</tr>
@else
<p>desole aucun produit trouve avic le nom : <style>text:redù{{$n}}</style></p>
@endif
</table>
