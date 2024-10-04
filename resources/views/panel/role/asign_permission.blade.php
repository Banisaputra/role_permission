@extends('panel.layouts.master')

@section('title')
    <title>Asign Permission</title>
@endsection

@push('css')
   {{-- <link rel="stylesheet" href=""> --}}
@endpush

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
     <div class="col-lg-12 mb-4 order-0">
         <div class="card">
            <div class="card-header">
               <h5>Role Permission</h5>
            </div>
            <div class="card-body">
               <div class="mb-6">
                  <p class="mb-1">Role Name : </p>
                  <h6> {{ $role->role_name }}</h6>
               </div>
               <div class="mb-6">
                  <p class="mb-1">Description : </p>
                  <h6> {{ $role->role_description }}</h6>
               </div>
               <div class="mb-6">
                  <p class="mb-1">User Count : </p>
                  <h6>8 Employees</h6>
               </div>
            </div>
            <div class="table-responsive">
               <table class="table table-striped table-borderless border-bottom">
                 <thead>
                   <tr>
                     <th class="text-nowrap">Type</th>
                     <th class="text-nowrap text-center">Email</th>
                     <th class="text-nowrap text-center">Browser</th>
                     <th class="text-nowrap text-center">App</th>
                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td class="text-nowrap">New for you</td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck1" checked="">
                       </div>
                     </td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck2" checked="">
                       </div>
                     </td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck3" checked="">
                       </div>
                     </td>
                   </tr>
                   <tr>
                     <td class="text-nowrap">Account activity</td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck4" checked="">
                       </div>
                     </td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck5" checked="">
                       </div>
                     </td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck6" checked="">
                       </div>
                     </td>
                   </tr>
                   <tr>
                     <td class="text-nowrap">A new browser used to sign in</td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck7" checked="">
                       </div>
                     </td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck8" checked="">
                       </div>
                     </td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck9">
                       </div>
                     </td>
                   </tr>
                   <tr>
                     <td class="text-nowrap">A new device is linked</td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck10" checked="">
                       </div>
                     </td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck11">
                       </div>
                     </td>
                     <td>
                       <div class="form-check d-flex justify-content-center">
                         <input class="form-check-input" type="checkbox" id="defaultCheck12">
                       </div>
                     </td>
                   </tr>
                 </tbody>
               </table>
             </div>
         </div>
     </div>
   </div>
</div>

@endsection

@push('js')
   
@endpush