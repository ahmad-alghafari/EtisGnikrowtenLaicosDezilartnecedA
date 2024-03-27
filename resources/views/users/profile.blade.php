<!DOCTYPE html>
<html lang="en">
<head>
    <title>Social - Network, Ce</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">


    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if(el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('import/assets/images/favicon.ico')}}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/dropzone/dist/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/glightbox-master/dist/css/glightbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.min.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">

</head>

<body>

<!-- =======================
Header START -->
<header class="navbar-light fixed-top header-static bg-mode">

    <!-- Logo Nav START -->
    @include('layouts.nav')
    <!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
    {{-- <div class="preloader">
        <div class="preloader-item">
            <div class="spinner-grow text-primary"></div>
        </div>
    </div> --}}
    <!-- Container START -->
    <div class="container">
        <div class="row g-4">

            <!-- Main content START -->
            <div class="col-lg-8 vstack gap-4">
                <!-- My profile START -->
                <div class="card">
                    <!-- Cover image -->
                    <div class="h-200px rounded-top" style="background-image:url({{asset('import/assets/images/bg/05.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                    <!-- Card body START -->
                    <div class="card-body py-0">
                        <div class="d-sm-flex align-items-start text-center text-sm-start">
                            <div>
                                <!-- Avatar -->
                                <div class="avatar avatar-xxl mt-n5 mb-3">
                                    <a href="
                                        @if($user->photo != null)
                                            {{asset($user->photo->path)}}
                                        @else
                                            {{asset('import/assets/images/avatar/placeholder.jpg')}}
                                        @endif " data-glightbox="post-gallery" data-gallery="image-popup{{$user->id}}">
                                        <img class="avatar-img rounded-circle border border-white border-3" alt=" "
                                                      @if($user->photo != null)
                                                          src="{{asset($user->photo->path)}}"
                                                      @else
                                                          src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                            @endif>
                                    </a>
                                </div>
                            </div>
                            <div class="ms-sm-4 mt-sm-3">
                                <!-- Info -->
                                <h1 class="mb-0 h5">{{$user->name}}<i class="bi bi-patch-check-fill text-success small"></i></h1>
                                <p>250 connections</p>
                            </div>
                            <!-- Button -->
                            <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                                @if($user->id == Auth::user()->id)
                                    <button class="btn btn-danger-soft me-2" type="button"> <i class="bi bi-pencil-fill pe-1"></i> Edit profile </button>
                                @else
                                    @livewire('follow-live' , ['user' => $user])
                                @endif
                                <div class="dropdown">
                                    <!-- Card share action menu -->
                                    <button class="icon-md btn btn-light" type="button" id="profileAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <!-- Card share action dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction2">
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a></li>
                                        @if($user->id != auth::user()->id)
                                            <li>
                                                <form action="{{route('home.blocks.store')}}" method="POST">
                                                    @csrf
                                                    <input name="id" value="{{$user->id}}" style="display: none" type="text">
                                                    <button type="submit" class="dropdown-item"><i class="bi bi-slash-circle fa-fw pe-2"></i>Block</button>
                                                </form>
                                            </li>
                                        @endif

                                        <li><hr class="dropdown-divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- List profile -->
                        <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                            @if($user->info && $user->info->job != "")
                                <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> {{$user->info->job}}</li>
                            @elseif(Auth::user()->id == $user->id)
                                <li class="list-inline-item"><a href="{{route('home.users.settings' , $user)}}"> <i class="bi bi-briefcase me-1"></i>Click to Add a Job</a></li>
                            @endif
                            @if($user->info && $user->info->address != "")
                                <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> {{$user->info->address}}</li>
                            @elseif(Auth::user()->id == $user->id)
                                <li class="list-inline-item"><a href="{{route('home.users.settings' , $user)}}"><i class="bi bi-geo-alt me-1"></i>Click to Add Location</a></li>
                            @endif
                            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on {{$user->created_at->format('M d, Y')}}</li>
                        </ul>
                    </div>
                    <!-- Card body END -->
                    <div class="card-footer mt-3 pt-2 pb-0">
                        <!-- Nav profile pages -->
                        <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
                            <li class="nav-item"> <a class="nav-link active" href={{route('home.posts.index')}}> Posts </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-about.html"> About </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-connections.html"> Connections <span class="badge bg-success bg-opacity-10 text-success small"> 230</span> </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-media.html"> Media</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-videos.html"> Videos</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-events.html"> Events</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-activity.html"> Activity</a> </li>
                        </ul>
                    </div>
                </div>
                <!-- My profile END -->

                <!-- Share feed START -->
                @if($user->id == Auth::user()->id)
                    @include('layouts.place-posting')
                @endif
                <!-- Share feed END -->

                @foreach($posts as $post)
                    <div class="card">
                        <!-- Card header START -->
                        @if($post->user_id != $post->post->user_id)
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-arrow-clockwise"></i>
                                        <span class="me-1">Reposted by</span>
                                        <div>
                                            <div class="nav nav-divider">
                                                <h6 class="nav-item card-title mb-0"> <a href="{{route('home.users.show' , $post->user_id)}}">{{$post->user->name}}</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endif
                        <div class="card-header border-0 pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-story me-2">
                                         <img class="avatar-img rounded-circle" @if($post->post->user->photo != null) src="{{asset($post->post->user->photo->path)}}" @else src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" @endif >
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <div class="nav nav-divider">
                                            <h6 class="nav-item card-title mb-0"> <a href="#!">{{$post->post->user->name}}</a></h6>
                                            <span class="nav-item small"> {{ $post->post->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="mb-0 small">@if($post->post->user->info != null){{$post->post->user->info->job}}@endif</p>
                                    </div>
                                </div>
                                <!-- Card feed action dropdown START -->
                                <div class="dropdown">
                                    <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                    <!-- Card feed action dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                                        @if(Auth::user()->id == $user->id)<li><form action="{{route('home.posts.destroy' , $post->post)}}" method="POST">@csrf @method('DELETE')<button class="dropdown-item" type="submit"><i class="bi bi-x-circle fa-fw pe-2"></i>Delete post</button></form></li>@endif
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                                        {{-- <li><hr class="dropdown-divider"></li> --}}
                                        @if(Auth::user()->id != $user->id)<li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>@endif
                                    </ul>
                                </div>
                                <!-- Card feed action dropdown END -->
                            </div>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START --- the post content -->
                        <div class="card-body">
                            {{-- <p>{{$post->text}}</p> --}}
                            <h6 class="nav-item card-title mb-0">
                                <a href="{{route('home.posts.show' , $post->post)}}">
                                    <p>{{$post->post->text}}</p>
                                </a>
                            </h6>
                            <!-- Card img-vid-voice-file -->
                            @if($post->post->file->count() == 1)
                                @if($post->post->file[0]->file_type == 'images')

                                    <a class="" href="{{asset($post->post->file[0]->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}">
                                        <img class="card-img" src="{{asset($post->post->file[0]->file_path)}}" alt="Post">
                                    </a>
                                @elseif($post->post->file[0]->file_type == 'videos')

                                        <div class="overflow-hidden fullscreen-video w-100">
                                            <div class="player-wrapper overflow-hidden">
                                                <video class="player-html" controls crossorigin="anonymous"
                                                    {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                >
                                                    <source src="{{asset($post->post->file[0]->file_path)}}" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>

                                @elseif($post->post->file[0]->file_type == 'files')
                                    <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                                        <p class="mb-0">{{$post->post->user->name}}.file.{{$post->post->file[0]->prefix}}</p>
                                        <a class="btn btn-primary-soft btn-sm" href="{{asset($post->post->file[0]->file_path)}}" download> Download now </a>
                                    </div>
                                @elseif($post->post->file[0]->file_type == 'voice')
                                    <audio controls class="w-100">
                                        <source src="{{asset($post->post->file[0]->file_path)}}" type="audio/ogg">
                                        <source src="{{asset($post->post->file[0]->file_path)}}" type="audio/mp3">
                                        <source src="{{asset($post->post->file[0]->file_path)}}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                @endif
                            @else
                                @if($post->post->file->whereIn('file_type',['images' ,'video'])->count() > 0)
                                    @switch($post->post->file->whereIn('file_type',['images' ,'video'])->count())
                                        @case(1)
                                            @if($post->post->file->where('file_type','images')->count() == 1)
                                                <a class="" href="{{asset($post->post->file[0]->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}">
                                                    <img class="card-img" src="{{asset($post->post->file[0]->file_path)}}" alt="Post">
                                                </a>

                                            @else
                                                <div class="overflow-hidden fullscreen-video w-100">
                                                    <div class="player-wrapper overflow-hidden">
                                                        <video class="player-html" controls crossorigin="anonymous"
                                                            {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                        >
                                                            <source src="{{asset($post->post->file[0]->file_path)}}" type="video/mp4">
                                                        </video>
                                                    </div>
                                                </div>
                                            @endif
                                            @break

                                        @case(2)
                                            <div class="d-flex justify-content-between">
                                                <div class="row g-3">
                                                    @foreach($post->post->file as $files)
                                                        @if($files->file_type == 'images')
                                                            <div class="col-6">
                                                                <!-- Grid img -->
                                                                <a class="h-100" href="{{asset($files->file_path)}}" data-glightbox data-gallery="image-popup{{$post->post->id}}">
                                                                    <img class="rounded img-fluid" src="{{asset($files->file_path)}}" alt="Image">
                                                                </a>
                                                            </div>
                                                        @elseif($files->file_type == 'videos')
                                                            <div class="col-6">
                                                                <!-- Grid video -->
                                                                <a class="h-100" href="{{asset($files->file_path)}}" data-glightbox data-gallery="image-popup{{$post->post->id}}">
                                                                    <div class="overflow-hidden fullscreen-video w-100">
                                                                        <div class="player-wrapper overflow-hidden">
                                                                            <video class="player-html" controls crossorigin="anonymous"
                                                                                {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                                            >
                                                                                <source src="{{asset($files->file_path)}}" type="video/mp4">
                                                                            </video>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            @break

                                        @default
                                            <div class="d-flex justify-content-between">
                                                <div class="row g-3">
                                                    @php
                                                    $filteredFiles = $post->post->file->whereIn('file_type', ['images', 'videos']);
                                                    @endphp
                                                    @foreach($filteredFiles as $key => $file)
                                                        @if($loop->first)
                                                            @if($file->file_type == 'images')
                                                                <div class="col-6">
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->post->id}}" >
                                                                        <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                                    </a>

                                                                </div>
                                                            @elseif($file->file_type == 'videos')
                                                                <div class="col-6">
                                                                    <!-- Grid video -->
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->post->id}}">
                                                                        <div class="overflow-hidden fullscreen-video w-100">
                                                                            <div class="player-wrapper overflow-hidden">
                                                                                <video class="player-html" controls crossorigin="anonymous"
                                                                                    {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                                                >
                                                                                    <source src="{{asset($file->file_path)}}" type="video/mp4">
                                                                                </video>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                            @continue
                                                        @elseif($key < count($filteredFiles) - 1)
                                                            @if($file->file_type == 'images')
                                                                <div class="col-6" style="display: none">
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->post->id}}" >
                                                                        <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                                    </a>
                                                                </div>
                                                            @elseif($file->file_type == 'videos')
                                                                <div class="col-6" style="display: none">
                                                                    <!-- Grid video -->
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->post->id}}">
                                                                        <div class="overflow-hidden fullscreen-video w-100">
                                                                            <div class="player-wrapper overflow-hidden">
                                                                                <video class="player-html" controls crossorigin="anonymous"
                                                                                    {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                                                >
                                                                                    <source src="{{asset($file->file_path)}}" type="video/mp4">
                                                                                </video>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                            @continue
                                                        @else
                                                            <div class="col-6">
                                                                @if($file->file_type == 'images')
                                                                    <div class="position-relative bg-dark  rounded">
                                                                        <div class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
                                                                            <a class="btn btn-link text-white" href="#" > View all </a>
                                                                        </div>
                                                                        <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->post->id}}">
                                                                            <img class="img-fluid opacity-50 rounded" src="{{asset($file->file_path)}}" alt="Image">
                                                                        </a>
                                                                    </div>
                                                                @elseif($file->file_type == 'videos')
                                                                    <div class="position-relative bg-dark  rounded">
                                                                        <div class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
                                                                            <a class="btn btn-link text-white" href="#"> View all </a>
                                                                        </div>
                                                                        <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->post->id}}">
                                                                            <div class="overflow-hidden fullscreen-video w-100">
                                                                                <div class="player-wrapper overflow-hidden">
                                                                                    <video class="player-html" controls crossorigin="anonymous"
                                                                                        {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                                                    >
                                                                                        <source src="{{asset($file->file_path)}}" type="video/mp4">
                                                                                    </video>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </div>
                                    @endswitch
                                @endif
                                <br>
                                @forelse($post->post->file->where('file_type','voice') as $voice)
                                    <audio controls class="w-100">
                                        <source src="{{asset($voice->file_path)}}" type="audio/ogg">
                                        <source src="{{asset($voice->file_path)}}" type="audio/mp3">
                                        <source src="{{asset($voice->file_path)}}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                @empty
                                @endforelse
                                @forelse($post->post->file->where('file_type','files') as $file)
                                    <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                                        <p class="mb-0">{{$post->post->user->name}}.file.{{$file->prefix}}</p>
                                        <a class="btn btn-primary-soft btn-sm" href="{{asset($file->file_path)}}" download> Download now </a>
                                    </div>
                                @empty
                                @endforelse
                            @endif

                            <!-- Feed react START -->
                            <ul class="nav nav-stack py-3 small">
                                <li class="nav-item">
                                    @livewire('like-live' , ['post' => $post->post])
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#Modal{{$post->id}}">
                                        <i class="bi bi-chat-fill pe-1"></i>Comments ({{$post->post->comment()->count()}})
                                    </button>
                                    @if($post->post->comment()->count() != 0)
                                    <!-- Modal -->
                                    <div class="modal fade" id="Modal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Comments</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="comment-wrap list-unstyled">
                                                        <!-- Comments item START -->
                                                        @foreach($post->post->comment as $comment)
                                                        <li class="comment-item">
                                                            <div class="d-flex">
                                                                <!-- Avatar -->
                                                                <div class="avatar avatar-xs">
                                                                    <a href="{{route('home.users.show' , $comment->user)}}"><img class="avatar-img rounded-circle" @if($comment->user->photo != null) src="{{asset($comment->user->photo->path)}}"  @else src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" @endif ></a>
                                                                </div>
                                                                <!-- Comment by -->
                                                                <div class="ms-2 " style="width: 100%;">
                                                                    <div class="bg-light p-3 rounded" >
                                                                        <div class="d-flex justify-content-between">
                                                                            <h6 class="mb-1"> <a href="{{route('home.users.show' , $comment->user)}}"> {{$comment->user->name}} </a> </h6>
                                                                            <small class="ms-2">{{$comment->created_at->diffForHumans()}}</small>
                                                                        </div>
                                                                        <div class="card" >
                                                                        <div class="card-body">
                                                                            <p class="mb-0">{{$comment->text}}</p>
                
                                                                            @if($comment->file != null)
                                                                                @switch($comment->file->file_type)
                                                                                    @case('images')
                                                                                        <hr>
                                                                                        <a href="{{asset($comment->file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$comment->id}}">
                                                                                            <img class="card-img" src="{{asset($comment->file->file_path)}}" alt="Image">
                                                                                        </a>
                                                                                        @break
                
                                                                                    @case('videos')
                                                                                        <hr>
                                                                                        <div class="overflow-hidden fullscreen-video w-100">
                                                                                            <div class="player-wrapper overflow-hidden">
                                                                                                <video class="player-html" controls crossorigin="anonymous">
                                                                                                    <source src="{{asset($comment->file->file_path)}}" type="video/mp4">
                                                                                                </video>
                                                                                            </div>
                                                                                        </div>
                                                                                        @break
                                                                                    @case('files')
                                                                                        <hr>
                                                                                        <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                                                                                            <p class="mb-0">{{$comment->user->name}}.file.{{$comment->file->prefix}}</p>
                                                                                            <a class="btn btn-primary-soft btn-sm" href="{{asset($comment->file->file_path)}}" download> Download now </a>
                                                                                        </div>
                                                                                        @break
                                                                                    @case('voice')
                                                                                        <hr>
                                                                                        <audio controls class="w-100">
                                                                                            <source src="{{asset($comment->file->file_path)}}" type="audio/ogg">
                                                                                            <source src="{{asset($comment->file->file_path)}}" type="audio/mp3">
                                                                                            <source src="{{asset($comment->file->file_path)}}" type="audio/mpeg">
                                                                                            Your browser does not support the audio element.
                                                                                        </audio>
                                                                                        @break
                                                                                @endswitch
                                                                            @endif
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Comment react -->
                                                                    <ul class="nav nav-divider pt-2 small">
                                                                        <li class="nav-item">
                                                                            @livewire('like-comment-live' , ['comment' => $comment])
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                        <!-- Comments item END -->
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Modal -->
                                    @endif
                                </li>
                                <!-- Card share action START -->
                                <li class="nav-item dropdown ms-sm-auto">
                                    @if($user->id != Auth::user()->id)
                                    @livewire('sharelive', ['post' => $post->post])
                                    @endif
                                    {{-- <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction">
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                                    </ul> --}}
                                </li>
                                <!-- Card share action END -->
                            </ul>
                            <!-- Feed react END -->

                            <!-- Add wcomment -->
                            @livewire('comment-live', ['post' => $post->post])
 
                            <!-- Comment wrap END -->
                        </div>        
                        <!-- Card body END -->
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const postGallery = GLightbox({
                                selector: '[data-gallery="image-popup{{$post->id}}"]',
                            });
                        });
                    </script>
                @endforeach
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const postGallery = GLightbox({
                            selector: '[data-gallery="image-popup{{$user->id}}"]',
                        });
                    });
                </script>
            </div>
            <!-- Main content END -->

            <!-- Right sidebar START -->
            <div class="col-lg-4">

                <div class="row g-4">

                    <!-- Card START -->
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">About</h5>
                                <!-- Button modal -->
                            </div>

                            <!-- Card body START -->
                            <div class="card-body position-relative pt-0">
                                @if($user->info && $user->info->overview != '')
                                <p>{{$user->info->overview}}</p>
                                @elseif(Auth::user()->id == $user->id)
                                    <ul>
                                        <li class="list-inline-item"><a href="{{route('home.users.settings' , $user)}}"> <i class="bi bi-briefcase me-1"></i>Click to Add an overview</a></li>
                                    </ul>
                                @endif
                                <!-- Date time -->
                                <ul class="list-unstyled mt-3 mb-0">
                                    @if($user->info && $user->info->birth)
                                        <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born: <strong>
                                            {{$user->info->birth}} </strong> </li>
                                    @elseif(Auth::user()->id == $user->id)
                                        <ul>
                                            <li class="list-inline-item"><a href="{{route('home.users.settings' , $user)}}"> <i class="bi bi-briefcase me-1"></i>Click to Add BirthDate</a></li>
                                        </ul>
                                    @endif
                                        @if($user->info && $user->info->community_status)
                                            <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> {{$user->info->community_status}} </strong> </li>
                                        @elseif(Auth::user()->id == $user->id)
                                            <ul>
                                                <li class="list-inline-item"><a href="{{route('home.users.settings' , $user)}}"> <i class="bi bi-briefcase me-1"></i>Click to Add a Status</a></li>
                                            </ul>
                                        @endif

                                    <li> <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong> {{$user->email}} </strong> </li>
                                </ul>
                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card END -->

                    @if(Auth::user()->id == $user->id)
                    <!-- Card START -->
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                                <h5 class="card-title">Friends <span class="badge bg-danger bg-opacity-10 text-danger">{{Auth::user()->follow()->count()}}</span></h5>
                                <a class="btn btn-primary-soft btn-sm" href="#!"> See all friends</a>
                            </div>
                            <!-- Card header END -->
                          
                            <!-- Card body START -->
                            @livewire('friends')
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card END -->
                    @endif
                    
                    <!-- Card START -->
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header d-flex justify-content-between border-0">
                                <h5 class="card-title">Experience</h5>
                                <a class="btn btn-primary-soft btn-sm" href="#!"> <i class="fa-solid fa-plus"></i> </a>
                            </div>
                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body position-relative pt-0">
                                <!-- Experience item START -->
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/logo/08.svg')}}" alt=""> </a>
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <h6 class="card-title mb-0"><a href="#!"> Apple Computer, Inc. </a></h6>
                                        <p class="small">May 2015 – Present Employment Duration 8 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                                    </div>
                                </div>
                                <!-- Experience item END -->

                                <!-- Experience item START -->
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/logo/09.svg')}}" alt=""> </a>
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <h6 class="card-title mb-0"><a href="#!"> Microsoft Corporation </a></h6>
                                        <p class="small">May 2017 – Present Employment Duration 1 yrs 5 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                                    </div>
                                </div>
                                <!-- Experience item END -->

                                <!-- Experience item START -->
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/logo/10.svg')}}" alt=""> </a>
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <h6 class="card-title mb-0"><a href="#!"> Tata Consultancy Services. </a></h6>
                                        <p class="small mb-0">May 2022 – Present Employment Duration 6 yrs 10 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                                    </div>
                                </div>
                                <!-- Experience item END -->

                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card END -->

                    <!-- Card START -->
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header d-sm-flex justify-content-between border-0">
                                <h5 class="card-title">Photos</h5>
                                <a class="btn btn-primary-soft btn-sm" href="#!"> See all photo</a>
                            </div>
                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body position-relative pt-0">
                                <div class="row g-2">
                                    <!-- Photos item -->
                                    <div class="col-6">
                                        <a href="{{asset('import/assets/images/albums/01.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/01.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-6">
                                        <a href="{{asset('import/assets/images/albums/02.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/02.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-4">
                                        <a href="{{asset('import/assets/images/albums/03.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/03.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-4">
                                        <a href="{{asset('import/assets/images/albums/04.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/04.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-4">
                                        <a href="{{asset('import/assets/images/albums/05.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/05.jpg')}}" alt="">
                                        </a>
                                        <!-- glightbox Albums left bar END  -->
                                    </div>
                                </div>
                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card END -->
                </div>
            </div>
            <!-- Right sidebar END -->
        </div> <!-- Row END -->
    </div>
    <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->



<!-- Bootstrap JS -->
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{asset('import/assets/vendor/dropzone/dist/dropzone.js')}}"></script>
<script src="{{asset('import/assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/glightbox-master/dist/js/glightbox.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}"></script>

</body>
</html>
