@extends('app.base')

@section('title', 'Argo Movie')

@section('content')

<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <tbody>
            <tr>
                <td>#</td>
                <td>{{ $juego->id }}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{ $juego->title }}</td>
            </tr>
            <tr>
                <td>Development</td>
                <td>{{ $juego->development }}</td>
            </tr>
            <tr>
                <td>Year</td>
                <td>{{ $juego->year }}</td>
            </tr>
            <tr>
                <td>Genre</td>
                <td>{{ $juego->genre }}</td>
            </tr>
        </tbody>
    </table>
</div>
<a class="btn-primary btn" href="{{ url('juego') }}">Back</a> &nbsp;
<a class="btn-success btn" href="{{ url('juego/' . $juego->id . '/edit') }}">Edit</a>

@endsection