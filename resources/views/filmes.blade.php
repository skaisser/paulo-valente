@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Filmes <a href="{{route('filme.create')}}" class="btn btn-success">Novo Filme</a></div>

                <div class="panel-body">
                   Veja a lista de filmes cadastrados
                    @unless(!count($filmes))
                   <table>
                   <tr>
                       <th>ID</th>
                       <th>Titulo</th>
                       <th>Sinopse</th>
                       <th>Data Cadastro</th>
                       <th>Funcoes</th>
                   </tr>
                   @foreach($filmes as $filme)
                     <tr>
                       <td>{{$filme->id}}</td>
                       <td>{{$filme->titulo}}</td>
                       <td>{{$filme->sinopse}}</td>
                       <td>{{$filme->created_at->format("d/m/Y H:i")}}</td>
                       <td>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-2">
                                <a href="{{route('filme.show', $filme->slug)}}" target="_blank" class="btn btn-icon-only btn-info" title="Visualizar">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                            <div class="col-md-2">
                                 <a href="{{route('filme.edit', $filme->id)}}" class="btn btn-icon-only btn-warning" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-md-2">
                                <form class="delete" action="{{route('filme.destroy', $filme->id)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                               <button type="submit" class="btn btn-icon-only btn-danger" title="Excluir">
                                  <i class="fa fa-trash-o"></i>
                              </button>
                                </form>
                            </div>
                        </div>
                    </td>
                   </tr>
                   @endforeach

                   </table>
                   @endunless
                   {!!$filmes->render()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
