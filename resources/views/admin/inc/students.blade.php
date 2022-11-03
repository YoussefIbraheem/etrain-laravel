@extends('admin.layout')
@section('content')
<section class="d-flex">
    <div class="">
      <div class="row">
        <div class="col-12">
          @include('front.errors')
          @include('front.success')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addstudentModal">
                Add Student
              </button>
        </div>
        <div class="col-12 d-flex justify-content-center">
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name</th>
                      <th scope="col">Email</th>
                      <th scope="col">spec</th>
                      <th scope="col">phone</th>
                      <th scope="col">course</th>
                      <th scope="col">status</th>
                      <th scope="col">Update</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $student )     
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $student->name }}</td>
                      <td>{{ $student->email }}</td>
                      <td>{{ $student->spec }}</td>
                      <td>{{ $student->phone }}</td>
                      
                      @foreach ( $student->courses as $studentInfo )
                      <td>{{ $studentInfo->name }}</td>
                      <td>{{ $studentInfo->pivot->status}}</td>
                      @endforeach
                      <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateStudentModal{{ $student->id }}">
                            Update
                          </button>
                    </td>
                      <td>
                        <form method="POST" action="{{ url("dashboard/delete_student/$student->id") }}">
                        @method('delete')
                        @csrf
                         <button onclick=' return confirm("do you want to Delete {{ $student->name }}?")' type="submit" class="btn btn-danger">Delete</button>
                       </form>
                    </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
              </table>
        </div>
        <div class="col-12 ">
            <div class="d-flex justify-content-center">
                {{ $students->links() }}
            </div>
        </div>
     </div>
    </div>
    </section>
      <!--  Add Student Modal -->
<div class="modal fade" id="addstudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form enctype="multipart/form-data"  action="{{ url('dashboard/add_student') }}" method="POST">
        <div class="modal-body">
         
          @csrf
          <input class="form-control my-3" type="text" name="name" id="" placeholder="Student Name">
          <input class="form-control my-3" type="email" name="email" id="" placeholder="Studnet Email">
          <input class="form-control my-3" type="text" name="phone" id="" placeholder="Studnet phone">
          <select class="form-control my-3"  name="course_id" id="">
            <option hidden selected disabled value="">--select Course--</option>
            @foreach ($showCourses as $course )
              <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
          </select>
          <input class="form-control my-3" type="text" name="spec" id="" placeholder="Studnet Spcialty">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
       </form>
      </div>
    </div>
  </div>
  {{-- --------------------------------------------- --}}
   <!--  Update student Modal -->
   @foreach ( $students as $student )
   <div class="modal fade" id="updateStudentModal{{ $student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <form action="{{ url("dashboard/update_student/$student->id") }}" method="POST">
        <div class="modal-body">
          @csrf
          <input value="{{ $student->name }}" class="form-control my-3" type="text" name="nameEdit" id="" placeholder="Student Name">
          <input value="{{ $student->phone }}" class="form-control my-3" type="text" name="phoneEdit" id="" placeholder="Student Phone">
          <input value="{{ $student->email }}" class="form-control my-3" type="email" name="emailEdit" id="" placeholder="Student Email">
          <input value="{{ $student->spec }}" class="form-control my-3" type="text" name="specEdit" id="" placeholder="Student Specialty">
          @foreach ( $student->courses as $studentInfo )
            <select class="form-control my-3" name="courseEdit" id=""> 
              <option selected hidden value="{{ $studentInfo->course_id }}">{{ $studentInfo->name }}</option>
              @foreach ( $showCourses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
              @endforeach
            </select>
            <select class="form-control my-3" name="statusEdit" id=""> 
              <option selected hidden value="{{ $studentInfo->pivot->status }}">{{ $studentInfo->pivot->status }}</option>
                <option value="approved">approved</option>
                <option value="approved">rejected</option>
            </select>
            @endforeach
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