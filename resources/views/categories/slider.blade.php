<div class="category-slider-box slider-box">
    <div class="row align-items-center">
        <div class="col-12">
            <div class="owl-carousel carousel-main">
                @foreach ($groups as $name=>$group)
                    <div class="slider-content-box">
                        <a href="videocontent.php">
                            <div>
                                <span>{{$name}}</span>
                                @foreach($group as $videos)
                                <p><a href="{{ route('video.show', $videos['id']) }}">{{$videos['video_lecture']}}</a></p>
                                @endforeach
                            </div>
                        </a>
                    </div>
                @endforeach   
            </div>
        </div>
    </div>
</div>



<script>
$('.carousel-main').owlCarousel({
	loop: true,
	autoplay: true,
	autoplayTimeout: 5000,
    nav: true,
    margin: 10,
	dots: false,
  navText: ["<i class='fa fa-chevron-left offer-slider-button'></i>","<i class='fa fa-chevron-right offer-slider-button'></i>"],
  responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        767:{
            items:3,
            nav:true
        },
        991:{
            items:5,
            nav:true
        }
    }
});
</script>