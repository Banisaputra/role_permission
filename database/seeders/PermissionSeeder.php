<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            [
                'ps_name' => 'Dashboard',
                'ps_slug' => 'Dashboard',
                'ps_group' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'User',
                'ps_slug' => 'User',
                'ps_group' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Add User',
                'ps_slug' => 'Add User',
                'ps_group' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Edit User',
                'ps_slug' => 'Edit User',
                'ps_group' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Delete User',
                'ps_slug' => 'Delete User',
                'ps_group' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Role',
                'ps_slug' => 'Role',
                'ps_group' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Add Role',
                'ps_slug' => 'Add Role',
                'ps_group' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Edit Role',
                'ps_slug' => 'Edit Role',
                'ps_group' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Delete Role',
                'ps_slug' => 'Delete Role',
                'ps_group' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Category',
                'ps_slug' => 'Category',
                'ps_group' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Add Category',
                'ps_slug' => 'Add Category',
                'ps_group' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Edit Category',
                'ps_slug' => 'Edit Category',
                'ps_group' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Delete Category',
                'ps_slug' => 'Delete Category',
                'ps_group' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Sub Category',
                'ps_slug' => 'Sub Category',
                'ps_group' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Add Sub Category',
                'ps_slug' => 'Add Sub Category',
                'ps_group' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Edit Sub Category',
                'ps_slug' => 'Edit Sub Category',
                'ps_group' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Delete Sub Category',
                'ps_slug' => 'Delete Sub Category',
                'ps_group' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Product',
                'ps_slug' => 'Product',
                'ps_group' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Add Product',
                'ps_slug' => 'Add Product',
                'ps_group' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Edit Product',
                'ps_slug' => 'Edit Product',
                'ps_group' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Delete Product',
                'ps_slug' => 'Delete Product',
                'ps_group' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ], [
                'ps_name' => 'Setting',
                'ps_slug' => 'Setting',
                'ps_group' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ]);
    }
}
