<h1>Details des marquse</h1>

@if ($marqs != null)
    <ul>
        <li>Id : {{ $marqs->id }}</li>
        <li>Nom :{{ $marqs->name }}</li>
        <li>des :{{ $marqs->desc }}</li>
    </ul>
@else
    <div>
        Aucun Marque
    </div>
@endif
