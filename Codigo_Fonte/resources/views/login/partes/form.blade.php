{!! Form::open(['route' => 'user.login','method' => 'post']) !!}
<h3>Acesse o sistema</h3>
<br>
<div class="container-fluid" id="form">
  <div class="col-6">
    <div class="row">
      <label>
        {!! Form::text('username', null,['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
      </label>
    </div>
  </div>
  <br>
  <div class="col-6">
    <div class="row">
      <label>
        {!! Form::password('password',['class' => 'form-control','placeholder' =>'Senha']) !!}
      </label>

    </div>
  </div>
  <div class="row" id="btn">
    {!! Form::submit('Entrar',['class' => 'btn btn-success']) !!}
  </div>
</div>
{!! Form::close() !!}
