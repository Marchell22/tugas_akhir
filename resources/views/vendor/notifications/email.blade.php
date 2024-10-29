@component('mail::message')
# Reset Password

Klik tombol di bawah untuk mereset password Anda.

@component('mail::button', ['url' => $actionUrl])
Reset Password
@endcomponent

Jika Anda tidak meminta penggantian password, abaikan email ini.

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent