@extends('template.template')
@section('title', 'Home')
@section('content')

<div class="container">
    <div style="margin-top: 1rem;">
        <a href="{{url('/cadastro')}}"class="btn btn-primary mb-2">Novo Orçamento</a>
    </div>

   
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

    <h3 class="text-center ">Últimos orçamentos</h3>

    <form method="POST" action="{{route('index')}}">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input class="inptext" type="text" placeholder="Nome do cliente"  name="cliente" id="cliente" >
            </div>
            <div class="col-md-4">
                <input class="inptext" type="text" placeholder="Da data"  name="dataini" id="dataini" >
            </div>
            <div class="col-md-4">
                <input class="inptext" type="text" placeholder="até a data"  name="datafim" id="datafim">
            </div>
            <div class="col-md-4">
                <input class="inptext" type="text" placeholder="Vendedor"  name="vendedor" id="vendedor">
            </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mb-2">Pesquisar</button>
                </div>
            </div>
        </form>


        <div class="table-responsive" style="margin-top: 1rem;">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Data</th>
            <th scope="col">Cliente</th>
            <th scope="col">Descricao</th>
            <th scope="col">Valor</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
             @foreach($list as $orcamento)
			    <tr>
                    <td>{{date('d-m-Y' , strtotime($orcamento->data))}}</td>
					<td>{{$orcamento->cliente}}</td>
					<td>{{$orcamento->descricao}}</td>
					<td>{{$orcamento->valor}}</td>
					<td>{{$orcamento->vendedor}}</td>
					<td>
                        <a id="editar" data-id="{{$orcamento->id}}" href="{{url('/buscar/'.$orcamento->id)}}"><i class="fas fa-edit" style="color: #5252d4"></i></a>
						<a id="apagar" data-id="{{$orcamento->id}}"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-trash" style="color: #5252d4" ></i></a>
                       
				</tr>
			@endforeach   
         
        </tbody>
        </table>
    </div>


    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar Orçamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente deletar este orçamento?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form method="POST" >
                    @method('delete')
                    @csrf
                        <button id="btndeletar" class="btn">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>

    <script>
         $("#dataini").mask("99-99-9999"); 
         $("#datafim").mask("99-99-9999"); 
    </script>
    <!-- AJAX DELETAR -->  
	<script>
		$(document).on('click','#apagar', function(event){
			event.preventDefault();
			var idOrcamento = $(this).attr('data-id');
			var get_token = $('input[name="_token"]').val();
			$("#deleteModal").modal("show");
			$("#btndeletar").on('click', function (e){
				e.preventDefault();
				$.ajax({
					headers: {
					'X-CSRF-Token': get_token
				},
					url: '/excluir/'+idOrcamento,
					type: "DELETE",
					dataType: 'json',
					data: {
						idOrcamento
					},
                    success: function (result) {
                        $('deleteModal .close').click();
					    var resposta = '';
 					    $(".resposta").empty();
					     resposta = "<div class='alert msg btn-success text-center' role='alert'>" +
					    "<a href='#' class='close' data-dismiss='alert' aria-label='Close'>&times;</a>" + "Deletado com sucesso" + "</div>";
					    $(".resposta").append(resposta);
					    console.log(result);
					    location.reload();
                    }
				})
              
			});
		});
	</script>
	<!-- fim do AJAX -->

@endsection