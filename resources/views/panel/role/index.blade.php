@extends('panel.layouts.master')

@section('title')
    <title>Role</title>
@endsection

@push('css')
   {{-- <link rel="stylesheet" href="">      --}}
@endpush

@section('content')
{{-- modal add --}}
<div class="modal fade" id="addRoleModal" data-bs-backdrop="static" tabindex="-1">
   <div class="modal-dialog">
      <form class="modal-content" id="ajaxRole">
         @csrf
         <div class="modal-header">
            <h5 class="modal-title" id="addRoleModalTitle">Add Role</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col mb-3">
                  <label for="role_code" class="form-label">Role Code</label>
                  <input type="text" id="role_code" name="role_code" class="form-control" placeholder="Enter Role Code">
               </div>
               <div class="col mb-3">
                  <label for="role_name" class="form-label">Role Name</label>
                  <input type="text" id="role_name" name="role_name" class="form-control" placeholder="Enter Role Name">
               </div>
            </div>
            <div class="row g-2">
               <div class="col mb-3">
                  <label for="role_description" class="form-label">Description</label>
                  <textarea type="text" id="role_description" name="role_description" class="form-control" placeholder="Description for User Role.."></textarea>
               </div>
            </div>
            <div class="form-check form-switch mb-2">
               <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
               <label class="form-check-label" for="is_active">Activation</label>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
         </div>
      </form>
   </div>
</div>
{{-- end modal add --}}

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
     <div class="col-lg-12 mb-4 order-0">
         <div class="card">
            <div class="card-header">
               <h5>User Role</h5>
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal"><i class="bx bx-plus"></i> Add Data</button>
            </div>
            <div class="table-responsive text-nowrap">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th width="5%">No.</th>
                        <th width="15%">Code</th>
                        <th >Name</th>
                        <th width="20%" style="text-align: right">Users</th>
                        <th width="20%">Status</th>
                        <th width="10%">Actions</th>
                     </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                     @for ($i = 1; $i <= 10; $i++)
                        <tr>
                           <td>{{$i}}</td>
                           <td>Code{{$i}}</td>
                           <td>Role{{$i}}</td>
                           <td style="text-align: right">{{$i}} Employee</td>
                           <td><span class="badge {{ $i < 5 ? 'bg-label-success' : 'bg-label-secondary' }}">
                              {{ $i < 5 ? 'Active' : 'Deactive' }}
                           </span></td>
                           <td>
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal">Edit</button>
                              <a href="#" class="btn btn-sm btn-danger">Delete</a>
                           </td>
                        </tr>
                     @endfor
                  </tbody>
               </table>
            </div>
         </div>
     </div>
   </div>
</div>

 @endsection

@push('js')
   <script>
      $(document).ready(function() {
         $('#ajaxRole').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
               url: "{{ route('role.store') }}",
               type: 'POST',
               data: formData,
               contentType: false,
               processData: false,
               success: function(response) {
                  console.log(response);
                  if (response.success) {
                     Swal.fire({
                        position: 'center',
                        icon:'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 5500,
                        z-index: 100
                     });
                     $('#addRoleModal').modal('hide');
                  } else {
                     Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                     });
                  }
               }
            });
         })
      });
   </script>
@endpush