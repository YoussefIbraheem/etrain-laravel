<x-mail::message>
# Introduction
From: {{ $email }}.
<br>
Subject: {{ $subject }}.
<br>
{{ $message }}

<x-mail::button :url="'google.com'">
Visit
</x-mail::button>

Thanks,<br>
{{ $name }}
</x-mail::message>
