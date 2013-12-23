<p>Hello {{ $user->first_name }},</p>
<p>You have been added to LaraManager by {{ Auth::user()->username }} </p>
<p>You can log in at {{ url('/') }}</p>
<p>Your username: {{ $user->username }}</p>
<p>Your password: {{ $password }}</p>
<p>Please do not reply to this email. If you have any issues, please email:</p>
<p>{{ $me->email }}</p>