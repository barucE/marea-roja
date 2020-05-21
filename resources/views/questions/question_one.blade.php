@extends('layout', ['title' => 'Pregunta 1 de 5',
					'headerTitle' => '¡Tienes un paquete en espera!',
					'headerDescription'  => 'Recibes un correo acerca de que tienes un paquete pendiente de entrega; además tienes que pagar un importe para que este se libere. Tú decides.',
					'headerDescriptionAnswer'  => 'Estos casos de phishing siempre tratan de transmitir urgencia. Pero recuerda que siempre tienes la oportunidad de contactar a la empresa o autoridades.'])

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
	@include('email_header', ['fromName' => 'Correos Noticias', 'fromEmail' => 'noticias@correos.co.es'])
	<div class="email-body py-4 mt-3">
		<div class="body-content p-3">
			<div class="font-weight-bold mb-2">Su paquete está esperando la entrega.</div>
			<img src="{{ asset('img/logo_correos.png') }}" class="img-fluid">
			<div class="text-center mb-2">
				<h3>Estimado Cliente,</h3>
			</div>
			<p>Su paquete está esperando la entrega. Confirme el pago (2.99 EUR) en el siguiente enlace , la verificación en línea debe hacerse en los próximos 14 días antes de que caduque.</p>
			<button class="btn btn-warning color-white mt-2" data-toggle="tooltip" data-placement="top" title="http://correos.co.es/index/payment">Haga click aquí</button>
			<div class="mt-5">
				<small>+ Esta solicitud estará disponible por 48 horas.</small>
			</div>
			<hr>
		</div>
	</div>
</div>
@include('modal_information', ['details' => ['Si observamos la dirección de correo electrónico, nos damos cuenta que proviene de "correos.co.es", Correos usa "correos.es".', 'Además, es necesario observar el botón que se muestra en el cuerpo, el cuál nos llevará a la siguiente página: "http://correos.co.es/index/payment"', 'Si una institución supuestamente se está poniendo en contacto contigo, pero no está dirigido a tu nombre, sospecha.' ]])
@endsection