<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;


class RoleController extends Controller
{
    public function index() {
        if(session()->has('success')) {
            Alert::success('Success', session()->get('success'), 'success');
        }
        $roles = Role::orderBy('role_name','ASC')->get();
        $title = 'Delete Role!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('panel.role.index', compact('roles')); 
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'role_code' => 'required|string|max:20|unique:roles',
                'role_name' => 'required|string|max:100',
            ]);

            $validatedData['is_active'] = 0;
            $validatedData['role_description'] = $request->role_description;
            if(!empty($request->is_active)) $validatedData['is_active'] = 1;

            $asignRole = Role::create($validatedData);
            Session::flash('success', 'Role created successfully'); 

            return response()->json(['success' => true]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed'
            ], 422);  // 422 Unprocessable Entity
        }
    }

    public function edit($id) {
        $role = Role::find($id);
        if (!$role) {
            abort(404);
        }
        return response()->json($role);
    }

    public function update(Request $request) {
        $role = Role::find($request->role_id);
        if (!$role) {
            abort(404);
        }
        try {
            $validatedData = $request->validate([
                'role_code' => ['required','string','max:20', 'unique:roles,role_code,'.$request->role_id],
                'role_name' => ['required','string','max:100'],
            ]);

            $validatedData['is_active'] = 0;
            $validatedData['role_description'] = $request->role_description;
            if(!empty($request->is_active)) $validatedData['is_active'] = 1;

            $role->update($validatedData);
            Session::flash('success', 'Role updated successfully'); 

            return response()->json(['success' => true]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed'
            ], 422);  // 422 Unprocessable Entity
        }
    }

    public function destroy($id) {
        $role = Role::find($id);
        if (!$role) {
            abort(404);
        }
        $role->delete();
        Session::flash('success', 'Role deleted successfully'); 

        return redirect()->back();
    }
}
