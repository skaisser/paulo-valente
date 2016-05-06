@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <h1>{{$filme->titulo}}</h1>
              <p>{{$filme->sinopse}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
