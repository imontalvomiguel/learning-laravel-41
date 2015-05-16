@extends('layout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>Sign up</h1>
      <!-- Formulario generado con la sintaxis de blade -->
      {{ Form::open(['route' => 'register-user', 'method'=> 'POST', 'role' => 'form']) }}

      {{ Field::text('full_name') }}

      {{ Field::email('email') }}

      {{ Field::password('password') }}

      {{ Field::password('password_confirmation', ['placeholder' => 'Repite tu clase']) }}

      <input type="submit" class="btn btn-default" value="Enviar" />

      {{ Form::close() }}

    </div>
  </div>
</div>


@endsection
