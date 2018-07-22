<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>文件管理系统</title>

	<link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

	<style>
		.bg-lan-light {
			background-color: #58B2DC;
			color: #f8f9fa;
		}
		.bg-lan-dark {
			background-color: #2EA9DF;
			color: #f8f9fa;
		}
		.bg-green {
			background-color: #1B813E;
		}

		.dir-list li a:hover {
			text-decoration: none;
		}
	</style>

</head>
<body class="bg-light">
	<div class="container bg-white">
		<div class="row mt-4">

			<div class="bg-green col-md-12">
				<p class="mt-2 mb-2 text-info"><b class="text-warning">当前路径：</b> {{ $path }}</p>
			</div>
			
			<div class="bg-lan-light col-md-3">
				<div class="mt-2 mb-2">
			    	<h2 class="text-light">目录</h2>
			    	<ul class="list-group dir-list">
			    		<li class="list-group-item">
			    			<a class="text-dark" href="{{ route('index') }}">根目录</a>
			    		</li>
			    		@if(url()->current() != route('index'))
			    		<li class="list-group-item">
			    			<a class="text-dark" href="{{ backU($path) }}">上一层</a>
			    		</li>
			    		@endif
			    		@foreach($directories as $dir)
			    		<li class="list-group-item bg-lan-dark">
			    			<a class="text-light" href="{{ route('index', path2url($dir)) }}">{{ $dir }}</a>
			    		</li>
			    		@endforeach
			  	    </ul>
		   		</div>
			</div>

			<table class="table col-md-9">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">文件</th>
						<th scope="col">修改日期</th>
						<th scope="col">大小</th>
					</tr>
				</thead>
				<tbody>
					@foreach($files as $i => $file)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td><a href="{{ route('file.show', path2url($file)) }}">{{ str_replace($path . '/', '', $file) }}</a></td>
						<td>{{ Carbon\Carbon::createFromTimestamp(Storage::lastModified($file))->format('Y/m/d H:i') }}</td>
						<td>{{ human_filesize(Storage::size($file)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>

	    </div>
	</div>
</body>
</html>