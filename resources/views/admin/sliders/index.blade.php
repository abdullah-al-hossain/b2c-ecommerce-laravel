@extends('admin_layout')
@section('title')
Sliders
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
      <h2><i class="halflings-icon user"></i><span class="break"></span>All products</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <table class="table table-responsive table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>Slider ID</th>
            <th>Slider Images</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
        <tr>
          <td>{{ $slider->slider_id }}</td>
          <td><img class="img-responsive" style="height: 150px; width: 300px;" src="{{ $slider->slider_image }}" alt="slider image"></td>

          <td class="center">
            <?php
            if ($slider->pub_stat == 1) {
              echo '<span class="label label-success">Active</span>';
            } else {
              echo '<span class="label label-danger">Inactive</span>';
            }

             ?>
          </td>
          <td class="center">
            <form action="/edit_slider_pub_stat" method="POST" style="display: inline-block; padding: 0px; margin: 0px;">
              {{ csrf_field() }}
                <input type="hidden" name="slider_id" value="{{$slider->slider_id}}"/>
                <input type="hidden" name="pub_stat" value="{{$slider->pub_stat}}"/>
                <button type="submit" style="font-size: 30px;"
                <?php
                if ($slider->pub_stat == 1) {
                  echo 'class="btn label-danger"';
                } else {
                  echo 'class="btn btn-success"';
                }

                ?>
                >
                  <i
                  <?php
                  if ($slider->pub_stat == 1) {
                    echo 'class="halflings-icon white thumbs-down"';
                  } else {
                    echo 'class="halflings-icon white thumbs-up"';
                  }
                  ?>
                  ></i>
                </button>
            </form>
            <!-- **************** -->
            <a class="btn btn-danger" href='/delete_slider/{{ $slider->slider_id}}' id="delete"><i class="halflings-icon white trash"></i></a>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
