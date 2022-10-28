@extends('admin.layout')
@section('content')
<section class="d-flex">
  <div class="">
    <div class="row"> 
      <div class="col-12">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
  Add Course
</button>
@include('front.errors')
      </div>
      <div class="col-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <th  scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">Trainer</th>
              <th scope="col">brief_desc</th>
              <th scope="col">full_desc</th>
              <th scope="col">price</th>
              <th scope="col">image</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $courses as $course )
              
            
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $course->name }}</td>
              <td>{{ $course->category->name }}</td>
              <td>{{ $course->trainer->name }}</td>
              <td><textarea disabled name="" id="" cols="30" rows="5">{{ $course->brief_desc }}</textarea></td>
              <td><textarea disabled name="" id="" cols="30" rows="10">{{ $course->full_desc }}</textarea></td>
              <td>{{ $course->price }}</td>
              <td><img style=" border-radius:5px; width:100px; height:80px" src="{{ asset("storage/$course->image") }}" alt=""></td>
              <td>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateCourseModal{{ $course->id }}">
                  Update
                </button>
              </td>
              <td>
               <form method="POST" action="{{ url("dashboard/delete_course/$course->id") }}">
                  @method('delete')
                  @csrf
                 <button onclick=' return confirm("do you want to Delete {{ $course->name }}?")' type="submit" class="btn btn-danger">Delete</button>
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
<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form enctype="multipart/form-data"  action="{{ url('dashboard/add_course') }}" method="POST">
      <div class="modal-body">
       
        @csrf
        <input class="form-control my-3" type="text" name="name" id="" placeholder="Course Name">
        {{-- category selection --}}
        <select class="form-control my-3" name="category" id="">
          <option disabled selected hidden value="">--Select Category--</option>
          @foreach ($showCategories as $categroy )
            <option value="{{ $categroy->id }}">{{ $categroy->name }}</option>
          @endforeach
        </select>
        {{-- trainer selection --}}
        <select class="form-control my-3" placeholder="Select" name="trainer" id="">
          <option disabled selected hidden value="">--Select Trainer--</option>
          @foreach ($trainerList as $trainer )
            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
          @endforeach
        </select>
        <input class="form-control my-3" type="text" name="price" id="" placeholder="Course Price">
        <textarea class="form-control my-3" name="brief_desc" id="" cols="30" rows="10"></textarea>
        <textarea class="form-control my-3" name="full_desc" id="" cols="30" rows="10"></textarea>
        <input class="form-control my-3" type="file" name="image" id="" placeholder="Course Picture">
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
 @foreach ( $courses as $course )
 <div class="modal fade" id="updateCourseModal{{ $course->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form enctype="multipart/form-data"  action="{{ url("dashboard/update_course/$course->id") }}" method="POST">
      <div class="modal-body">
       
        @csrf
        <input value="{{ $course->name }}" class="form-control my-3" type="text" name="nameEdit" id="" placeholder="Course Name">
        {{-- category selection --}}
        <select class="form-control my-3" name="categoryEdit" id="">
          <option disabled selected hidden value="{{ $course->category->id }}">{{ $course->category->name }}</option>
          @foreach ($showCategories as $categroy )
            <option value="{{ $categroy->id }}">{{ $categroy->name }}</option>
          @endforeach
        </select>
        {{-- category selection --}}
        <select class="form-control my-3" placeholder="Select" name="trainerEdit" id="">
          <option disabled selected hidden value="{{ $course->trainer->id }}">{{ $course->trainer->name }}</option>
          @foreach ($trainerList as $trainer)
            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
          @endforeach
        </select>
        <input value="{{ $course->price }}" class="form-control my-3" type="text" name="priceEdit" id="" placeholder="Price">
        <textarea  class="form-control my-3" name="brief_descEdit" id="" cols="30" rows="10">{{ $course->brief_desc }}</textarea>
        <textarea  class="form-control my-3" name="full_descEdit" id="" cols="30" rows="10">{{ $course->full_desc }}</textarea>
        <input value="{{ $course->image }}" class="form-control my-3" type="file" name="imageEdit" id="" placeholder="Course Image">
        
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