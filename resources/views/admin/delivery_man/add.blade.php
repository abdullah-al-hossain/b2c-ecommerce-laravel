@extends('admin_layout')
@section('title')
Add Delivery Man
@endsection
@section('admin_content')

<div class="row" style="margin-left: 10px;">
      <h1>Add Delivery Man</h1>
      <form class="form-horizontal" method="POST" action="{{URL::to('/add_dm')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">Delivery Man Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="dm_name" placeholder="Delivery Man Name" required>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="date01">Delivery Man Area</label>
          <div class="controls">
          <select name="dm_area">
           <option value="raojan">Raojan</option>
           <option value="rangunia">Rangunia</option>
           <option value="gec">GEC</option>
           <option value="murad">Muradpur</option>
          </select>
        </div>
				</div>


        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2" required>Delivery Man Description</label>
          <div class="controls">
          <textarea class="cleditor" id="textarea2" rows="3" name="desc" placeholder="Product short Description" required></textarea>
          </div>
        </div>

        <div class="control-group">
		  <label class="control-label" for="fileInput">Image of the Delivery Man:</label>
      <img src="" style="display: none; height:150px; width: auto;"  id="image">

		  <div class="controls">
			<input class="input-file uniform_on" onchange="showImage.call(this)" name="image" id="fileInput" type="file" required>

		  </div>
		</div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Available Status</label>
          <div class="controls">
          <input type="checkbox" name="publication_status" value="1"/>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Add</button>
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
      </script>

@endsection
