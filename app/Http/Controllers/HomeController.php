<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permission = Permission::create(['name' => 'edit user']);
        $role = Role::findById(2);

        // $permission = Permission::findById(1);
        $role->givePermissionTo($permission);
        return view('home');
    }
}
