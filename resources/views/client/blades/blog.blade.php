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
                               <a class="text-white" href="">11 de Janeiro de 2025</a>
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
                               <a class="text-white" href="">11 de Janeiro de 2025</a>
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
                               <a class="text-white" href="">11 de Janeiro de 2025</a>
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
                <div class="col-md-6 box-small">
                   <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="{{asset('build/client/images/news-700x435-1.jpg')}}" style="object-fit: cover;">
                      <div class="overlay">
                         <div class="mb-2">
                            <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                            <a class="text-white" href=""><small>11 de Janeiro de 2025</small></a>
                         </div>
                         <a class="h6 m-0 text-white text-uppercase fw-semibold d-block" href="">Lorem ipsum dolor sit amet elit...</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-6 box-small">
                   <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="{{asset('build/client/images/news-700x435-2.jpg')}}" style="object-fit: cover;">
                      <div class="overlay">
                         <div class="mb-2">
                            <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                            <a class="text-white" href=""><small>11 de Janeiro de 2025</small></a>
                         </div>
                         <a class="h6 m-0 text-white text-uppercase fw-semibold d-block" href="">Lorem ipsum dolor sit amet elit...</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-6 box-small">
                   <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="{{asset('build/client/images/news-700x435-3.jpg')}}" style="object-fit: cover;">
                      <div class="overlay">
                         <div class="mb-2">
                            <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                            <a class="text-white" href=""><small>11 de Janeiro de 2025</small></a>
                         </div>
                         <a class="h6 m-0 text-white text-uppercase fw-semibold d-block" href="">Lorem ipsum dolor sit amet elit...</a>
                      </div>
                   </div>
                </div>
                <div class="col-md-6 box-small">
                   <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="{{asset('build/client/images/news-700x435-4.jpg')}}" style="object-fit: cover;">
                      <div class="overlay">
                         <div class="mb-2">
                            <a class="badge bg-primary text-uppercase fw-semibold py-2 px-2 me-2" href="">Business</a>
                            <a class="text-white" href=""><small>11 de Janeiro de 2025</small></a>
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
<section class="blog-content mt-5">
   <!-- News With Sidebar Start -->
   <div class="container-fluid">
       <div class="container">
           <div class="row">
               <div class="col-lg-8">
                   <div class="row">
                       <div class="col-12">
                          <form action="">
                              <input type="search" name="search" class="form-control form-control-lg" placeholder="Pesquise aqui">
                          </form>
                       </div>
                       @for ($i = 0; $i < 5; $i++)
                           <div class="col-lg-12 mt-4">
                              <div class="row news-lg mx-0 mb-3 border rounded-2 overflow-hidden">
                                 <div class="col-md-6 h-100 px-0 overflow-hidden">
                                       <img class="img-fluid h-100" src="{{ asset('build/client/images/news-700x435-5.jpg') }}" style="object-fit: cover;">
                                 </div>
                                 <div class="col-md-6 d-flex flex-column bg-white h-100 px-0">
                                       <div class="mt-auto p-4">
                                          <div class="mb-2">
                                             <a class="badge badge-primary background-red text-uppercase font-weight-semi-bold p-2 mr-2" href="">
                                                   Business
                                             </a>
                                             <a class="text-body" href="">
                                                   <small>11 de Janeiro de 2025</small>
                                             </a>
                                          </div>
                                          <a class="h4 d-block mb-3 text-uppercase font-weight-bold title-blue" href="">
                                             Lorem ipsum dolor sit amet elit...
                                          </a>
                                          <p class="m-0 text-color">
                                             Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                             rebum clita rebum dolor stet amet justo
                                          </p>
                                       </div>
                                 </div>
                              </div>
                           </div>
                       @endfor

                   </div>
               </div>
               
               <div class="col-lg-4">
                                     <!-- Tags Start -->
                   <div class="mb-3">
                       <div class="section-title mb-0 rounded-top-left rounded-top-left rounded-top-left rounded-top-left">
                           <h4 class="m-0 text-uppercase font-weight-bold title-blue">CATEGORIAS</h4>
                       </div>
                       <div class="bg-white border border-top-0 p-3">
                           <div class="d-flex flex-wrap m-n1">
                               <a href="" class="btn btn-sm btn-outline-secondary m-1 active background-red">Politics</a>
                               <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                               <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                               <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                               <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                               <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                               <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                               <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                               <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                               <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                           </div>
                       </div>
                   </div>
                   <!-- Tags End -->

                   <!-- Popular News Start -->
                   <div class="mb-3">
                       <div class="section-title mb-0 rounded-top-left rounded-top-left rounded-top-left">
                           <h4 class="m-0 text-uppercase font-weight-bold title-blue">VEJA TAMBÉM</h4>
                       </div>
                       <div class="bg-white border border-top-0 p-3">
                           @for ($i = 0; $i < 5; $i++)
                              <div class="d-flex align-items-center bg-white mb-3 overflow-hidden" style="height: 110px;">
                                 <img class="img-fluid" src="{{asset('build/client/images/news-110x110-1.jpg')}}" alt="">
                                 <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                          <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2 background-red" href="">Business</a>
                                          <a class="text-body" href=""><small>11 de Janeiro de 2025</small></a>
                                    </div>
                                    <a class="h6 m-0 text-uppercase font-weight-bold title-blue" href="">Lorem ipsum dolor sit amet elit...</a>
                                 </div>
                              </div>
                           @endfor
                       </div>
                   </div>
                   <!-- Popular News End -->

                   <!-- Newsletter Start -->
                   <div class="mb-3">
                       <div class="section-title mb-0 rounded-top-left rounded-top-left rounded-top-left">
                           <h4 class="m-0 text-uppercase font-weight-bold title-blue">Newsletter</h4>
                       </div>
                       <div class="bg-white text-center border border-top-0 p-3">
                           <p class="text-color text-start">Cadastre-se abaixo e receba as principais novidades via e-mail!</p>
                           <div class="input-group mb-2" style="width: 100%;">
                               <input type="text" class="form-control form-control-lg" placeholder="Seu e-mail">
                               <div class="input-group-append">
                                   <button class="btn background-red text-white font-weight-bold px-3 h-100 rounded-3">Enviar</button>
                               </div>
                           </div>
                           <div class="d-flex justify-content-start align-items-center gap-2">
                              <input type="checkbox" id="check">
                              <label for="check" class="text-color">Aceito os termos descritos na Política de Privacidade</label>
                           </div>
                       </div>
                   </div>
                   <!-- Newsletter End -->

                   <!-- Ads Start -->
                   <div class="mb-3">
                       <div class="bg-white text-center px-0 overflow-hidden">
                           <a href=""><img class="img-fluid w-100" src="{{asset('build/client/images/anuncio.png')}}" alt=""></a>
                       </div>
                   </div>
                   <!-- Ads End -->
               </div>
           </div>
       </div>
   </div>
   <!-- News With Sidebar End -->
</section>
@endsection