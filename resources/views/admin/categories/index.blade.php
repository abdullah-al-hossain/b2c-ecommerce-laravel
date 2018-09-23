@extends('admin_layout')
@section('title')
Categories
@endsection

@section('admin_content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>All Categories</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>Category Id</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
          <td>{{ $category->category_id }}</td>
          <td>{{ $category->name }}</td>
          <td style="max-width: 500px;">{{ $category->description }}</td>
          <td class="center">
            <?php
            if ($category->publication_status == 1) {
              echo '<span class="label label-success">Active</span>';
            } else {
              echo '<span class="label label-danger">Inactive</span>';
            }

             ?>
          </td>
          <td class="center">
            <form action="/edit_cat_pub_stat" method="POST" style="display: inline-block; padding: 0px; margin: 0px;">
              {{ csrf_field() }}
                <input type="hidden" name="category_id" value="{{$category->category_id}}"/>
                <input type="hidden" name="publication_status" value="{{$category->publication_status}}"/>
                <button type="submit" style="font-size: 30px;"
                <?php
                if ($category->publication_status == 1) {
                  echo 'class="btn label-danger"';
                } else {
                  echo 'class="btn btn-success"';
                }

                ?>
                >
                  <i
                  <?php
                  if ($category->publication_status == 1) {
                    echo 'class="halflings-icon white thumbs-down"';
                  } else {
                    echo 'class="halflings-icon white thumbs-up"';
                  }
                  ?>
                  ></i>
                </button>
            </form>
            <a class="btn btn-info" href='/edit_cat/{{ $category->category_id}}'>
              <i class="halflings-icon white edit"></i>
            </a>
            <!-- **************** -->
            <a class="btn btn-danger" href='/delete_cat/{{ $category->category_id}}' id="delete"><i class="halflings-icon white trash"></i></a>            
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
