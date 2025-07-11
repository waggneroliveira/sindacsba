@extends('client.core.client')
@section('content')

<section class="blog" style="margin-top: 200px">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-7 p-0">
             <!-- Swiper Main Carousel -->
             <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                   <div class="swiper-slide">
                      <div class="position-relative overflow-hidden" style="height: 500px;">
                         <img class="img-fluid h-100 w-100" src="{{asset('build/client/images/news-800x500-1.jpg')}}" style="object-fit: cover;aspect-ratio: 2 / 1">
                         <div class="overlay">
                            <div class="mb-2">
                               <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                               <a class="text-white" href="">Jan 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase fw-bold d-block" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                         </div>
                      </div>
                   </div>
                   <div class="swiper-slide">
                      <div class="position-relative overflow-hidden" style="height: 500px;">
                         <img class="img-fluid h-100 w-100" src="{{asset('build/client/images/news-800x500-2.jpg')}}" style="object-fit: cover;aspect-ratio: 2 / 1">
                         <div class="overlay">
                            <div class="mb-2">
                               <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                               <a class="text-white" href="">Jan 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase fw-bold d-block" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                         </div>
                      </div>
                   </div>
                   <div class="swiper-slide">
                      <div class="position-relative overflow-hidden" style="height: 500px;">
                         <img class="img-fluid h-100 w-100" src="{{asset('build/client/images/news-800x500-3.jpg')}}" style="object-fit: cover;aspect-ratio: 2 / 1">
                         <div class="overlay">
                            <div class="mb-2">
                               <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                               <a class="text-white" href="">Jan 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase fw-bold d-block" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
                         </div>
                      </div>
                   </div>
                </div>
                <!-- Swiper pagination & navigation (optional) -->
                <div class="swiper-pagination"></div>
             </div>
          </div>
          <div class="col-lg-5 p-0">
             <div class="row g-0">
                <!-- Static small boxes as before -->
                <div class="col-md-6">
                   <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="{{asset('build/client/images/news-700x435-1.jpg')}}" style="object-fit: cover;">
                      <div class="overlay">
                         <div class="mb-2">
                            <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                            <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                         </div>
                         <a class="h6 m-0 text-white text-uppercase fw-semibold d-block" href="">Lorem ipsum dolor sit amet elit...</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="{{asset('build/client/images/news-700x435-2.jpg')}}" style="object-fit: cover;">
                      <div class="overlay">
                         <div class="mb-2">
                            <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                            <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                         </div>
                         <a class="h6 m-0 text-white text-uppercase fw-semibold d-block" href="">Lorem ipsum dolor sit amet elit...</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="{{asset('build/client/images/news-700x435-3.jpg')}}" style="object-fit: cover;">
                      <div class="overlay">
                         <div class="mb-2">
                            <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                            <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                         </div>
                         <a class="h6 m-0 text-white text-uppercase fw-semibold d-block" href="">Lorem ipsum dolor sit amet elit...</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="{{asset('build/client/images/news-700x435-4.jpg')}}" style="object-fit: cover;">
                      <div class="overlay">
                         <div class="mb-2">
                            <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                            <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                         </div>
                         <a class="h6 m-0 text-white text-uppercase fw-semibold d-block" href="">Lorem ipsum dolor sit amet elit...</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</section>

@endsection