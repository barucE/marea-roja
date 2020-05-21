<div class="email-header d-flex align-items-center">
	<div class="circle">{{ substr($fromName, 0, 1) }}</div>
	<div class="emails ml-2">
		<div class="from-email">
			<span>De:</span>
			<span class="name">{{$fromName}}</span>
			<span class="email">{{'<' . $fromEmail . '>'}}</span>
		</div>
		<div class="to-email">
			<span>Para:</span>
			<span class="name">{{ session('name') }}</span>
			<span class="email">{{'<'.session('email').'>'}}</span>
		</div>
	</div>
</div>