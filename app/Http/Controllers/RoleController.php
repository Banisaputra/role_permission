<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function index() {
        Alert::alert('Title', 'Message', 'Type');
        return view('panel.role.index'); 
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'role_code' =>'required|string|max:20|unique:roles',
            'role_name' =>'required|string|max:100',
        ]);

        $validatedData['is_active'] = 0;
        $validatedData['role_description'] = $request->role_description;
        if(!empty($request->is_active)) $validatedData['is_active'] = 1;

        $asignRole = Role::create($validatedData);
        if ($asignRole) {
           $result = [
               'success' => true,
               'message' => 'Role created successfully'
            ];
        } else {
            $result = [
               'success' => false,
               'message' => 'Failed to create role'
            ];
        }
        return response()->json($result);
    }
}
