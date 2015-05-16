@extends('layout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>Edita tu perfil</h1>
      <!-- Formulario generado con la sintaxis de blade -->
      {{ Form::model($candidate, ['route' => 'update_profile', 'method'=> 'PUT', 'role' => 'form']) }}

      {{ Field::url('website_url') }}
      {{ Field::textarea('description') }}
      {{ Field::select('job_type', $job_types) }}
      {{ Field::select('category_id', $categories) }}
      {{ Field::checkbox('available') }}

      <input type="submit" class="btn btn-default" value="Enviar" />

      {{ Form::close() }}

    </div>
  </div>
</div>


@endsection
