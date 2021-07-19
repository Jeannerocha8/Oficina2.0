<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Orcamento;

use Illuminate\Support\Facades\DB;

class OrcamentoController extends Controller{


    public function Index(Request $request){
        $cliente = $request->cliente;
        $dataini=$request->dataini;
        $datafim=$request->datafim;
        $vendedor = $request->vendedor;

        $orcamento = new Orcamento();
        if($cliente===null&&$dataini===null&&$datafim===null&&$vendedor==null){
            $list = $orcamento->all()->sortByDesc("data");
        }else{
            $list=$orcamento->Consulta( $cliente,$dataini, $datafim,$vendedor);
        }
        return view('dashboard',compact('list'));
    }

    public function Cadastro(){
        return view('cadastro');
    }

    public function Show ($id){
        $orcamento=Orcamento::find($id);
        $data=date('d-m-Y', strtotime($orcamento->data));
        //dd($data);
        return view ('cadastro', compact('orcamento', 'data'));
    }   

    public function Salvar(StorePostRequest $request, $id){
        $id= $id;
        if($id){
            $orcamento=Orcamento::find($id);


            $orcamento->id = $request->id;
            $orcamento->cliente = $request->cliente;
            $orcamento->data = date('Y-m-d', strtotime($request->data));
            $orcamento->hora = $request->hora;
            $orcamento->descricao = $request->descricao;
            $orcamento->valor = $request->valor;
            $orcamento->vendedor = $request->vendedor;
            $orcamento->update();
            if($orcamento){
                return redirect('/cadastro')->with('mensagem', 'Orçamento atualizado com sucesso!');
            }
        }else{
            $orcamento = new Orcamento();
            $orcamento->cliente = $request->cliente;
            $orcamento->data = date('Y-m-d', strtotime($request->data));
            $orcamento->hora = $request->hora;
            $orcamento->descricao = $request->descricao;
            $orcamento->valor = $request->valor;
            $orcamento->vendedor = $request->vendedor;
            $orcamento->save();
            if($orcamento){
                return redirect('/cadastro')->with('mensagem', 'Orçamento cadastrado com sucesso!');
            }
        }
    }

    public function Excluir ($id){
        $orcamento=Orcamento::find($id);
        $orcamento->delete();
        return response()->json(Array($orcamento));
    }
}
?>