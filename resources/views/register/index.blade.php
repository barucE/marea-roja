@extends('layout', ['title' => 'Registro',
					'headerTitle' => 'Rellena el formulario de abajo',
					'headerDescription' => 'Sobre el nombre y el correo electrónico, no es necesario que sea uno real. Los demás datos serán usados de manera estadística.'])

@section('content')
<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-sm-6 col-12">
			<form action="/save-session" method="post">
				<div class="card mb-3">
				  <div class="card-body">
					  <div class="form-group">
					    <label for="name">Nombre</label>
					    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" value="{{ old('name')}}" id="name" name="name" placeholder="Marea Roja" maxlength="80">
					  </div>
					  <div class="form-group">
					    <label for="email">Correo electrónico</label>
					    <input type="email" class="form-control  {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ old('email')}}" placeholder="pecesito@marearoja.net" maxlength="100">
					  </div>
					  <div class="form-group">
					    <label for="career">Carrera en Next</label>
					    <select class="form-control  {{ $errors->has('career') ? 'is-invalid' : ''}}" id="career" name="career" value="{{ old('career')}}" >
					      <option value="">Selecciona una opción</option>
					      @foreach($careers as $careerOp)
					      <option value="{{$careerOp}}" {{ ($careerOp == old('career') ? "selected" : "") }}>{{$careerOp}}</option>
					      @endforeach
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="country">País de origen</label>
					    <input type="text" class="form-control  {{ $errors->has('country') ? 'is-invalid' : ''}}" id="country" name="country" value="{{ old('country')}}" placeholder="España" maxlength="70">
					  </div>
					  <div class="form-group">
					    <label for="gender">Sexo</label>
					    <select class="form-control  {{ $errors->has('gender') ? 'is-invalid' : ''}}" id="gender" name="gender" value="{{ old('gender')}}" >
					      <option value="">Selecciona una opción</option>
					      <option {{ (old('gender') == "Femenino" ? "selected" : "") }}>Femenino</option>
					      <option {{ (old('gender') == "Masculino" ? "selected" : "") }}>Masculino</option>
					      <option {{ (old('gender') == "Otro" ? "selected" : "") }}>Otro</option>
					    </select>
					  </div>
				  </div>
				</div>
				<div class="d-flex justify-content-center mb-3">
					<button type="submit" class="btn btn-start" name="submit">Comenzar</button>
				</div>
				@csrf
			</form>
		</div>
	</div>
</div>
@endsection