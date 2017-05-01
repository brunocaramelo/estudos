<?php

namespace estoque\Http\Controllers;

use estoque\Model\Produto;
use estoque\Model\Categoria;
use Request;
use Validator;
use estoque\Http\Requests\ProdutoRequests;

class ProdutoController extends Controller{
    
    public function __construct(){

        $this->middleware('auth', 
                                ['only' => 
                                            [
                                                'novo',
                                                 'remove',
                                            ]
                                    ]
                            );

    }

    public function lista(){
        
        $produtos = Produto::all();
       
        return view( 'produtos/listagem' )->with( 'produtos' , $produtos );
    }

    public function mostra(){
        
        $id = Request::route( 'id' , 1 );

        $produto = Produto::find( $id );
       
        return view( 'produtos/mostra' )->with( 'produto' , $produto );
    }

    public function novo(){
        return view( 'produtos/novo' )->with( 'categorias' , Categoria::all() );
    }

    public function adicionar( ProdutoRequests $request ){

        Produto::create( $request->all() );
        
        /*
        OU este modo
        $produto = new Produto( $produtoPost );
        
        $produto->save();
       */

        return redirect('/produtos')->withInput(Request::only('nome'));
    }

    public function listaJson(){
        return response()->json( Produto::all() );
    }

    public function remove( $id ){
        $produto = Produto::find( $id );
        $produto->delete();
        return redirect('/produtos');
    }
}
