@extends('admin_layout')
@section('title')
Edit Category
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
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <form class="form-horizontal" method="POST" action="{{URL::to('/update_cat')}}">
        {{ csrf_field() }}
        <input type="hidden" name="category_id" value="{{ $category->category_id }}">
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">Category Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="category_name" placeholder="Category Name" value="{{ $category->name }}"required>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2" required>Category Description</label>
          <div class="controls">
          <textarea class="cleditor" id="textarea2" rows="3" name="category_description" placeholder="Category Description" required>{{ $category->description }}</textarea>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Publication Status</label>
          <div class="controls">
          <input type="checkbox"
          @if($category->publication_status == 1)
          checked
          @else
          @endif
          name="publication_status" value="1"/>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="reset" class="btn">Cancel</button>
        </div>
        </fieldset>
      </form>

    </div>
  </div><!--/span-->

</div><!--/row-->
@endsection
