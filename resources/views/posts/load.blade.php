@foreach($posts as $post)
    <div class="card" >
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
                        <a href="{{route('home.users.show' , $post->post->user_id)}}"> <img class="avatar-img rounded-circle"  @if($post->post->user->photo != null)   src="{{asset($post->post->user->photo->path)}}"  @else src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" @endif ></a>
                    </div>
                    <!-- Info -->
                    <div>
                        <div class="nav nav-divider">
                            <h6 class="nav-item card-title mb-0"> <a href="{{route('home.users.show' , $post->post->user->id)}}">{{$post->post->user->name}}</a></h6>
                            <span class="nav-item small"> {{ $post->post->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mb-0 small">{{$post->post->user->info ? $post->post->user->info->job : ""}}</p>
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
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                    </ul>
                </div>
                <!-- Card feed action dropdown END -->
            </div>
        </div>
        <!-- Card header END -->

        <!-- Card body START --- the post content -->
        <div class="card-body">
            <h6 class="nav-item card-title mb-0">
                <a href="{{route('home.posts.show' , $post->post)}}">
                    <p>{{$post->post->text}}</p>
                </a>
            </h6>

            @if($post->post->file->count() == 1)
                @if($post->post->file[0]->file_type == 'images')
                    <a class="" href="{{asset($post->post->file[0]->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}">
                        <img class="card-img" src="{{asset($post->post->file[0]->file_path)}}" alt="Post">
                    </a>

                @elseif($post->post->file[0]->file_type == 'videos')

                        <div class="overflow-hidden fullscreen-video w-100">
                            <div class="player-wrapper overflow-hidden">
                                <video class="player-html" controls crossorigin="anonymous" >
                                    <source src="{{asset($post->post->file[0]->file_path)}}" type="video/mp4">
                                </video>
                            </div>
                        </div>

                @elseif($post->post->file[0]->file_type == 'files')
                    <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                        <p class="mb-0">{{$post->user->name}}.file.{{$post->post->file[0]->prefix}}</p>
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
                                                <a class="" href="{{asset($files->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}">
                                                    <img class="rounded img-fluid" src="{{asset($files->file_path)}}" alt="Image">
                                                </a>
                                            </div>
                                        @elseif($files->file_type == 'videos')
                                            <div class="col-6">
                                                <!-- Grid video -->
                                                <a class="" href="{{asset($files->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}">
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
                                                        <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}" >
                                                            <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                        </a>

                                                    </div>
                                                @elseif($file->file_type == 'videos')
                                                    <div class="col-6">
                                                        <!-- Grid video -->
                                                        <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}">
                                                            <div class="overflow-hidden fullscreen-video w-100">
                                                                <div class="player-wrapper overflow-hidden">
                                                                    <video class="player-html" controls crossorigin="anonymous">
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
                                                        <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}" >
                                                            <img class="rounded img-fluid" src="{{asset($file->file_path)}}">
                                                        </a>
                                                    </div>
                                                @elseif($file->file_type == 'videos')
                                                    <div class="col-6" style="display: none">
                                                        <!-- Grid video -->
                                                        <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}">
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
                                                            <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}">
                                                                <img class="img-fluid opacity-50 rounded" src="{{asset($file->file_path)}}" alt="Image">
                                                            </a>
                                                        </div>
                                                    @elseif($file->file_type == 'videos')
                                                        <div class="position-relative bg-dark  rounded">
                                                            <div class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
                                                                <a class="btn btn-link text-white" href="#"> View all </a>
                                                            </div>
                                                            <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->post->id}}">
                                                                <div class="overflow-hidden fullscreen-video w-100">
                                                                    <div class="player-wrapper overflow-hidden">
                                                                        <video class="player-html" controls crossorigin="anonymous">
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
                            <p class="mb-0">{{$post->user->name}}.file.{{$file->prefix}}</p>
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
                    <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#Modal{{$post->post->id}}">
                        <i class="bi bi-chat-fill pe-1"></i>Comments 
                        {{-- ({{$post->post->comments_number}}) --}}
                    </button>
                    @if($post->post->comments_number != 0)
                    <!-- Modal -->
                    <div class="modal fade" id="Modal{{$post->post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <a href="{{asset("storage/".$comment->file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$comment->id}}">
                                                                            <img class="card-img" src="{{asset("storage/".$comment->file->file_path)}}" alt="Image">
                                                                        </a>
                                                                        @break

                                                                    @case('videos')
                                                                        <hr>
                                                                        <div class="overflow-hidden fullscreen-video w-100">
                                                                            <div class="player-wrapper overflow-hidden">
                                                                                <video class="player-html" controls crossorigin="anonymous">
                                                                                    <source src="{{asset("storage/".$comment->file->file_path)}}" type="video/mp4">
                                                                                </video>
                                                                            </div>
                                                                        </div>
                                                                        @break
                                                                    @case('files')
                                                                        <hr>
                                                                        <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                                                                            <p class="mb-0">{{$comment->user->name}}.file.{{$comment->file->prefix}}</p>
                                                                            <a class="btn btn-primary-soft btn-sm" href="{{asset("storage/".$comment->file->file_path)}}" download> Download now </a>
                                                                        </div>
                                                                        @break
                                                                    @case('voice')
                                                                        <hr>
                                                                        <audio controls class="w-100">
                                                                            <source src="{{asset("storage/".$comment->file->file_path)}}" type="audio/ogg">
                                                                            <source src="{{asset("storage/".$comment->file->file_path)}}" type="audio/mp3">
                                                                            <source src="{{asset("storage/".$comment->file->file_path)}}" type="audio/mpeg">
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
                    @if($post->post->user_id != Auth::user()->id)
                    @livewire('sharelive', ['post' => $post->post])
                    @endif
                    <!-- Card share action dropdown menu -->
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

           @livewire('comment-live', ['post' => $post->post])
        </div>
        <!-- Card body END -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const postGallery = GLightbox({
                selector: '[data-gallery="image-popup{{$post->post->id}}"]',
            });
        });
    </script>
@endforeach
