<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class RootController extends Controller
{
	public function index($path = '/')
	{
		$files = Storage::files($path);
		$directories = Storage::directories($path);
		return view('index', compact('directories', 'files', 'path'));
	}
}
