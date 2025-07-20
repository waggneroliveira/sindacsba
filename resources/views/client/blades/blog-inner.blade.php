@extends('client.core.client')
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos=fade-right data-aos-delay=150>
                    @php
                        \Carbon\Carbon::setLocale('pt_BR');
                        $dataFormatada = \Carbon\Carbon::parse($blogInner->date)->translatedFormat('d \d\e F \d\e Y');
                    @endphp
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <article>
                            <h1 class="mb-3 title-blue montserrat-bold font-32 text-uppercase">{{$blogInner->title}}</h1>
                            <div class="mb-3 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                <span class="badge background-red montserrat-semiBold font-12 text-uppercase py-2 px-2 me-2">{{$blogInner->category->title}}</span>
                                <p class="text-color mb-0 montserrat-regular font-15">{{$dataFormatada}}</p>
                            </div>
                            <img class="img-fluid w-100 rounded-3" src="{{ asset('storage/'.$blogInner->path_image) }}" alt="{{$blogInner->title}}" style="object-fit: cover;">
                            <div class="py-4"> 
                                <div class="text-blog-inner montserrat-regular font-16">
                                    {!! $blogInner->text !!}
                                </div>
                            </div>                        
                        </article>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('blog')}}" class="montserrat-semiBold font-16 d-flex justify-content-between align-items-center gap-2 background-red py-2 px-3 text-white rounded-3">
                                <svg width="15" height="15" viewBox="0 0 17 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1926 2.20441L2.32113 10.6069C2.05923 10.7927 2.05923 11.2059 2.32113 11.3917L14.1926 19.7941C14.4739 19.9924 14.8716 19.8011 14.8716 19.4017V2.59536C14.8716 2.19742 14.4725 2.00613 14.1926 2.20441ZM1.09904 8.87649L12.9705 0.474006C14.6832 -0.737844 17 0.519764 17 2.59681V19.4032C17 21.4803 14.6831 22.7378 12.9705 21.526L1.09904 13.1221C-0.365655 12.085 -0.367038 9.91502 1.09904 8.87649Z" fill="white"/>
                                </svg>
                                Voltar
                            </a>

                            <div class="position-relative d-flex justify-content-center align-items-end flex-column">
                                <button id="shareBtn" class="montserrat-semiBold font-16 d-flex justify-content-around align-items-center btn background-red py-2 px-3 text-white rounded-3">
                                    <svg class="me-2" width="18" height="20" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.28845 8.58841C1.92459 8.58841 0 10.5692 0 13.002C0 15.4348 1.92459 17.4155 4.28845 17.4155C5.68567 17.4155 6.92779 16.7195 7.70969 15.6506L15.6837 20.0897C15.5186 20.5571 15.4231 21.0603 15.4231 21.5864C15.4231 24.0193 17.3477 26 19.7115 26C22.0754 26 24 24.0193 24 21.5864C24 19.1536 22.0754 17.1729 19.7115 17.1729C18.3143 17.1729 17.0722 17.8689 16.2903 18.9378L8.31633 14.4987C8.48136 14.0313 8.57691 13.5281 8.57691 12.9982C8.57691 12.4682 8.47516 11.9356 8.3002 11.4554L16.2033 6.94346C16.9789 8.08134 18.262 8.82714 19.71 8.82714C22.0739 8.82714 23.9985 6.84639 23.9985 4.41357C23.9985 1.98074 22.0739 0 19.71 0C17.3462 0 15.4216 1.98074 15.4216 4.41357C15.4216 4.88736 15.4973 5.34584 15.6313 5.77367L7.67731 10.3151C6.89306 9.26915 5.66339 8.58848 4.28466 8.58848L4.28845 8.58841ZM19.7148 18.4846C21.3788 18.4846 22.7326 19.8779 22.7326 21.5905C22.7326 23.303 21.3788 24.6963 19.7148 24.6963C18.0508 24.6963 16.697 23.303 16.697 21.5905C16.697 21.0605 16.8273 20.5611 17.0556 20.1231C17.0556 20.1231 17.0594 20.1167 17.0618 20.1167C17.0618 20.1129 17.0618 20.1065 17.068 20.1039C17.583 19.1397 18.5732 18.4859 19.7136 18.4859L19.7148 18.4846ZM19.7148 1.30799C21.3788 1.30799 22.7326 2.70127 22.7326 4.41383C22.7326 6.12639 21.3788 7.51967 19.7148 7.51967C18.0508 7.51967 16.697 6.12639 16.697 4.41383C16.697 2.70127 18.0508 1.30799 19.7148 1.30799ZM4.28845 16.1081C2.62444 16.1081 1.27065 14.7149 1.27065 13.0023C1.27065 11.2897 2.62444 9.89646 4.28845 9.89646C5.95247 9.89646 7.30626 11.2897 7.30626 13.0023C7.30626 13.5348 7.17596 14.0355 6.94393 14.4735C6.94393 14.4735 6.94393 14.4773 6.94021 14.4799C6.94021 14.4799 6.94021 14.4863 6.93648 14.4863C6.42524 15.4504 5.42758 16.1081 4.28724 16.1081L4.28845 16.1081Z" fill="white"/>
                                    </svg>
                                    Compartilhar
                                </button>
                                <div id="socialLinks" class="socialLinks mt-2 opacity-0">
                                    <div class="d-flex gap-2">
                                        <a href="https://wa.me/?text=Olha%20isso!" target="_blank" class="rounded-circle btn btn-sm bg-whatsapp"><i class="fab fa-whatsapp text-white"></i></a>
                                        <a href="https://www.instagram.com/" target="_blank" class="rounded-circle btn btn-sm btn-insta"><i class="fab fa-instagram text-white"></i></a>
                                        <a href="https://twitter.com/" target="_blank" class="rounded-circle btn btn-sm btn-twiter"><i class="fab fa-x-twitter text-white"></i></a>
                                        <a href="https://www.youtube.com/" target="_blank" class="rounded-circle btn btn-youtube btn-sm"><i class="fab fa-youtube text-white"></i></a>
                                        <a href="https://www.facebook.com/" target="_blank" class="rounded-circle btn btn-facebook btn-sm"><i class="fab fa-facebook-f text-white"></i></a>
                                        <a href="https://www.tiktok.com/" target="_blank" class="rounded-circle btn btn-tiktok btn-sm"><i class="fab fa-tiktok text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment Form Start -->
                    <div class="mb-0 mt-5">
                        <div class="section-title mb-0 rounded-top-left">
                            <h4 class="m-0 text-uppercase montserrat-bold font-25 title-blue">Deixe um comentário</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form id="commentForm">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blogInner->id }}">

                                <div class="mb-3">
                                    <label for="message">Mensagem *</label>
                                    <textarea id="message" name="comment" required cols="30" rows="5" class="form-control montserrat-regular font-15"></textarea>
                                </div>
                                                                
                                <div class="mb-0">
                                    <button type="submit" class="btn background-red rounded-3 montserrat-medium text-white font-15">Comentar</button>
                                </div>
                            </form>
                            <div id="commentMessage" class="mt-3 montserrat-regular font-15"></div>
                        </div>
                    </div>
                    <!-- Comment Form End -->

                    <!-- Comment List Start -->
                    @if (isset($blogInner->comments) && $blogInner->comments->count() > 0)                        
                        <div class="mb-3 mt-3 comments">
                            <div class="section-title mb-0 title-blue rounded-top-left">
                                <h4 class="m-0 text-uppercase montserrat-bold font-25 title-blue">{{$blogInner->comments->count()}} Comentários</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-4 comment-scroll">
                                @foreach ($blogInner->comments as $comment)
                                    @php
                                        \Carbon\Carbon::setLocale('pt_BR');
                                        $dataFormatada = \Carbon\Carbon::parse($comment->date)->translatedFormat('d \d\e F \d\e Y');
                                        $client = $comment->client;
                                    @endphp

                                    @if ($client)
                                        <div class="d-flex gap-2 flex-column mb-4">
                                            <div class="d-flex mb-0 gap-3">
                                                <img src="{{ $client->path_image ? url($client->path_image) : asset('build/client/images/user.jpg') }}"
                                                    alt="Imagem do cliente"
                                                    class="img-fluid mr-3 mt-1 rounded-circle"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                <div class="d-flex flex-column col-10">
                                                    <h6 class="title-blue montserrat-bold font-15 mb-0">{{ $client->name }}</h6>
                                                    <small class="title-blue mb-0 montserrat-regular font-12">
                                                        {{ $dataFormatada }}
                                                    </small>
                                                    <div class="w-100 mt-3">
                                                        <div class="comment-text">
                                                            {!! $comment->comment !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <!-- Comment List End -->
                </div>                

                <div class="col-lg-4" data-aos=fade-left data-aos-delay=150>
                  <aside>
                     <!-- Tags Start -->
                      <div class="mb-3">
                          <div class="section-title mb-0 rounded-top-left">
                              <h4 class="m-0 text-uppercase montserrat-bold font-22 title-blue">CATEGORIAS</h4>
                          </div>
                          <div class="bg-white border border-top-0 p-3">
                              <div class="d-flex flex-wrap m-n1">
                                  @foreach ($blogCategories as $category)
                                    <li class="nav-link">
                                        <a href="{{ route('blog', ['category' => $category->slug]) }}#news"
                                        class="btn btn-sm btn-outline-secondary montserrat-semiBold font-14 m-1
                                        {{ (request()->routeIs('blog-inner') && isset($blogInner) && $blogInner->category->id === $category->id) ? 'active background-red' : '' }}">
                                            {{ $category->title }}
                                        </a>
                                    </li>
                                @endforeach
                              </div>
                          </div>
                      </div>
                      <!-- Tags End -->
   
                      @if ($blogRelacionados)                        
                        <!-- Popular News Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0 rounded-top-left">
                                <h4 class="m-0 text-uppercase montserrat-bold font-22 title-blue">Relacionados</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-3">
                                @foreach($blogRelacionados as $relacionado)    
                                    @php
                                        \Carbon\Carbon::setLocale('pt_BR');
                                        $dataFormatada = \Carbon\Carbon::parse($relacionado->date)->translatedFormat('d \d\e F \d\e Y');
                                    @endphp                               
                                    <article>
                                        <div class="d-flex align-items-center bg-white mb-3 overflow-hidden" style="height: 110px;">
                                            <img class="img-fluid" src="{{asset('storage/'.$relacionado->path_image)}}" alt="{{$relacionado->title}}">
                                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                            <div class="mb-2 d-flex justify-content-start align-items-center gap-1 flex-wrap">
                                                <span class="badge badge-primary montserrat-semiBold font-10 text-uppercase py-1 px-2 mr-2 background-red">{{$relacionado->category->title}}</span>
                                                <p class="text-color mb-0 montserrat-regular font-12">{{$dataFormatada}}</p>
                                            </div>
                                            <a href="{{route('blog-inner', ['slug' => $relacionado->slug])}}" class="underline">
                                                <h3 class="h6 m-0 text-uppercase montserrat-bold font-14 title-blue">{{$relacionado->title}}</h3>
                                            </a>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                        <!-- Popular News End -->
                      @endif
   
                      <!-- Newsletter Start -->
                      <div class="mb-3">
                          <div class="section-title mb-0 rounded-top-left">
                              <h4 class="m-0 text-uppercase montserrat-bold font-22 title-blue">Newsletter</h4>
                          </div>
                          @include('client.includes.newsletter')
                      </div>
                      <!-- Newsletter End -->
   
                      <!-- Ads Start -->
                      @if ($announcements->count())                        
                        <div class="mb-3">
                            @include('client.includes.announcementVertical')
                        </div>
                      @endif
                      <!-- Ads End -->
                  </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showMessage(message, type) {
             $('#commentMessage').html(
                 `<div class="alert alert-${type}">${message}</div>`
             );
 
             setTimeout(() => {
                 $('#commentMessage').fadeOut('slow', function () {
                     $(this).html('').show();
                 });
             }, 3000);
         }
        //Envio do comentario via ajax
        $('#commentForm').on('submit', function (e) {
            e.preventDefault();

            // Atualiza textarea com conteúdo do CKEditor
            for (let instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            const comment = $('#message').val();

            // Remove tags HTML e espaços para verificar se tem conteúdo real
            const commentText = $('<div>').html(comment).text().trim();

            if (!commentText) {
                showMessage('O campo mensagem é obrigatório e não pode conter apenas espaços.', 'danger');
                return;
            }

            const $btn = $(this).find('button[type="submit"]');
            $btn.prop('disabled', true);

            const formData = $(this).serialize();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('blog.comment') }}",
                method: "POST",
                data: formData,
                success: function (response) {
                    showMessage(response.message, 'success');
                    $('#commentForm')[0].reset();

                    for (let instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].setData('');
                    }
                    $btn.prop('disabled', false);
                },
                error: function (xhr) {
                    $btn.prop('disabled', false);

                    console.log('Erro status:', xhr.status);
                    console.log('Erro response:', xhr.responseText);

                    if (xhr.status === 401) {
                        showMessage(xhr.responseJSON?.message || 'É necessário estar logado para enviar um comentário.', 'warning');

                        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                        loginModal.show();
                    } else if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        for (let field in errors) {
                            errorMessages += `<div>${errors[field][0]}</div>`;
                        }
                        showMessage(errorMessages, 'danger');
                    } else {
                        showMessage('Erro inesperado. Por favor, tente novamente.', 'danger');
                    }
                }
            });
        });
    </script>

    <style>
        #cke_notifications_area_message {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            z-index: -1 !important;
            height: 0 !important;
            overflow: hidden !important;
        }
            .cke_notifications_area {
            display: none !important;
        }

    </style>
@endsection