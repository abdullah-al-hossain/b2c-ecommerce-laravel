@extends('admin_layout')
@section('title')
Edit manufacture
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
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit manufacture</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <form class="form-horizontal" method="POST" action="{{URL::to('/update_man')}}">
        {{ csrf_field() }}
        <input type="hidden" name="man_id" value="{{ $manufacture->man_id }}">
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">Manufacture Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="man_name" placeholder="Manufacture Name" value="{{ $manufacture->man_name }}"required>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2" required>Manufacture Description</label>
          <div class="controls">
          <textarea class="cleditor" id="textarea2" rows="3" name="man_desc" placeholder="manufacture Description" required>{{ $manufacture->man_desc }}</textarea>
          </div>
        </div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Publication Status</label>
          <div class="controls">
          <input type="checkbox"
          @if($manufacture->pub_stat == 1)
          checked
          @else
          @endif
          name="pub_stat" value="1"/>
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
