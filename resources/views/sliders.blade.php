<section id="slider"><!--slider-->
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div
            @if($slide_1 == 1)
              class="item active"
            @else
              class="item"
            @endif
              <?php
                $slide_1 = 0;
               ?>
            >
              <div class="col-sm-9">
                <img src="{{ $slider->slider_image }}" class="img-responsive" alt="" />
                <!--<img src="{{asset('frontend/images/home/pricing.png')}}"  class="pricing" alt="" /> -->
              </div>
            </div>
            @endforeach


          </div>

          <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>

      </div>
    </div>
  </div>
</section>
