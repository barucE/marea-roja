<!DOCTYPE html>
<html>
<head>
	<title>Marea Roja</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="container-fluid header d-flex align-items-center">
		<div class="row w-100">
			<div class="content-wrap d-flex align-items-center col-6">
				<i class="fas fa-fish"></i><span>Marea Roja</span>
			</div>
			<div class="content-wrap d-flex align-items-center justify-content-end col-6">
				<span>{{ $title }}</span>
			</div>
		</div>
		
	</div>
	<div class="container-fluid py-4 content-header">
		<div class="content text-center">
			<h2 id="headerTitle">{{ $headerTitle }}</h2>
			<p class="my-4 px-4" id="headerDescription">{{ $headerDescription }}</p>
			<p class="d-none" id="headerDescriptionAnswer">{{ isset($headerDescriptionAnswer) ? $headerDescriptionAnswer : '' }}</p>
			@yield('optionButtons')
		</div>
	</div>
	@yield('content')	
</body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
	function registerEvents(){
		$('.option').on('click', function(){
			actions.setScore($(this));
		});
    }

    var urls = {
    	setScore: '{{ route('register.setScore') }}'
    }

    var titles = {
    	correct: {class: 'text-success', text: 'Correcto'},
    	incorrect: {class: 'text-danger', text: 'Incorrecto'},
    }

    var actions = {
    	setScore: function($ele){
    		var isCorrect = $ele.attr('data-correct');
    		var titleHtml = (isCorrect == 'true') ? titles.correct : titles.incorrect
    		$.ajax({
			  method: "POST",
			  url: urls.setScore,
			  data: {isCorrect},
			  success: function(response){
			  	$('#headerTitle').text(titleHtml.text).addClass(titleHtml.class);
			  	$('#headerDescription').toggle();
			  	$('#headerDescriptionAnswer').removeClass('d-none');
			  	$ele.parent().hide();
				$('.button-information').removeClass('d-none');
			  }
			});
    	}
    };

	$(document).ready(function() {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$('[data-toggle="tooltip"]').tooltip();

		registerEvents();
	});
</script>