{!! Form::open(['route' => 'user.login','method' => 'post']) !!}
<h3>Acesse o sistema</h3>
<br>
<div class="container-fluid">
  <div class="col-6">
    <div class="row">
      <label>
        {!! Form::text('username', null,['class' => 'form-control', 'placeholder' => 'Usuário']) !!}
      </label>
    </div>
  </div>
  <br>
  <div class="col-6">
    <div class="row">
      <label>
        {!! Form::password('password',['class' => 'form-control','placeholder' =>'senha']) !!}
      </label>
    </div>
  </div>
  <div class="row">
    <button type="button" class="btn btn-success float-right">Login</button>
  </div>
</div>
{!! Form::close() !!}
