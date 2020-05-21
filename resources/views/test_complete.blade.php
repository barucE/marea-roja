@extends('layout', ['title' => '¡Gracias, ' . session('name') . '!',
					'headerTitle' => 'Respuestas correctas: ' . session('score') . ' de 5',
					'headerDescription' => '¡Muchas gracias por haber culminado la prueba! Y recuerda que la práctica hace al maestro, así que sigue intentándolo las veces que quieras.'])

@section('optionButtons')
<a type="button" class="btn btn-outline-wine btn-lg m-2" href="{{ route('register.index') }}">Intentar otra vez</a>
@endsection
