@extends('app.base')

@section('title', 'Argo Juego List')

@section('content')

<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Development</th>
                <th scope="col">Year</th>
                <th scope="col">Genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($juegos as $juego)  
            <tr>
                <td>{{ $juego->id }}</td>
                <td>{{ $juego->title }}</td>
                <td>{{ $juego->development }}</td>
                <td>{{ $juego->year }}</td>
                <td>{{ $juego->genre }}</td>
                <td>
                    <a class="btn-primary btn" href="{{ url('juego/' . $juego->id) }}">Show</a>
                    <a class="btn-success btn" href="{{ url('juego/' . $juego->id . '/edit') }}">Edit</a>
                    <form class="formDelete" action="{{ url('juego/' . $juego->id) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn-danger btn" type="submit" >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn-info btn" href="{{ url('juego/create') }}">Link to create</a>
</div>

<script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function(form){
        form.onsubmit = (event) => {
            return confirm("Seguro que quieres borrar?");
        }
    })
</script>

@endsection