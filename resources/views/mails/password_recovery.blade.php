<x-mail::message>
# Password Recovery

Hello {{ $name }},

There was a request to change the password to your {{ config('app.name') }} account.

If your made this request, please click the button below to reset your password.

If you did not make the request, kindly ignore this email.

<x-mail::button :url="$url" color="primary">
Reset Password
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
