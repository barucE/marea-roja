@extends('layout', ['title' => 'Pregunta 2 de 5',
					'headerTitle' => 'Este caso contiene un enlace a una foto',
					'headerDescription'  => 'El usuario puede ser conocido, pero es mejor revisar dos veces, o más.',
					'headerDescriptionAnswer'  => 'Aunque el usuario remitente pueda parecer conocido y confiable; sino tenemos la suficiente certeza, debemos de hacer una doble revisión de hacia dónde nos llevan los enlaces.'])

@section('optionButtons')
<div class="button-options">
	<button type="button" class="btn btn-outline-success btn-lg m-2 option" data-correct='false'>Legítimo</button>
	<button type="button" class="btn btn-outline-danger btn-lg m-2 option" data-correct='true'>Phishing</button>
</div>
<div class="button-information d-none">
	<button type="button" class="btn btn-outline-wine btn-lg m-2" data-toggle="modal" data-target="#informationModal">Muéstrame más</button>
	<a type="button" class="btn btn-outline-wine btn-lg m-2" href="{{ route('question.index') }}">Siguiente</a>
</div>
@endsection

@section('content')
<div class="container email-content">
	@include('email_header', ['fromName' => 'Felipe', 'fromEmail' => 'felipe@marearoja.net'])
	<div class="email-body py-4 mt-3">
		<div class="body-content p-3">
			<p>Hola, {{ session('name') }}. Estuve revisando mis archivos y me encontré <span class="color-blue-sky link-fake" data-toggle="tooltip" data-placement="top" title="https://drive.google.com.photo-share.in/OWkjhd78">ESTA FOTO</span> donde aparecemos juntos.</p>
		</div>
	</div>
</div>
@include('modal_information', ['details' => ['La dirección es engañosa, a simple vista creemos que se dirigirá a Google Drive, pero en realidad nos está llevando a otro dominio, este es "share.in"']])
@endsection