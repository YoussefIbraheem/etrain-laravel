<x-mail::message>
# Introduction
From: {{ $email }}.
<br>
Subject: {{ $subject }}.
<br>
{{ $message }}

<x-mail::button :url="'http://127.0.0.1:8000/contacts'">
Contact Us
</x-mail::button>

Thanks,<br>
{{ $name }}
</x-mail::message>
