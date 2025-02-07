@extends ("templates.main")

@section ("titulo", "Cadastro de Carros")

@section("formulario")
    <form method="POST" action="/autoescola" class="row">
        <div class="form-group">
            <label>Marca:</label>
                <select name="marca" class="form-control">
                    <option value=""></option>
                    <option value="Fiat"
                        {{ $carro -> marca == "Fiat" ? "selected" : "" }}
                    >Fiat</option>
                    <option value="Volkswagen" 
                        {{ $carro -> marca == "Volkswagen" ? "selected" : ""}}
                    >Volkswagen</option>
                    <option value="Renault"
                        {{ $carro -> marca == "Renault" ? "selected" : ""}}
                    >Renault</option>
                    <option value="Hyundai"
                        {{ $carro -> marca == "Hyundai" ? "selected" : ""}}
                    >Hyundai</option>
                    <option value="Honda"
                        {{ $carro -> marca == "Honda" ? "selected" : ""}}
                    >Honda</option>
                    <option value="Toyota"
                        {{ $carro -> marca == "Toyota" ? "selected" : ""}}
                    >Toyota</option>
                    <option value="Mercedes Benz"
                        {{ $carro -> marca == "Mercedes Benz" ? "selected" : ""}}
                    >Mercedes Benz</option>
                </select>
            </div>
            <div>
                <label>Modelo: </label>
                <input type="text" name="modelo" value="{{ $carro ->modelo }}" class="form-control">
            </div>
            <div>
                <label>Placa: </label>
                <input type="text" name="placa" value="{{ $carro ->placa }}" class="form-control">
            </div>
            <div>
                <label>Cor: </label>
                <input type="text" name="cor" value="{{ $carro ->cor}}" class="form-control">
            </div>
            <div>
                <label>Ano: </label>
                <input type="text" name="ano" value="{{ $carro -> ano}}"class="form-control">
            </div>
            <div>
                <!-- cria uma chave (Cross-Site Request Forgery) evitando ataque que 
                insere requisições em sessões que já estejam abertas pelo usuário -->
                @csrf
                <input type="hidden" name="id" value="{{ $carro -> id }}">
                <button type="submit" class="btn btn-success">
                    <i class="bi-save"></i>Salvar</i>
                </button>
                <a class="btn btn-primary" href="/autoescola">
                    <i class="bi-plus-square">Novo</i>
                </a>
            </div>
</form>
        
@endsection

@section("tabela")
            <table class="table table-striped">
                <colgroup>
                <col width="200">
                <col width="200">
                <col width="160">
                <col width="50">
                <col width="50">
                <col width="50">
                <col width="50">
                </colgroup>
                <thead>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Cor</th>
                    <th>Ano</th>
                    <th>Editar</th>
                    <th>Escluir</th>
                </thead>
                    <!-- Aqui foi criado um laço para se repetir para cada registro da variavél carro,
                    ele cria 1 linha<tr> para cada repetição e varias colunas<td> --> 
                    <tbody>
                    @foreach ($carros as $carro) 
                        <tr>
                            <td>{{ $carro -> marca }}</td>
                            <td>{{ $carro -> modelo }}</td>
                            <td>{{ $carro -> placa }}</td>
                            <td>{{ $carro -> cor }}</td>
                            <td>{{ $carro -> ano }}</td>
                            <td><a href="/autoescola/editar/{{$carro->id}}" class="btn btn-warning"><i class="bi-pencil-square"></i>Editar</a></td>
                            <td><a href="/autoescola/excluir/{{$carro->id}}" class="btn btn-danger">Excluir</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
@endsection
         