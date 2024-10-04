@extends('panel.layouts.master')

@section('title')
    <title>Permission</title>
@endsection

@push('css')
   {{-- <link rel="stylesheet" href="">      --}}
@endpush

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- modal add --}}
<div class="modal fade" id="addPermissionModal" data-bs-backdrop="static" tabindex="-1">
   <div class="modal-dialog">
      <form class="modal-content" id="ajaxPermission">
         <input type="hidden" id="ps_id" name="ps_id">
         
         <div class="modal-header">
            <h5 class="modal-title" id="addPermissionModalTitle">Add Permission</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col mb-3">
                  <label for="ps_name" class="form-label">Permission Name</label>
                  <input type="text" id="ps_name" name="ps_name" class="form-control" placeholder="Enter Permission Name">
                  <span class="text-danger" id="ps_name_error"></span>
               </div>
            </div>
            <div class="row">
               <div class="col mb-3">
                  <label for="ps_slug" class="form-label">Permission Slug</label>
                  <input type="text" id="ps_slug" name="ps_slug" class="form-control" placeholder="Enter Pemission Slug">
                  <span class="text-danger" id="ps_slug_error"></span>
               </div>
            </div>
            <div class="row g-2">
               <div class="col mb-3">
                  <label for="ps_group" class="form-label">Permission Group</label>
                  <input type="number" id="ps_group" name="ps_group" min='0' class="form-control" placeholder="123">
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
               <h5>User Permission</h5>
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPermissionModal"><i class="bx bx-plus"></i> Add Data</button>
            </div>
            <div class="table-responsive text-nowrap">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th width="5%">No.</th>
                        <th >Permission</th>
                        <th >Slug</th>
                        <th width="15%" style="text-align: center">Group</th>
                        <th width="20%">Status</th>
                        <th width="10%">Actions</th>
                     </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                     @foreach ($permissions as $key => $value)
                        <tr>
                           <td>{{$key + 1}}.</td>
                           <td>{{$value->ps_name}}</td>
                           <td>{{$value->ps_slug}}</td>
                           <td style="text-align: center">{{$value->ps_group}}</td>
                           <td><span class="badge {{ $value->is_active == 1 ? 'bg-label-success' : 'bg-label-secondary' }}">
                              {{ $value->is_active == 1 ? 'Active' : 'Deactive' }}
                           </span></td>
                           <td>
                              <button type="button" class="btn btn-sm btn-primary btn-edit" data-id="{{ $value->id }}">Edit</button>
                              <a href="{{ route('permission.destroy', $value->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">Delete</a>
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
         $('#ajaxPermission').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            let permissionId = $('#ps_id').val();
            let storeUrl = "{{ route('permission.store') }}";
            let editUrl = "{{ route('permission.update', ':id') }}";
            if(permissionId != "") {
               storeUrl = editUrl.replace(':id', permissionId);
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
                  if (errors.ps_name) {
                     $('#ps_name_error').text(errors.ps_name[0]);
                  } else {
                     $('#ps_name_error').text('');  // Clear previous error
                  }
                  if (errors.ps_slug) {
                     $('#ps_slug_error').text(errors.ps_slug[0]);
                  } else {
                     $('#ps_slug_error').text('');  // Clear previous error
                  }
               }
            });
            
         })

         $(document).on('click', '.btn-edit', function() {
            var permissionId = $(this).data('id');
            let url = "{{route('permission.edit', ':id')}}"
            $.ajax({
               url: url.replace(':id', permissionId),
               method: 'GET',
               success: function(response) {
                     $('#ps_id').val(response.id);
                     $('#ps_name').val(response.ps_name);
                     $('#ps_slug').val(response.ps_slug);
                     $('#ps_group').val(response.ps_group);
                     $('#is_active').prop('checked', response.is_active == 1);

                     // Show the edit modal
                     $('#addPermissionModal').modal('show');
               },
               error: function(xhr) {
                     alert('Unable to fetch role data');
               }
            });
         });

      });
   </script>
@endpush