@if(session()->has('success'))
<div class="d-flex justify-content-center align-content-center text-center">
    <ul class="alert alert-success list-unstyled ">
        <li>{{ session()->get('success') }}</li>
    </ul>
</div>
@endif