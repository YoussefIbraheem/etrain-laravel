<x-mail::message>
Dear {{ $name }}
<br>
<br>
In regards to your query:
{{ $receivedSubject }}
<br>
<br>
{{ $message }}
<x-mail::button :url="''">
Button Text
</x-mail::button>

Regards,<br>
Etrain Academy
</x-mail::message>
