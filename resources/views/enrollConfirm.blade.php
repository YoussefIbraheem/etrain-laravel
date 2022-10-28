<x-mail::message>
<h3>Dear {{ $name }},</h3>
<p>
We have recevied your request to enroll in our course {{ $course->name }}!! please await for a confirmation letter on this email address confirming your reuqest for futher quireies please contac us here
</p>
<br>
<x-mail::button :url="'http://127.0.0.1:8000/contacts'">
Contact Us
</x-mail::button>

Thanks,<br>
Etrain Academy
</x-mail::message>
