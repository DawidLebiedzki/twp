<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $permission = Permission::create(['name' => 'show-article']);
        // $permission1 = Permission::create(['name' => 'edit-article']);
        // $permission2 = Permission::create(['name' => 'create-article']);
        // $permission3 = Permission::create(['name' => 'delete-article']);

        // $permission4 = Permission::create(['name' => 'show-role']);
        // $permission5 = Permission::create(['name' => 'edit-role']);
        // $permission6 = Permission::create(['name' => 'create-role']);
        // $permission7 = Permission::create(['name' => 'delete-role']);
        // $role = Role::findById(2);

        // $permission = Permission::findById(1);
        // $role->givePermissionTo($permission);

        // $role = Role::findById(2);
        // $role->givePermissionTo(['create-user', 'show-user', 'delete-user', 'show-article', 'edit-article', 'create-article', 'delete-article', 'show-role', 'edit-role', 'create-role', 'delete-role']);

        // return auth()->user()->getAllPermissions();
        
        return view('home');
    }
}
