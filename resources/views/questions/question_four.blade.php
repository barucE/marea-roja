@extends('layout', ['title' => 'Pregunta 4 de 5',
					'headerTitle' => '¡Al fin te ha llegado el plan financiero!',
					'headerDescription' => 'El fichero parece confiable. No obstante, debes revisar la URL. La decisión es tuya, ¿abrirías el fichero?',
					'headerDescriptionAnswer' => 'Ten cuidado con los hiperenlaces y los ficheros adjuntos presentes en los correos electrónicos. Es posible que te dirijan a sitios fraudulentos en los que se te solicite información confidencial.'])

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
	@include('email_header', ['fromName' => 'Luisa', 'fromEmail' => 'luisa@marearoja.net'])
	<div class="email-body py-4 mt-3">
		<div class="body-content file-section">
			<div class="p-3">
				<span>Luisa ha compartido un enlace al siguiente documento:</span>
				<div class="color-green mt-2 link-fake" data-toggle="tooltip" title="http://drive--google.com/luisa-roja">
					<i class="fas fa-file-excel"></i><span class="ml-2 file-name">Plan_financiero_para_TFM.xlsx</span>
				</div>
				<hr>
				<div>
					<i class="fas fa-user color-blue-sky"></i><span class="ml-2">Hola. Es la parte que faltaba del trabajo. Dime si es necesario algo más.</span>
				</div>
				<button class="btn btn-primary mt-3" data-toggle="tooltip" data-placement="top" title="http://drive--google.com/luisa-roja">Abrir en Documentos</button>
			</div>
		</div>
	</div>
</div>
@include('modal_information', ['details' => ['Si revisas el enlace del documento y el botón "Abrir en Documentos", verás que te dirigen a un dominio parecido al original e inseguro: "drive--google.com".']])
@endsection