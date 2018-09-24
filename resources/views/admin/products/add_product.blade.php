@extends('admin_layout')
@section('title')
Add Product
@endsection
@section('admin_content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li>
    <i class="icon-edit"></i>
    <a href="#">Forms</a>
  </li>
</ul>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Categries</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <form class="form-horizontal" method="POST" action="{{URL::to('/add_product')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">Product Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_name" placeholder="Category Name" required>
          </div>
        </div>

        <div class="control-group">
						<label class="control-label" for="selectError3">Product Category</label>
            <?php
              $categories = DB::table('categories')
                                                  ->where('publication_status', 1)
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
          <textarea class="cleditor" id="textarea2" rows="3" name="product_short_desc" placeholder="Category Description" required></textarea>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2" required>Product Long Description</label>
          <div class="controls">
          <textarea class="cleditor" id="textarea2" rows="3" name="product_long_desc" placeholder="Category Description" required></textarea>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">Product Price</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_price" placeholder="Category Name" required>
          </div>
        </div>

        <div class="control-group">
				  <label class="control-label" for="fileInput">Image of the product:</label>
				  <div class="controls">
					<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
				  </div>
				</div>

        <div class="control-group">
          <label class="control-label" for="date01">Product Size</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_size" placeholder="Category Name" required>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">Product Color</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_color" placeholder="Category Name" required>
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

    </div>
  </div><!--/span-->

</div><!--/row-->
@endsection
