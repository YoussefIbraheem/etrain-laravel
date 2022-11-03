@if ($errors->any())
<div class="d-flex justify-content-center align-items-center text-center">
    <ul class="alert list-unstyled alert-danger">
    @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
    
@endif