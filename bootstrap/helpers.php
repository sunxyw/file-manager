<?php

function path2url($path) {
	$url = str_replace('.', '^ext', $path);
	$url = str_replace('/', '^dir', $url);

	return $url;
}

function url2path($url) {
	$path = str_replace('^ext', '.', $url);
	$path = str_replace('^dir', '/', $path);

	return $path;
}

function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

function backU($path)
{
	$path = explode('/', $path);

	$r = '/';

	for ($i = 0; $i < count($path) - 1; $i++) {
		$r .= $path[$i];
	}

	return $r;
}