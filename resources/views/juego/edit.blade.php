@extends('app.base')

@section('title', 'Argo Edit Juego')

@section('content')

<form action="{{ url('juego/' . $juego->id) }}" method="post">
      
    @method('put')       
    @csrf
    
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label><br>
        <input type="text" class="form-control" id="title" name="title" maxlength="100" value="{{ old('title', $juego->title) }}" required><br>
    </div>
    
    <div class="mb-3">
        <label for="development" class="form-label">Development:</label><br>
        <input type="text" class="form-control" id="development" name="development" maxlength="100" value="{{ old('development', $juego->development) }}" required><br>
    </div>
    
    <div class="mb-3">
        <label for="year" class="form-label">Year:</label><br>
        <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $juego->year) }}" required><br>
    </div>
    
    <div class="mb-3">
        <label for="genre" class="form-label">Genre:</label><br>
        <input type="text" class="form-control" id="genre" name="genre" maxlength="50" value="{{ old('genre', $juego->genre) }}"><br>
    </div>
    
    <a class="btn-primary btn" href="{{ url('juego') }}">Back</a> &nbsp;
    <input type="submit" class="btn-success btn" value="Edit">
    
</form>

@endsection