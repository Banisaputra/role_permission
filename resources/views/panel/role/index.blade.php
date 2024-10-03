@extends('panel.layouts.master')

@section('title')
    <title>Role</title>
@endsection

@push('css')
   {{-- <link rel="stylesheet" href="">      --}}
@endpush

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- modal add --}}
<div class="modal fade" id="addRoleModal" data-bs-backdrop="static" tabindex="-1">
   <div class="modal-dialog">
      <form class="modal-content" id="ajaxRole">
         <input type="hidden" id="role_id" name="role_id">
         
         <div class="modal-header">
            <h5 class="modal-title" id="addRoleModalTitle">Add Role</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col mb-3">
                  <label for="role_code" class="form-label">Role Code</label>
                  <input type="text" id="role_code" name="role_code" class="form-control" placeholder="Enter Role Code">
                  <span class="text-danger" id="role_code_error"></span>
               </div>
               <div class="col mb-3">
                  <label for="role_name" class="form-label">Role Name</label>
                  <input type="text" id="role_name" name="role_name" class="form-control" placeholder="Enter Role Name">
                  <span class="text-danger" id="role_name_error"></span>
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
                     @foreach ($roles as $key => $role)
                        <tr>
                           <td>{{$key + 1}}.</td>
                           <td>{{$role->role_code}}</td>
                           <td>{{$role->role_name}}</td>
                           <td style="text-align: right">{{$role->id}} Employee</td>
                           <td><span class="badge {{ $role->is_active == 1 ? 'bg-label-success' : 'bg-label-secondary' }}">
                              {{ $role->is_active == 1 ? 'Active' : 'Deactive' }}
                           </span></td>
                           <td>
                              <button type="button" class="btn btn-sm btn-primary btn-edit" data-id="{{ $role->id }}">Edit</button>
                              <a href="{{ route('role.destroy', $role->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">Delete</a>
                           </td>
                        </tr>
                     @endforeach
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
            let roleId = $('#role_id').val();
            let storeUrl = "{{ route('role.store') }}";
            let editUrl = "{{ route('role.update', ':id') }}";
            if(roleId != "") {
               storeUrl = editUrl.replace(':id', roleId);
               formData.append('_method', 'PUT');
            }
            
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: storeUrl,
               type: 'POST',
               data: formData,
               contentType: false,
               processData: false,
               success: function(response) {
                  location.reload();
               },
               error: function(xhr) {
                  let errors = xhr.responseJSON.errors;
                  if (errors.role_code) {
                     $('#role_code_error').text(errors.role_code[0]);
                  } else {
                     $('#role_code_error').text('');  // Clear previous error
                  }
                  if (errors.role_name) {
                     $('#role_name_error').text(errors.role_name[0]);
                  } else {
                     $('#role_name_error').text('');  // Clear previous error
                  }
               }
            });
            
         })

         $(document).on('click', '.btn-edit', function() {
            var roleId = $(this).data('id');
            let url = "{{route('role.edit', ':id')}}"
            $.ajax({
               url: url.replace(':id', roleId),
               method: 'GET',
               success: function(response) {
                     $('#role_id').val(response.id);
                     $('#role_code').val(response.role_code);
                     $('#role_name').val(response.role_name);
                     $('#role_description').val(response.role_description);
                     $('#is_active').prop('checked', response.is_active == 1);

                     // Show the edit modal
                     $('#addRoleModal').modal('show');
               },
               error: function(xhr) {
                     alert('Unable to fetch role data');
               }
            });
         });

      });
   </script>
@endpush