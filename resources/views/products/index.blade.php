<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<h1>Products</h1>
		<ul>
			@foreach ($products as $product)
			<li>
				<a href="/products/ {{ $product->id }}">
					{{ $product->product_name }}
				</a>
			</li>
			@endforeach
		</ul>
	</body>
</html>