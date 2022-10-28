@extends('admin.layout')
@section('content')
<section class="d-flex">
  <div class="container">
    <div class="row"> 
      <div class="col-12">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
  Add Category
</button>
@include('front.errors')
      </div>
      <div class="col-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <th  scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $categories as $category )
              
            
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $category->name }}</td>
              <td>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateCategoryModal{{ $category->id }}">
                  Update
                </button>
              </td>
              <td>
               <form method="POST" action="{{ url("dashboard/delete_category/$category->id") }}">
                  @method('delete')
                  @csrf
                 <button onclick=' return confirm("do you want to Delete {{ $category->name }}?")' type="submit" class="btn btn-danger">Delete</button>
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
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form  action="{{ url('dashboard/add_category') }}" method="POST">
      <div class="modal-body">
       
        @csrf
        <input class="form-control" type="text" name="name" id="" placeholder="Category Name">
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
 @foreach ( $categories as $category )
 <div class="modal fade" id="updateCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form  action="{{ url("dashboard/update_category/$category->id") }}" method="POST">
      <div class="modal-body">
       
        @csrf
        <input value="{{ $category->name }}" class="form-control" type="text" name="nameEdit" id="" placeholder="Category Name">
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