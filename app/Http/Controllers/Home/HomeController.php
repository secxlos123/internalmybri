<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = session()->get('user');
    	foreach ($users as $user) {
    		$data = $user;
    	}
        return view('internals.home.index', compact('data'));
    }
}
