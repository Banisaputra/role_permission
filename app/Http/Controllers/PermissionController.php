<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class PermissionController extends Controller
{
    public function index() {
        if(session()->has('success')) {
            Alert::success('Success', session()->get('success'), 'success');
        }
        $permissions = Permission::orderBy('ps_name','ASC')->get();
        $title = 'Delete Permission!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('panel.permission.index', compact('permissions')); 
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'ps_slug' => 'required|string|max:255|unique:permissions',
                'ps_name' => 'required|string|max:255|unique:permissions',
            ]);

            $validatedData['is_active'] = 0;
            $validatedData['ps_group'] = $request->ps_group;
            if(!empty($request->is_active)) $validatedData['is_active'] = 1;

            $asignPermission = Permission::create($validatedData);
            Session::flash('success', 'Permission created successfully'); 

            return response()->json(['success' => true]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed'
            ], 422);  // 422 Unprocessable Entity
        }
    }

    public function edit($id) {
        $permission = Permission::find($id);
        if (!$permission) {
            abort(404);
        }
        return response()->json($permission);
    }

    public function update(Request $request) {
        $permission = Permission::find($request->ps_id);
        if (!$permission) {
            abort(404);
        }
        try {
            $validatedData = $request->validate([
                'ps_slug' => ['required','string','max:255', 'unique:permissions,ps_slug,'.$request->ps_id],
                'ps_name' => ['required','string','max:255', 'unique:permissions,ps_slug,'.$request->ps_id],
            ]);

            $validatedData['is_active'] = 0;
            $validatedData['ps_group'] = $request->ps_group;
            if(!empty($request->is_active)) $validatedData['is_active'] = 1;

            $permission->update($validatedData);
            Session::flash('success', 'Permission updated successfully'); 

            return response()->json(['success' => true]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed'
            ], 422);  // 422 Unprocessable Entity
        }
    }

    public function destroy($id) {
        $permission = Permission::find($id);
        if (!$permission) {
            abort(404);
        }
        $permission->delete();
        Session::flash('success', 'Permission deleted successfully'); 

        return redirect()->back();
    }
}
