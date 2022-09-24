<!--slider-->
<div id="carouselSlider" class="carousel slide mb-4" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselSlider" data-slide-to="0" class="active"></li>
        <li data-target="#carouselSlider" data-slide-to="1"></li>
        <li data-target="#carouselSlider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="<?php echo base_url() ?>/uploads/banners/slider-1.jpg" alt="First slide">
        </div>
        <div class="carousel-item ">
            <img class="d-block img-fluid" src="<?php echo base_url() ?>/uploads/banners/slider-2.jpg" alt="First slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>