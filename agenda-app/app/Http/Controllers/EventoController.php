<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Evento;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //funçao da pagina inicial da meu dominio
        //vou buscar no banco de dados todos os itens
        //select * from eventos;
        //$eventos = Evento::all();
        $eventos = Evento::paginate(20);
        //posso aplicar outras regras de negocio
        //retornar alguma coisa para o cliente
        return view('eventos.index',compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //carregar itens relacionado como "pais"
        //e passar para a pagina de criação do modelo
        //$categorias = Categoria::all();
        //return view('produtos.create,compact'('categorias'));
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {
        //esta funcao salva no banco de dados
        //se tiver o store request valida antes de chegar aqui
        //request $request precisa validar aqui
        //criar o evento
        $request->merge([
            'realizado' => $request->has('realizado') ? true : false
        ]);        
        //dd($request->all());
        Evento::create($request->all());
        //redirecionar para a rota do index com mensagem de sucesso
        //return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso');
        return redirect()->away('/eventos')->with('success', 'Evento criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //voce vai receber um modelo e vai mostrar na tela
        //ou vai receber uma $id e vai consultar para depois mostrar
        //$evento = Evento::find($id);
        return view('eventos.show',compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //mesma situaçao de retorno do show
        //diferença que voce vai retornar para um formulario
        return view('eventos.edit',compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        //eu vou alterar o conteudo do evento
        //se receber $id devo consultar antes de alterar
        //$evento = Evento::find($id);
        //faço atroca de conteudo
        $request->merge([
            'realizado' => $request->has('realizado') ? true : false
        ]);
        $evento->update($request->all());
        //redirecionar para o index
        return redirect()->away('/eventos')->with('success', 'Evento atualizado do sucesso');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //destruir ou deletar o registro
        //se receber a $id tem que pesquisar
        //temos o delete que remove do banco
        //temos o softdelete que oculta o dado
        $evento->delete();
        //redirecionar para o index
        return redirect()->away('/eventos')->with('success', 'Evento removido com sucesso');
    }
}
