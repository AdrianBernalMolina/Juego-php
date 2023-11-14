@extends('app.base')

@section('title', 'Juego Setting')

@section('content')

<form action="{{ url('setting') }}" method="post">
        
    @method('put')    
    @csrf
    
    <div class="mb-3"> 
        <label class="form-check-label"> Behavior after inserting new game </label><br>
        
        <input class="form-check-input" type="radio" id="showJuego" name="afterInsert" value="show juegos" @if(session('afterInsert', 'show juegos') == 'show juegos') checked @endif> <!--{{ $checkedList }}-->
        <label class="form-check-label" for="showJuego">Show all games list</label><br>
        
        <input class="form-check-input" type="radio" id="createJuego" name="afterInsert" value="show create form" @if(session('afterInsert', 'show juegos') == 'show create form') checked @endif> <!--{{ $checkedCreate }}-->
        <label class="form-check-label" for="createJuego">Show create new game form</label>
    </div>
    
    <br>
    
    <div class="mb-3"> 
        <label class="form-check-label" for="editJuego"> Behavior after editing new game </label><br>
        
        <select class="form-select" type="submit" id="editJuego" name="afterEdit" value="Edit" aria-label="Default select example">
            @foreach ($afterEditOptions as $value => $label)
                <option value="{{ $value }}" {{ $selectedEditOption == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select><br>
    </div>
    
    <button class="btn-primary btn" type="submit">Save setting</button>
    
</form>

@endsection