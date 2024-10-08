<!--herde o app.blade.php -->
@extends('layout.app')
<!--em qual section eu quero carregar -->
@section('content')
<!--href="{{route('eventos.create')}}" -->
    <h1>Agenda</h1>
    <a href="/eventos/create" class="btn btn-primary">Novo</a>
    <div>
        <table class='table mt-3 table-bordered text-center'>
            <thead>
                <th>#</th>
                <th>Data</th>
                <th>Descrição</th>
                <th>Inicio</th>
                <th>Final</th>
                <th>Contato</th>
                <th>Realizado</th>
                <th colspan='3'>Ações</th>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                <tr>
                    <td>{{$evento->id}}</td>
                    <td>{{$evento->data}}</td>
                    <td>{{$evento->descricao}}</td>
                    <td>{{$evento->inicio}}</td>
                    <td>{{$evento->final}}</td>
                    <td>{{$evento->contato}}</td>
                    <td>{{($evento->realizado) ? 'Sim':'Não'}}</td>
                    <td>
                        <!--route('evento.show') -->
                        <a href="/eventos/{{$evento->id}}" class="btn btn-info">                             
                        <i class="bi bi-eye"></i>
                                                      
                        </a>
                    </td>
                    <td>
                        <!--route('evento.edit', $evento) -->
                        <a href="/eventos/{{$evento->id}}/edit" class="btn btn-success">                             
                        <i class="bi bi-pencil-square"></i>
                                                      
                        </a>
                    </td>
                    <td>
                        <!-- route('eventos.destroy', $evento-->
                        <form action="/eventos/{{$evento->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                            <i class="bi bi-trash3"></i>
                                
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>    
        </table>

        <nav>
            <ul class="pagination justify-content-center">
                {{-- Link para página anterior --}}
                @if ($eventos->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">‹</span></li>
                @else
                    <li class="page-item">
                    <a class="page-link" href="/eventos?page={{ $eventos->currentPage() - 1 }}">‹</a>
                    </li>
                @endif

                {{-- Links de páginas --}}
                @for ($i = 1; $i <= $eventos->lastPage(); $i++)
                @if ($i == $eventos->currentPage())
                <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="/eventos?page={{ $i }}">{{ $i }}</a></li>
                @endif
                @endfor

                {{-- Link para próxima página --}}
             @if ($eventos->hasMorePages())
             <li class="page-item">
                <a class="page-link" href="/eventos?page={{ $eventos->currentPage() + 1 }}">›</a>
             </li>
             @else
             <li class="page-item disabled"><span class="page-link">›</span></li>
             @endif
            </ul>
        </nav>
    </div>
@endsection