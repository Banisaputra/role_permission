<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    // protected $fillable = ['ps_name', 'ps_slug', 'ps_group'];
    protected $guarded = [];

    static public function getRecord() {
        $getPermissions = Permission::groupBy('ps_group')->get();
        $result = [];
        foreach ($getPermissions as $permission) {
            $getPermissionGroup = Permission::getPermissionGroup($permission->ps_group);
            $data = [];
            $data['id'] = $permission->id;
            $data['ps_name'] = $permission->ps_name;
            $group = [];
            foreach ($getPermissionGroup as $permissionGroup) {
                $dataGroup = [];
                $dataGroup['id'] = $permissionGroup->id;
                $dataGroup['ps_name'] = $permissionGroup->ps_name;
                $group[] = $dataGroup;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;
    }

    static public function getPermissionGroup($group) {
        return Permission::where('ps_group', $group)->get();
    }
}
