@extends('admin_layout')
@section('title')
Add Social
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
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Social</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <form class="form-horizontal" method="POST" action="{{URL::to('/add_social')}}">
        {{ csrf_field() }}
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">Social media Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="social_name" placeholder="Social Name" required>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2" required>Social Media Link</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="social_link" placeholder="Social Link" required>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Status</label>
          <div class="controls">
          <input type="checkbox" name="pub_stat" value="1"/>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Add Social</button>
          <button type="reset" class="btn">Cancel</button>
        </div>
        </fieldset>
      </form>

    </div>
  </div><!--/span-->

</div><!--/row-->
@endsection
