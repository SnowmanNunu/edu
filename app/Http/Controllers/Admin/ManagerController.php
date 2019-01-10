<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Manager;

class ManagerController extends Controller
{
    public function index(){
    	$data = Manager::get();
    	return view('admin.manager.index',compact('data'));
    }
}
