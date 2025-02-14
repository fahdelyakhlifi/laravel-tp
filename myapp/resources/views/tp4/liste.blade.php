@extends ('/tp1/default')
@section('content')
    @session('success')
        <div class="alert alert-success">{!! session ('success')!!}</div>
    @endsession
    <form class="form-horizontal" action="/produit" method="get">
        <input type="text" name="searchs"  value="{{ request('searchs') }}">
        <input type="submit">
    </form>
    <table border="1">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>prix</th>
        <th>description</th>
        <th>discount</th>
    </tr>
    @foreach($produits as $p)
    <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->name}}</td>
        <td>{{$p->prix*$p->discount/100}}({{$p->prix}})</td>
        <td>
            {{$p->description}}
        </td>
        <td>@if($p->discount>50)
            <span style="color: brown">{{$p->discount}}</span>
            @else
            <span style="color: green">{{$p->discount}}</span>
            @endif

        </td>
    </tr>
    @endforeach
</table>

@endsection
