<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class RootController extends Controller
{
	public function index($path = '/')
	{
		$path = url2path($path);
		$files = Storage::files($path);
		$directories = Storage::directories($path);
		return view('index', compact('directories', 'files', 'path'));
	}

	public function show($file)
	{
		$file = url2path($file);
		return Storage::download($file);
	}
}
