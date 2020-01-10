<h2>Hello, {{ $user->name }}</h2>
<a href="{{ route('verification.verify', ['userID' => $user->id, 'hash' => $token ]) }}" target="_blank">Verify your registration</a>
