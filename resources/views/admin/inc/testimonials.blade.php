@extends('admin.layout')
@section('content')
<section class="d-flex">
    <div class="">
      <div class="row">
        <div class="col-12">
            @include('front.errors')
            @include('front.success')
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addtestimonialModal">
                  Add Testimonial
                </button>
          </div>
          <div class="col-12">
            <table class="table  table-striped">
                <thead>
                   <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>specialty</th>
                     <th>Description</th>
                     <th>Image</th>
                     <th>Update</th>
                     <th>Delete</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach ($adminTestimonials as $testimonial )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->spec }}</td>
                        <td>{{ $testimonial->desc}}</td>
                        <td><img src="{{ asset("storage/img/testimonial/$testimonial->image") }}" alt=""></td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateTestimonialModal{{ $testimonial->id }}">
                                Update
                            </button>  
                        </td>
                        <td>
                            <form method="POST" action="{{ url("dashboard/delete_testimonial/$testimonial->id") }}">
                            @method('delete')
                            @csrf
                             <button onclick=' return confirm("do you want to Delete {{ $testimonial->name }}?")' type="submit" class="btn btn-danger">Delete</button>
                           </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
      </div>
    </div>
</section>
{{-- Add Modal --}}
<div class="modal fade" id="addtestimonialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form enctype="multipart/form-data"  action="{{ url('dashboard/add_testimonial') }}" method="POST">
        <div class="modal-body">
          @csrf
          <input class="form-control my-3" type="text" name="name" placeholder="Name">
          <input class="form-control my-3" type="text" name="spec" placeholder="Specialty">
          <textarea class="form-control my-3" name="desc" cols="30" rows="10" placeholder="Description"></textarea>
          <input class="form-control-file my-3" type="file" name="image" placeholder="Image" >
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
       </form>
      </div>
    </div>
  </div>
  {{-- Update Modal --}}
  @foreach ( $adminTestimonials as $testimonial )
  <div class="modal fade" id="updateTestimonialModal{{ $testimonial->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Testmonial</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form enctype="multipart/form-data" action="{{ url("dashboard/update_testimonial/$testimonial->id") }}" method="POST">
        <div class="modal-body">
          @csrf
          <input value="{{ $testimonial->name }}" class="form-control my-3" type="text" name="nameEdit" id="" placeholder="Student Name">
          <input value="{{ $testimonial->spec }}" class="form-control my-3" type="text" name="specEdit" id="" placeholder="Student Phone">
          <textarea class="form-control my-3" name="descEdit" cols="30" rows="10" placeholder="Description">{{ $testimonial->desc }}</textarea>
          <input class="form-control-file my-3" type="file" name="imageEdit" placeholder="Image" >
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
@endsection