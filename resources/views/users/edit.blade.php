@extends('user_layout')

@section('content')
  <h1>Edit your profile</h1>
  <form class="form" action="{{URL::to('/edit_user_profile')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      Name:
      <input type="text" name="name" value="{{ $u_info->name }}"><br><br>
      Email:
      <input type="email" name="email" value="{{ $u_info->email }}"><br><br>
      Phone:
      <input type="text" name="phone" value="{{ $u_info->mobile }}"><br><br>

      Profile Pcture:   <br>
      <input onchange="showImage.call(this)" type="file" name="u_image"><br><br>
      <img src="" style="display: none; height:auto; width: 33%;"  id="image1">
      
      <script type="text/javascript">
        function showImage()
        {
          if (this.files && this.files[0]) {
            var obj = new FileReader();
            obj.onload = function(data) {
              var image = document.getElementById("image1");
              // alert(data.target.result);
              image.src = data.target.result;
              image.style.display = "block";
            }

            obj.readAsDataURL(this.files[0]);
          }
        }
      </script>

      <input type="submit" value="Update">

  </form>
@endsection
