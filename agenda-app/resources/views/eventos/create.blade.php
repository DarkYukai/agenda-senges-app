@extends('layout.app')
@section('content')
<h2>Criando novo invento</h2>

<form action="/eventos" method="POST">
    @csrf
    <div class="form-group">
        <label for="data">Data do evento:</label>
        <input type="date"  name="data", id="data" value="{{old('data')}}" 
        class="form-control @error('data') is-invalid @enderror" >
            @if($errors->has('data'))
                <div class="text-danger">
                    {{$errors->first('data')}}
                </div>
            @endif    
    </div>
    <button type="subimit" class="btn btn-primary">Criar</button>
</form>
@endsection