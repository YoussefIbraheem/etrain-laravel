<x-mail::message>
Dear {{ $name }}
<br>
<br>
In regards to your query:
{{ $receivedSubject }}
<br>
<br>
{{ $message }}
<x-mail::button :url="'http://127.0.0.1:8000/contacts'">
Contact Us
</x-mail::button>

Regards,<br>
Etrain Academy
</x-mail::message>
