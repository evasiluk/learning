<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
	{
		return view('file');
	}
	
	public function store(Request $request)
	{
		$path = $request->file('avatar')->store('avatars/us2', 'public' );

        return view('file', compact('path'));
	}
	
	
}
