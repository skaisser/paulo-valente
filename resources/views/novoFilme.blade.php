@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Novo Filme</div>


                <div class="panel-body">
                @include('layouts.errors')
                <form action="{{route('filme.store')}}" method="post">
                {{csrf_field()}}
                    <h3>Novo Filme</h3>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}" id="titulo" placeholder="Titulo do Filme">
                        </div>
                        <div class="form-group">
                        <label for="sinopse">Sinopse:</label>
                        <textarea name="sinopse" class="form-control" id="sinopse" cols="30" placeholder="Sinopse do Filme" rows="10">{{old('sinopse')}}</textarea>
                       
                        </div>
                       <div class="form-group">
                                            <label for="categoria">Categoria</label> <br>
                                            @foreach($categorias as $categoria)
                                            <label class="checkbox-inline">
                                            <input type="checkbox"  name="categoria[]" id="categoria[]" value="{{$categoria->id}}"> {{$categoria->nome}}
                                            </label>
                                            @endforeach
                                            <span class="help-block">Selecione quantas categorias desejar</span>
                       </div>
                       <div class="col-md-12">
                         <button type="submit" class="btn btn-success">Cadastrar Filme</button>
                       </div>

                      </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
