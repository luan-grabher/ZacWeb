<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private function getViewTablePermissions(User $user)
    {
        return view('admin.tabs.users.tablePermissions', ['permissions' => Permission::all(), 'user' => $user]);
    }

    public function getTablePermissions($request)
    {
        $id = intval($request);
        if ($id != 0) {
            $user = User::find($id);
        } else {
            $user = null;
        }

        return $this->getViewTablePermissions($user);
    }

    public function permissionToggle($userId, $permissionId, $toggle)
    {
        $idUser = intval($userId);
        $idPermission = intval($permissionId);
        $user = User::find($idUser);
        $permission = Permission::find($idPermission);
        if ($toggle=='remove') {
            $user->permissions()->detach($permission);
        }else{
            $user->permissions()->attach($permission);
        }
        $user->save();
        return $this->getViewTablePermissions($user);
    }
}
