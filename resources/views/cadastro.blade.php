@extends('template.template')
@section('title', 'Cadastro')
@section('content')

<h2 href="{{url('cadastro')}}" class="text-center titlepage">Cadastro de orçamento</h2>
<div class="container">
        <form method="POST" action="{{route('cadastro',$orcamento->id ?? 0)}}">
            @csrf
             <!-- Verifica Existencia de erros -->
             @if($errors->all())
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>   
                 @endforeach
            @endif
            
            @if(session('mensagem'))
                <div class="alert alert-success">
                    <p>{{session('mensagem')}}</p>
                </div>
            @endif
            <div class="row">
               
                <div class="col-md-8">
                    <input class="inptext" type="text" placeholder="Nome do cliente"  name="cliente" id="cliente" value="{{$orcamento->cliente ?? old('cliente') ?? ''}}">
                </div>

                <div class="col-md-2">
                    <input class="inptext" type="text" placeholder="Data"  name="data" id="data" value="{{ $data ?? old('data') ??  ''}}">
                </div>
                
                <div class="col-md-2">
                    <input class="inptext" type="text" placeholder="Hora"  name="hora" id="hora" value="{{$orcamento->hora ??  old('hora') ?? '' }}">
                </div>

                <div class="col-md-8">
                    <input class="inptext" type="textarea" placeholder="Descrição"  name="descricao" id="descricao" value="{{$orcamento->descricao ?? old('descricao') ?? ''}}">
                </div>

                <div class="col-md-4">
                    <input class="inptext" type="numeric" placeholder="Valor R$"  name="valor" id="valor" value="{{$orcamento->valor ?? old('valor') ?? ''}}">
                </div>

                <div class="col-md-8">
                    <input class="inptext" type="text" placeholder="Vendedor responsavél"  name="vendedor" id="vendedor" value="{{$orcamento->vendedor ?? old('vendedor') ?? ''}}">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mb-2">Salvar</button>
                </div>
            </div>
        </form>

        <script>
           $("#data").mask("99-99-9999"); 
           $('#valor').mask('000.000.000.000.000,00', {reverse: true});
           $('#hora').mask('##:##');
        </script>
</div>

@endsection