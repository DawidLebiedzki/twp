<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = Machine::all();
        return view('admin.machines.index')->with('machines', $machines);
    }
}
