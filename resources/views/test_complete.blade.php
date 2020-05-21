@extends('layout', ['title' => '¡Gracias, ' . session('name') . '!',
					'headerTitle' => 'Respuestas correctas: ' . session('score') . ' de 5',
					'headerDescription' => '¡Muchas gracias por haber culminado la prueba! Y recuerda que <span class="font-weight-bold">en Marea Roja no se puede salir a pescar.</span>'])

@section('optionButtons')
<i class="fas fa-fish"></i>
@endsection
