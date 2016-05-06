@if(Session::has('message'))
<div class="alert alert-info">
        {{Session::get('message')}} 
    </div>
@endif
@if(count($errors) > 0)
<div class="alert alert-danger">
            @foreach($errors->all() as $error)
                 <span>{{$error}}</span>
            @endforeach
    </div>
  <br><br>
@endif