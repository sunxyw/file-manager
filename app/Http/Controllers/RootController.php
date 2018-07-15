<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class RootController extends Controller
{
	public function index($dir = '/')
	{
		$files = Storage::files($dir);
		$directories = Storage::directories($dir);
		return view('index', compact('directories', 'files'));
	}
}
