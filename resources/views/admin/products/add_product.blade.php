@extends('admin_layout')
@section('title')
Add Product
@endsection
@section('admin_content')

<div class="row" style="margin-left: 10px;">
      <h1>Add Product</h1>
      <form class="form-horizontal" method="POST" action="{{URL::to('/add_product')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">Product Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_name" placeholder="Product Name" required>
          </div>
        </div>

        <div class="control-group">
						<label class="control-label" for="selectError3">Product Category</label>
            <?php
              $categories = DB::table('categories')
                                                  ->where('pub_stat', 1)
                                                  ->get();

              $manufactures = DB::table('manufactures')
                                                  ->where('pub_stat', 1)
                                                  ->get();
             ?>
						<div class="controls">
						  <select id="selectError3" name="category_id">
              @foreach($categories as $category)
							  <option value="{{ $category->category_id }}">{{ $category->name }}</option>
              @endforeach
						  </select>
						</div>
				</div>

        <div class="control-group">
					<label class="control-label" for="selectError3">Manufacture Name</label>
					<div class="controls">
					  <select id="selectError3" name="man_id">
              @foreach($manufactures as $manufacture)
                <option value="{{ $manufacture->man_id }}">{{ $manufacture->man_name }}</option>
              @endforeach
					  </select>
					</div>
				</div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2" required>Product Short Description</label>
          <div class="controls">
          <textarea class="cleditor" id="textarea2" rows="3" name="product_short_desc" placeholder="Product short Description" required></textarea>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2" required>Product Long Description</label>
          <div class="controls">
          <textarea class="cleditor" id="textarea2" rows="3" name="product_long_desc" placeholder="Product Description" required></textarea>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">Product Price</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_price" placeholder="Product Price" required>
          </div>
        </div>

        <div class="control-group">
		  <label class="control-label" for="fileInput">Main image of the product:</label>
      <img src="" style="display: none; height:150px; width: auto;"  id="image">

		  <div class="controls">
			<input class="input-file uniform_on" onchange="showImage.call(this)" name="product_image" id="fileInput" type="file" required>

		  </div>
		</div>

		<div class="control-group">
		  <label class="control-label" for="fileInput">More images of the product:</label>
		  <div class="controls">
			first image:
      <input class="input-file uniform_on" onchange="showImage1.call(this)" name="product_image1" id="fileInput" type="file">      
			second image:
      <input class="input-file uniform_on" onchange="showImage2.call(this)" name="product_image2" id="fileInput" type="file">
			third image:
      <input class="input-file uniform_on" onchange="showImage3.call(this)" name="product_image3" id="fileInput" type="file">
      <img src="" style="display: none; height:auto; width: 33%;"  id="image1">
      <img src="" style="display: none; height:auto; width: 33%;"  id="image2">
      <img src="" style="display: none; height:auto; width: 33%;"  id="image3">
		  </div>
		</div>

        <div class="control-group">
          <label class="control-label" for="date01">Product Size</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_size" placeholder="Product Size" required>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">Product Color</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_color" placeholder="Product Color" required>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Publication Status</label>
          <div class="controls">
          <input type="checkbox" name="publication_status" value="1"/>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Add Product</button>
          <button type="reset" class="btn">Cancel</button>
        </div>
        </fieldset>
      </form>

</div><!--/row-->

      <script type="text/javascript">
        function showImage()
        {
          if (this.files && this.files[0]) {
            var obj = new FileReader();
            obj.onload = function(data) {
              var image = document.getElementById("image");
              // alert(data.target.result);
              image.src = data.target.result;
              image.style.display = "block";
            }

            obj.readAsDataURL(this.files[0]);
          }
        }

        function showImage1()
        {
          if (this.files && this.files[0]) {
            var obj = new FileReader();
            obj.onload = function(data) {
              var image = document.getElementById("image1");
              // alert(data.target.result);
              image.src = data.target.result;
              image.style.display = "inline";
            }

            obj.readAsDataURL(this.files[0]);
          }
        }

        function showImage2()
        {
          if (this.files && this.files[0]) {
            var obj = new FileReader();
            obj.onload = function(data) {
              var image = document.getElementById("image2");
              // alert(data.target.result);
              image.src = data.target.result;
              image.style.display = "inline";
            }

            obj.readAsDataURL(this.files[0]);
          }
        }

        function showImage3()
        {
          if (this.files && this.files[0]) {
            var obj = new FileReader();
            obj.onload = function(data) {
              var image = document.getElementById("image3");
              // alert(data.target.result);
              image.src = data.target.result;
              image.style.display = "inline";
            }

            obj.readAsDataURL(this.files[0]);
          }
        }
      </script>




@endsection
