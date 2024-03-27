<!DOCTYPE html>
<html lang="en">
<head>
	<title>Social - Network, Community and Event Theme</title>

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

  <!-- Container START -->

    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card card-body">
              <!-- Card header START -->
                <div class="card-header border-0 pb-0">
                  <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex align-items-center">
                          <!-- Avatar -->
                          <div class="avatar avatar-story me-2">
                              <a href="{{route('home.users.show' , $post->user->id)}}"> <img class="avatar-img rounded-circle"  @if($post->user->photo != null)  src="{{asset($post->user->photo->path)}}"  @else src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" @endif ></a>
                          </div>
                          <!-- Info -->
                          <div>
                              <div class="nav nav-divider">
                                  <h6 class="nav-item card-title mb-0"> <a href="{{route('home.users.show' , $post->user->id)}}">{{$post->user->name}}</a></h6>
                                  <span class="nav-item small"> {{ $post->created_at->diffForHumans() }}</span>
                              </div>
                              <p class="mb-0 small">Web Developer at Webestica</p>
                          </div>
                      </div>
                      <!-- Card feed action dropdown START -->
                      <div class="dropdown">
                          <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots"></i>
                          </a>
                          <!-- Card feed action dropdown menu -->
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                                @if(Auth::user()->id != $post->user->id)
                                    <li>
                                        <form action="{{route('home.follows.destroy' , $post->user)}}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit">
                                                <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow {{$post->user->name}} 
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block
                                        </a>
                                    </li>
                                @endif

                                @if(Auth::user()->id == $post->user->id)
                                    <li>
                                        <form action="{{route('home.posts.destroy' , $post)}}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit">
                                                <i class="bi bi-x-circle fa-fw pe-2"></i>Delete post
                                            </button>
                                        </form>
                                    </li>
                                @endif
                                @if(Auth::user()->id != $post->user->id)
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a>
                                    </li>
                                @endif
                          </ul>
                      </div>
                      <!-- Card feed action dropdown END -->
                  </div>
              </div>
              <!-- Card header END -->

              <!-- Card body START --- the post content -->
              <div class="card-body">
                  <p>{{$post->text}}</p>
                  <!-- Card img -->

                  @if($post->file->count() == 1)
                      @if($post->file[0]->file_type == 'images')
                          <a class="" href="{{asset($post->file[0]->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                              <img class="card-img" src="{{asset($post->file[0]->file_path)}}" alt="Post">
                          </a>

                      @elseif($post->file[0]->file_type == 'videos')

                          <div class="overflow-hidden fullscreen-video w-100">
                              <div class="player-wrapper overflow-hidden">
                                  <video class="player-html" controls crossorigin="anonymous"
                                      {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                  >
                                      <source src="{{asset($post->file[0]->file_path)}}" type="video/mp4">
                                  </video>
                              </div>
                          </div>

                      @elseif($post->file[0]->file_type == 'files')
                          <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                              <p class="mb-0">{{$post->user->name}}.file.{{$post->file[0]->prefix}}</p>
                              <a class="btn btn-primary-soft btn-sm" href="{{asset($post->file[0]->file_path)}}" download> Download now </a>
                          </div>
                      @elseif($post->file[0]->file_type == 'voice')
                          <audio controls class="w-100">
                              <source src="{{asset($post->file[0]->file_path)}}" type="audio/ogg">
                              <source src="{{asset($post->file[0]->file_path)}}" type="audio/mp3">
                              <source src="{{asset($post->file[0]->file_path)}}" type="audio/mpeg">
                              Your browser does not support the audio element.
                          </audio>
                      @endif
                  @else
                      @if($post->file->where('file_type','images')->count() + $post->file->where('file_type','videos')->count() > 0)
                          @switch($post->file->where('file_type','images')->count() + $post->file->where('file_type','videos')->count())
                              @case(1)
                                  @if($post->file->where('file_type','images')->count() == 1)
                                      <a class="" href="{{asset($post->file[0]->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                          <img class="card-img" src="{{asset($post->file[0]->file_path)}}" alt="Post">
                                      </a>

                                  @else
                                      <div class="overflow-hidden fullscreen-video w-100">
                                          <div class="player-wrapper overflow-hidden">
                                              <video class="player-html" controls crossorigin="anonymous"
                                                  {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                              >
                                                  <source src="{{asset($post->file[0]->file_path)}}" type="video/mp4">
                                              </video>
                                          </div>
                                      </div>
                                  @endif
                                  @break

                              @case(2)
                                  <div class="d-flex justify-content-between">
                                      <div class="row g-3">
                                          @foreach($post->file as $files)
                                              @if($files->file_type == 'images')
                                                  <div class="col-6">
                                                      <!-- Grid img -->
                                                      <a class="" href="{{asset($files->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                                          <img class="rounded img-fluid" src="{{asset($files->file_path)}}" alt="Image">
                                                      </a>
                                                  </div>
                                              @elseif($files->file_type == 'videos')
                                                  <div class="col-6">
                                                      <!-- Grid video -->
                                                      <a class="" href="{{asset($files->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
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
                                          @foreach($post->file as $key => $file)
                                              @if($loop->first)
                                                  @if($file->file_type == 'images')
                                                      <div class="col-6">
                                                          <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}" >
                                                              <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                          </a>

                                                      </div>
                                                  @elseif($file->file_type == 'videos')
                                                      <div class="col-6">
                                                          <!-- Grid video -->
                                                          <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
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
                                              @elseif($key < count($post->file) - 1)
                                                  @if($file->file_type == 'images')
                                                      <div class="col-6" style="display: none">
                                                          <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}" >
                                                              <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                          </a>
                                                      </div>
                                                  @elseif($file->file_type == 'videos')
                                                      <div class="col-6" style="display: none">
                                                          <!-- Grid video -->
                                                          <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
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
                                                                  <a class="btn btn-link text-white" href="#"> View all </a>
                                                              </div>
                                                              <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                                                  <img class="img-fluid opacity-50 rounded" src="{{asset($file->file_path)}}" alt="Image">
                                                              </a>
                                                          </div>
                                                      @elseif($file->file_type == 'videos')
                                                          <div class="position-relative bg-dark  rounded">
                                                              <div class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
                                                                  <a class="btn btn-link text-white" href="#"> View all </a>
                                                              </div>
                                                              <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
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
                      @forelse($post->file->where('file_type','voice') as $voice)
                          <audio controls class="w-100">
                              <source src="{{asset($voice->file_path)}}" type="audio/ogg">
                              <source src="{{asset($voice->file_path)}}" type="audio/mp3">
                              <source src="{{asset($voice->file_path)}}" type="audio/mpeg">
                              Your browser does not support the audio element.
                          </audio>
                      @empty
                      @endforelse
                      @forelse($post->file->where('file_type','files') as $file)
                          <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                              <p class="mb-0">{{$post->user->name}}.file.{{$file->prefix}}</p>
                              <a class="btn btn-primary-soft btn-sm" href="{{asset($file->file_path)}}" download> Download now </a>
                          </div>
                      @empty
                      @endforelse
                  @endif

                  <!-- Feed react START -->
                  <ul class="nav nav-stack py-3 small">
                      <li class="nav-item">
                          @livewire('like-live' , ['post' => $post])
                      </li>

                      <!-- Card share action START -->
                      <li class="nav-item dropdown ms-sm-auto">
                        @if($post->user_id != Auth::user()->id)
                            @livewire('sharelive', ['post' => $post])
                        @endif
                      </li>
                      <!-- Card share action END -->
                  </ul>
                  <!-- Feed react END -->

                  <!-- Add comment -->
                  @livewire('comment-live', ['post' => $post])

                  
                  {{-- <div class="d-flex mb-3">
                      <!-- Avatar -->
                      <div class="avatar avatar-xs me-2">
                          <a href="#!"> <img class="avatar-img rounded-circle"
                                             @if(Auth::user()->pphoto_id != null)
                                                 src="{{asset(Auth::user()->photo->path)}}"
                                             @else
                                                 src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                  @endif > </a>
                      </div>
                      <!-- Comment box  -->
                      <form class="nav nav-item w-100 position-relative">
                          <textarea data-autoresize class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."></textarea>
                          <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0" type="submit">
                              <i class="bi bi-send-fill"> </i>
                          </button>
                      </form>
                  </div> --}}

                  <!-- Comment wrap START -->
                  {{-- <ul class="comment-wrap list-unstyled">
                      @foreach($post->comment as $comment)
                          <li class="comment-item">
                              <div class="d-flex">
                                  <!-- Avatar -->
                                  <div class="avatar avatar-xs">
                                      <a href="{{route('home.users.show' , $comment->user)}}"><img class="avatar-img rounded-circle"
                                                                                                   @if($comment->user->photo != null)
                                                                                                       src="{{asset($comment->user->photo->path)}}"
                                                                                                   @else
                                                                                                       src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                              @endif
                                          ></a>
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
                                              <a class="nav-link" href="#!"> Like (1)</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </li>
                      @endforeach
                 </ul> --}}
                  <!-- Comment wrap END -->
              </div>
              <!-- Card body END -->
          </div>
      </div>
    </div>
   </div>
  <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}"></script>

</body>
</html>
