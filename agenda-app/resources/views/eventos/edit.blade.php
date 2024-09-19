@extends('layout.app')

@section('content')
<h2>Criando novo invento</h2>
<!-- {{route('eventos.edit', $evento)}}" -->
<form action="/eventos/{{$evento->id}}" method="POST">
    <!-- habilitar o token -->
    @csrf
    @method('PUT')
    <!--Data -->
    <div class="form-group">
        <label for="data">Data do evento:</label>
        <input type="date"  name="data", id="data" value="{{old('data', $evento->data)}}" 
        class="form-control @error('data') is-invalid @enderror" >
            @if($errors->has('data'))
                <div class="text-danger">
                    {{$errors->first('data')}}
                </div>
            @endif    
    </div>
    <!--Descrição -->
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text"  name="descricao", id="descricao" value="{{old('descricao', $evento->descricao)}}" 
        class="form-control @error('descricao') is-invalid @enderror" >
            @if($errors->has('descricao'))
                <div class="text-danger">
                    {{$errors->first('descricao')}}
                </div>
            @endif    
    </div>
    <!--inicio -->
    <div class="form-group">
        <label for="inicio">Inicio:</label>
        <input type="time"  name="inicio", id="inicio" value="{{old('inicio', $evento->inicio)}}" 
        class="form-control @error('inicio') is-invalid @enderror" >
            @if($errors->has('inicio'))
                <div class="text-danger">
                    {{$errors->first('inicio')}}
                </div>
            @endif    
    </div>
    <!--final -->
    <div class="form-group">
        <label for="final">Final:</label>
        <input type="time"  name="final", id="final" value="{{old('final', $evento->final)}}" 
        class="form-control @error('final') is-invalid @enderror" >
            @if($errors->has('final'))
                <div class="text-danger">
                    {{$errors->first('final')}}
                </div>
            @endif    
    </div>
    <!--contato -->
    <div class="form-group">
        <label for="contato">Contato:</label>
        <input type="text"  name="contato", id="contato" value="{{old('contato', $evento->contato)}}" 
        class="form-control @error('contato') is-invalid @enderror" >
            @if($errors->has('contato'))
                <div class="text-danger">
                    {{$errors->first('contato')}}
                </div>
            @endif    
    </div>
    <!--realizado -->
    <div class="form-group">
        <input type="checkbox"  name="realizado", id="realizado" {{ old('realizado', $evento->realizado) ? 'checked' : ''}} 
        class="form-check-input @error('realizado') is-invalid @enderror" >
        @if($errors->has('realizado'))
        <div class="text-danger">
            {{$errors->first('realizado')}}
        </div>
        @endif    
        <label for="realizado">Realizado:</label>
    </div>
    <button type="subimit" class="btn btn-primary" style="margin-top:5px;">Atualizar</button>
</form>
@endsection