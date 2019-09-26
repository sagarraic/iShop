<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script
		src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous"></script>
	</head>
	<body>
		<h1 style="text-align: center;">Add a New Products</h1>
		<div class="container">
			<div class="row">
				
				<form class="needs-validation" method="POST" action="/products" novalidate>
					{{ csrf_field() }}
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="validationTooltip02">Product Name</label>
							<input type="text" class="form-control" name="product_name" placeholder="Product name" required>
							<div class="valid-tooltip">
								Looks good!
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<label for="validationTooltipUsername">Product Description</label>
							<div class="input-group">
								<input type="textarea" class="form-control" name="product_description" placeholder="Product Description" required>
								<div class="invalid-tooltip">
									Please enter description !
								</div>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="validationTooltip03">Product Category</label>
							<input type="text" class="form-control" name="product_category" placeholder="Product Category" required>
							<div class="invalid-tooltip">
								Please provide a Category.
							</div>
						</div>
						
					</div>
					{{-- <div class="form-group">
						<label class="col-md-4 control-label" for="filebutton">Image</label>
						<div class="col-md-4">
							<input name="file" class="input-file" type="file" required="">
						</div>
					</div> --}}
					<button class="btn btn-primary" type="submit">Submit form</button>
				</form>
			</div>
		</body>
	</html>