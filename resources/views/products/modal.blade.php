
 <form method="post" action="{{ route('products.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" name="category" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand:</label>
                            <input type="text" name="brand" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" step="0.01" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Product Image:</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Product</button>
</form>

