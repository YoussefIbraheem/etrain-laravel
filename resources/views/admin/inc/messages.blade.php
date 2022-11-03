@extends('admin.layout')


@section('content')

<section>
    <div class="row">
        <div class="col-12">
            @include('front.errors')
            @include('front.success')
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td> <textarea disabled cols="45" rows="5">{{ $message->message }}</textarea></td>
                        <td>
                          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#EmailModal{{ $message->id }}">
                            Send Email
                          </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Email Modal -->
@foreach ($messages as $message)
<div class="modal fade" id="EmailModal{{ $message->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Send Email</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form method="POST" action="{{ url("dashboard/send_mail/$message->id") }}">
          @csrf
            <div class="modal-body">
               <div class="py-3">
                <h4>To: {{ $message->name}}</h4>
                <br>
                <h4>Address: {{ $message->email }}</h4>
               </div>
               <div class="py-3">
                <div class="form-check">
                    <input type="text" class=" form-control" name="subject" placeholder="Subject" id="">
                </div>
                <div class="form-check">
                    <textarea placeholder="Message" class="form-control" name="message" id="" class="w-100" cols="30" rows="10"></textarea>
                </div>
               </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Send Mail</button>
            </div>
       </form>
      </div>
    </div>
  </div>
@endforeach

@endsection