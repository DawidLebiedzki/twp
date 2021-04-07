<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use DataTables;

class UserController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
            $model = User::with('roles');
            if($request->ajax()){
            return Datatables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('role', function(User $user){
                    return implode(', ', $user->roles()->get()->pluck('displayed_name')->toArray());

                })
                ->editColumn('created_at', function ($model) {
                    return $model->created_at->format('d.m.Y');
                })
                ->addColumn('action', function(User $user){
                    $btn =  '<a  href="users/' . $user->id . '" type="button " class="btn btn-outline btn-info btn-xs"><i class="fa fa-eye"
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="Vorschau"></i></a>
                            <a href="users/'.$user->id. '/edit" type="button" class=" btn btn-outline btn-success btn-xs" ><i class="fa fa-edit"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Bearbeiten"></i></a>
                            <button type="button" class="btn-outline btn-danger btn btn-xs"><i class="fa fa-trash"
                                                    data-toggle="tooltip" data-placement="right"
                                                    title="Löschen"></i></button>';
                    return $btn;
                 })
                ->rawColumns(['action'])
                ->make(true);
            }
       

       return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('avatar');

        $validatedData = $request->validate([
            'username'=>'required|unique:users|numeric',
            'fname'=>'required|max:255',
            'lname' => 'required|max:255',
            'role'=>'required'
        ]);        

        $user = User::create($request->all());

        $user->assignRole($request->role);

        $user->addMedia($request->avatar)->toMediaCollection('avatars');
        // redirect
        Session::flash('message', 'Successfully created user!');
        return Redirect::route('admin.users.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $user = User::find($id);
        $roles = Role::all();
        
        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $avatar = $user;
        return view('admin.users.show')->with([
            'user' => $user,
            'roles' => $roles,
            'avatar' => $avatar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'role' => 'required'
        ]);
        
        $user = User::find($id);
        $user->update($request->all());

        $user->syncRoles($request->role);
        $user->addMedia($request->avatar)->toMediaCollection('avatars');
        // redirect
        Session::flash('message', 'Benutzer wurde aktualiesiert!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        // redirect
        Session::flash('message', 'Benutzer wurde entfernt!');
        return redirect()->route('admin.users.index');
    }
}
