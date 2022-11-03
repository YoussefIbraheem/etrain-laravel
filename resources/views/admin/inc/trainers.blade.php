@extends('admin.layout')
@section('content')
<section class="d-flex">
  <div class="">
    <div class="row"> 
      <div class="col-12">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTrainerModal">
  Add Trainer
</button>
@include('front.errors')
@include('front.success')
      </div>
      <div class="col-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <th  scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Spec</th>
              <th scope="col">Profile_Pic</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $trainers as $trainer )
              
            
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $trainer->name }}</td>
              <td>{{ $trainer->email }}</td>
              <td>{{ $trainer->phone }}</td>
              <td>{{ $trainer->spec }}</td>
              <td><img class="w-50" src="{{ asset("storage/img/author/$trainer->profile_pic") }}" alt=""></td>
              <td>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateTrainerModal{{ $trainer->id }}">
                  Update
                </button>
              </td>
              <td>
               <form method="POST" action="{{ url("dashboard/delete_trainer/$trainer->id") }}">
                  @method('delete')
                  @csrf
                 <button onclick=' return confirm("do you want to Delete {{ $trainer->name }}?")' type="submit" class="btn btn-danger">Delete</button>
               </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--  Add Category Modal -->
<div class="modal fade" id="addTrainerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Trainer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form enctype="multipart/form-data"  action="{{ url('dashboard/add_trainer') }}" method="POST">
      <div class="modal-body">
       
        @csrf
        <input class="form-control my-3" type="text" name="name" id="" placeholder="Trainer Name">
        <input class="form-control my-3" type="email" name="email" id="" placeholder="Trainer Email">
        <input class="form-control my-3" type="text" name="phone" id="" placeholder="Trainer Phone">
        <input class="form-control my-3" type="text" name="spec" id="" placeholder="Trainer Spec">
        <input class="form-control my-3" type="file" name="profile_pic" id="" placeholder="Trainer Picture">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
     </form>
    </div>
  </div>
</div>
 <!--  Update Category Modal -->
 @foreach ( $trainers as $trainer )
 <div class="modal fade" id="updateTrainerModal{{ $trainer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Trainer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form enctype="multipart/form-data"  action="{{ url("dashboard/update_trainer/$trainer->id") }}" method="POST">
      <div class="modal-body">
       
        @csrf
        <input value="{{ $trainer->name }}" class="form-control my-3" type="text" name="nameEdit" id="" placeholder="Trainer Name">
        <input value="{{ $trainer->phone }}" class="form-control my-3" type="text" name="phoneEdit" id="" placeholder="Trainer Phone">
        <input value="{{ $trainer->email }}" class="form-control my-3" type="email" name="emailEdit" id="" placeholder="Trainer Email">
        <input value="{{ $trainer->spec }}" class="form-control my-3" type="text" name="specEdit" id="" placeholder="Trainer Specialty">
        <input value="{{ $trainer->profile_pic }}" class="form-control my-3" type="file" name="picEdit" id="" placeholder="Trainer Profile">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
     </form>
    </div>
  </div>
</div>  
@endforeach  
</section>

@endsection