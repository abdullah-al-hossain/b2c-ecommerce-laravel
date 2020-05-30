@extends('admin_layout')
@section('title')
Edit Delivery Man
@endsection
@section('admin_content')

<div class="row" style="margin-left: 10px;">
      <h1>Edit Delivery Man</h1>
      <form class="form-horizontal" method="POST" action="{{URL::to('/update_dm')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">Delivery Man Name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="dm_name" placeholder="Delivery Man Name" value="{{ $product->product_name}}"required>
          </div>
        </div>



        <input type="hidden" name="product_image" value="{{ $product->product_image }}"/>
        <input type="hidden" name="p_id" value="{{ $product->p_id }}">



        <div class="control-group">
          <label class="control-label" for="date01">Delivery Man Area</label>
          <div class="controls">
          <select name="dm_area">
           <option value="raojan"
                @if($product->area == 'raojan')
                  selected
                @endif
                >
                Raojan</option>
           <option value="rangunia"
               @if($product->area == 'rangunia')
                 selected
               @endif
               >
               Rangunia</option>
           <option value="gec"
               @if($product->area == 'gec')
                 selected
               @endif
               >
               GEC</option>
           <option value="murad"
               @if($product->area == 'murad')
                 selected
               @endif
               >Muradpur</option>
          </select>
        </div>
				</div>


        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2" required>Delivery Man Description</label>
          <div class="controls">
          <textarea class="cleditor" id="textarea2" rows="3" name="desc" placeholder="Product short Description" required>{{ $product->desc }}</textarea>
          </div>
        </div>

        <div class="control-group">
    		  <label class="control-label" for="fileInput">Image of the Delivery Man:</label>
          <img src="" style="display: none; height:150px; width: auto;"  id="image">

    		  <div class="controls">
    			<input class="input-file uniform_on" onchange="showImage.call(this)" name="image" id="fileInput" type="file">

    		  </div>
    		</div>

        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Available Status</label>
          <div class="controls">
          <input type="checkbox" name="pub_stat" value="1"
          @if($product->pub_stat == 1)
          checked
          @endif
          />
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Update</button>
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
