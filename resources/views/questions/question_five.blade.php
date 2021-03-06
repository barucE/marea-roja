@extends('layout', ['title' => 'Pregunta 5 de 5',
					'headerTitle' => '¡Vaya, creo que tienes un problema!',
					'headerDescription'  => 'Antes de recuperar tu tarjeta, toma tus precauciones y revisa los enlaces externos. O tal vez quieras dar clic y seguir las instrucciones desde el sitio web.',
					'headerDescriptionAnswer'  => 'En caso de que el correo provenga de una entidad bancaria legítima, nunca te pedirá datos confidenciales como el nombre de usuario, la contraseña o token.'])

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
	@include('email_header', ['fromName' => 'Grupo S.A.', 'fromEmail' => 'noreply@gruposantander.news.es'])
	<div class="email-body py-4 mt-3">
		<div class="body-content p-3">
			<div class="background-red mb-3">
				<img src="{{ asset('img/logo_santander.png') }}">
			</div>
			<p>Estimado cliente,</p>
			<p>Asunto: Su tarjeta será suspendida!<br>Remitente: Servicio al cliente</p>
			<p>Estamos teniendo problemas para verificar la información de su tarjeta. Lo invitamos a corregir este problema haciendo clic en el enlace de abajo y siguiendo las instrucciones:</p>
			<div class="text-center mb-3">
			<button class="btn btn-danger background-red" data-toggle="tooltip" data-placement="top" title="https://particulares.gruposantander.es">Responder</button>
			</div>
			<p>Este es un mensaje automético. Gracias por confiar en nosotros<br>Equipo de Atención al Cliente.<br>Santander es una marca registrada. Todos los derechos reservados.</p>
		</div>
	</div>
</div>
@include('modal_information', ['details' => ['Como lo hemos visto en otros casos, es esencial revisar el correo electrónico del remitente. En este caso, si revisamos el dominio, notamos que no es el oficial del banco: "gruposantander.news.es".', 'Así mismo, el botón "Responder" envía a un enlace fraudulento: https://particulares.gruposantander.es.', 'Otro aspecto importante son las faltas de ortografía y de gramática. Los correos maliciosos suelen tener este tipo de faltas.']])
@endsection