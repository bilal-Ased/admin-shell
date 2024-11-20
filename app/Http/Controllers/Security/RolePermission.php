<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermission extends Controller
{
    public function index(Request $request)
    {

        $roles = Role::get();
        $permissions = Permission::get();
        return view('role-permission.permissions', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permission_id' => 'required|exists:permissions,id',
            'action' => 'required|in:assign,revoke', // `assign` to add, `revoke` to remove
        ]);

        $role = Role::findById($validatedData['role_id']);
        $permission = Permission::findById($validatedData['permission_id']);

        if ($validatedData['action'] === 'assign') {
            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
            }
        } elseif ($validatedData['action'] === 'revoke') {
            if ($role->hasPermissionTo($permission)) {
                $role->revokePermissionTo($permission);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Role-permission assignment updated successfully.',
        ]);
    }
}
