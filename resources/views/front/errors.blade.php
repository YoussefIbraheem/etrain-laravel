@if ($errors->any())
<ul class="alert list-unstyled alert-danger">
@foreach ($errors->all() as $error )
    <li>{{ $error }}</li>
@endforeach
</ul>
    
@endif