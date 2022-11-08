<x-mail::message>
Dear {{ $name }}
<br>
<br>
@if( $status == 'approved')
<p>
    We Would like to inform you that your request for applying for course {{ $course }} has been <strong>Approved</strong> 
</p> 
<p>
    We will Inform you with the starting date of the course on this same email
</p>
<p>
    if you have any concerns regarding the schedule, please don't hesitate to call us or send us an email on our "Contact Us" 
</p>
@else
<p>
    We Would like to inform you that your request for applying for course {{ $course }} has been <strong>Rejected</strong> 
</p> 
<p>
    We are really sorry for not accepting your request and best of luck on our upcoming classes.
</p>
<p>
    if you have any concerns regarding the reason for rejection, please don't hesitate to call us or send us an email on our "Contact Us" 
</p>
@endif
<x-mail::button :url="'http://127.0.0.1:8000/contacts'">>
Contact Us
</x-mail::button>

Thanks,<br>
Etrain Academy
</x-mail::message>
