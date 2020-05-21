@extends('layout', ['title' => 'Pregunta 3 de 5',
					'headerTitle' => 'Al parecer tu contraseña ha sido cambiada.',
					'headerDescription'  => 'Supongamos que tu correo electrónico pertenece a los dominios de Microsoft. ¿Confiarías en el correo siguiente?',
					'headerDescriptionAnswer'  => 'No todos los correos son maliciosos. Este, por ejemplo, es legítimo a pesar de que algunos enlaces o la misma dirección te hagan dudar.'])

@section('optionButtons')
<div class="button-options">
	<button type="button" class="btn btn-outline-success btn-lg m-2 option" data-correct='true'>Legítimo</button>
	<button type="button" class="btn btn-outline-danger btn-lg m-2 option" data-correct='false'>Phishing</button>
</div>
<div class="button-information d-none">
	<button type="button" class="btn btn-outline-wine btn-lg m-2" data-toggle="modal" data-target="#informationModal">Muéstrame más</button>
	<a type="button" class="btn btn-outline-wine btn-lg m-2" href="{{ route('question.index') }}">Siguiente</a>
</div>
@endsection

@section('content')
<div class="container email-content">
	@include('email_header', ['fromName' => 'Equipo de Cuentas de Microsoft', 'fromEmail' => 'account-security-noreply@accountprotection.microsoft.com'])
	<div class="email-body py-4 mt-3">
		<div class="body-content p-3 email-microsoft">
			<h5>Cuenta de Microsoft</h5>
			<h2 class="mb-3 color-blue">Tu contraseña ha cambiado</h2>
			@php
				$email = session('email');
				$email_arr = explode("@", session('email'), 2);
				if(strlen($email_arr[0]) > 3){
					$email_sub = substr($email_arr[0], 2);
					$email_sub = str_repeat("*", strlen($email_sub));
					$email = substr($email, 0, 2) . $email_sub . '@' . $email_arr[1];
				}			
			@endphp
			<p>La contraseña de la cuenta Microsoft <span class="color-blue">{{$email}}</span> se cambió el día 20/05/2020 7:13 (CST).</p>
			<p>Si has sido tú, puedes descartar tranquilamente este correo electrónico.</p>
			<p>Si no has sido tú, la seguridad de tu cuenta está en peligro. Sigue estos pasos:</p>
			<ol class="color-blue">
				<li><span class="link-fake" data-toggle="tooltip" data-placement="top" title="https://account.live.com/pw">Restablezca su contraseña.</span></li>
				<li><span class="link-fake" data-toggle="tooltip" data-placement="top" title="https://account.live.com/Proofs/Manage">Hay que revisar la información de seguridad.</span></li>
				<li><span class="link-fake" data-toggle="tooltip" data-placement="top" title="http://go.microsoft.com/fwlink/?LinkID=261330">Más información para mejorar la seguridad de una cuenta.</span></li>
			</ol>
			<p>También existe la <span class="color-blue link-fake" data-toggle="tooltip" data-placement="top" title="https://account.live.com/SecurityNotifications/Update">opción de no recibir las notificaciones de seguridad</span> o cambiar la ubicación en la que se reciben.</p>
			<p>Gracias,<br>El equipo de cuentas de Microsoft</p>
		</div>
	</div>
</div>
@include('modal_information', ['details' => ['La dirección de correo "account-security-noreply@accountprotection.microsoft.com" hace dudar, pero es desde esta que Microsoft suele enviar este tipo de mensajes.','Si observamos los enlaces, todos pertenecen legítimamente a Microsoft: <ul><li>https://account.live.com/pw</li><li>https://account.live.com/Proofs/Manage</li><li>http://go.microsoft.com/fwlink/?LinkID=261330</li><li>https://account.live.com/SecurityNotifications/Update</li></ul>']])
@endsection