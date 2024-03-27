<main class="pt-5">
    <!-- Page header START -->
    <div class="py-5" style="background-image:url({{asset("import/assets/images/bg/06.jpg")}}); background-position: center center; background-size: cover; background-repeat: no-repeat;">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-6 text-center">
                    <!-- Title -->
                    <h1 class="text-white">Change your social presence.</h1>
                    <p class="mb-4 text-white">For those worth looking for.</p>
                    <!-- Search form START -->
                    <form class="rounded position-relative">
                        <input wire:model.live="search" class="form-control form-control-lg ps-5" type="search" placeholder="Search..." aria-label="Search">
                        <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type=""><i class="bi bi-search fs-5 ps-1"> </i></button>
                    </form>
                    <!-- Search form END -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page header END -->
    <!-- Container START -->
    <div class="py-5">
        <div class="container">

            <div class="row g-4">
                <div class="col-12">
                    <!-- Tab nav line START -->
                    <ul class="nav nav-tabs nav-tabs-white justify-content-center border-0">
                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tab-1"> Accounts </a> </li>
                        <li class="nav-item"> <a class="nav-link " data-bs-toggle="tab" href="#tab-2"> Posts </a> </li>

                    </ul>
                    <!-- Tab nav line START -->
                </div>
            </div>

            <div class="tab-content mb-0 pb-0">
                <!-- Accounts tab START -->
                <div class="tab-pane fade show active" id="tab-1">
                    <div class="row g-4">
                        <!-- Main content START -->
                        <div class="col">
                            <div class="container-sm">
                                <table class="table mx-5 ">
                                    @foreach($users as $user)
                                        <tr class="mx-3">
                                            <!-- Avatar -->
                                            <td>
                                                <div class="avatar avatar-xl">
                                                    <a href="{{route('home.users.show' ,$user)}}">
                                                        @if($user->photo != null)
                                                            <img class="avatar-img rounded-circle" src="{{asset($user->photo->path)}}" alt="user">
                                                        @else
                                                            <div class="avatar-img rounded-circle bg-primary"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">{{ substr($user->name, 0, 2) }}</span></div>
                                                        @endif
                                                    </a>
                                                </div>
                                            </td>
                                            <!-- Info -->
                                            <td class="text-center">
                                                <a class="h6  text-wrap fs-2" href="{{route('home.users.show' ,$user)}}">{{$user->name}}</a>
                                            </td>
                                            <td>
                                                <button wire:click="toggleFollow({{$user}})"
                                                        @if(Auth::user()->follow()->where('user_follower',$user->id)->exists())
                                                            class="btn btn-secondary me-2"
                                                        @else
                                                            class="btn btn-primary-soft me-2"
                                                        @endif
                                                        type="button" href="#!">
                                                    @if(Auth::user()->follow()->where('user_follower',$user->id)->exists())
                                                        Following
                                                    @else
                                                        Follow
                                                    @endif
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <!-- Main content END -->
                    </div> <!-- Row END -->
                </div>
                <!-- Accounts tab END -->

                <!-- Posts tab START -->
                <div class="tab-pane fade  " id="tab-2">
                    <div class="row g-4">
                        <!-- Main content START -->
                        @foreach($posts as $post)
                            @if($post->file->contains('file_type' ,'images') || $post->file->contains('file_type' ,'videos') || $post->file->contains('file_type' ,'voice'))
                                @if($post->file->whereIn('file_type', ['images' ,'videos'])->count() >= 1)
                                    <div class="col-sm-6 col-lg-4">
                                        <!-- Card feed item START -->
                                        <div class="card h-100">
                                            @if($post->file[0]->file_type == 'images')
                                                <a href="{{route('home.posts.show' , $post)}}">
                                                    <img class="card-img-top" src="{{asset($post->file[0]->file_path)}}" alt="Post">
                                                </a>
                                            @elseif($post->file[0]->file_type == 'videos')
                                                <a href="{{route('home.posts.show' , $post)}}">
                                                    <video class="player-html" controls crossorigin="anonymous">
                                                        <source src="{{asset($post->file[0]->file_path)}}" type="video/mp4">
                                                    </video>
                                                </a>
                                            @endif
                                            <!-- Card body START -->
                                            <div class="card-body">
                                                <!-- Info -->
                                                <a class="text-body" href="{{route('home.posts.show' , $post)}}" >{{$post->text}}</a>
                                                <!-- Feed react START -->
                                                <ul class="nav nav-stack flex-wrap small mt-3">
                                                    <li class="nav-item">
                                                        <i class="bi bi-hand-thumbs-up-fill pe-1"></i>{{$post->like->count()}}
                                                    </li>
                                                    <li class="nav-item">
                                                        <i class="bi bi-chat-fill pe-1"></i>{{$post->comment->count()}}
                                                    </li>
                                                    <!-- Card share action START -->
                                                    <li class="nav-item dropdown ms-sm-auto">
                                                        <a class="nav-link mb-0" href="#" id="cardShareAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>2
                                                        </a>
                                                        <!-- Card share action dropdown menu -->
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction2">
                                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- Card share action END -->
                                                </ul>
                                                <!-- Feed react END -->
                                            </div>
                                            <!-- Card body END -->
                                        </div>
                                        <!-- Card feed item END -->
                                    </div>
                                @elseif($post->file[0]->file_type == 'voice')
                                    <div class="col-sm-6 col-lg-4">
                                        <!-- Card feed item START -->
                                        <a href="{{route('home.posts.show' , $post)}}">
                                            <div class="card h-100">
                                                <!-- Card header END -->
                                                <img class="card-img-top" src="{{asset("import/assets/images/music2.jpg")}}" alt="Music">

                                                <!-- Card body START -->
                                                <div class="card-body">
                                                    <!-- Info -->
                                                    <a class="text-body" href="{{route('home.posts.show' ,$post)}}" >{{$post->text}}</a>
                                                    <!-- Feed react START -->
                                                    <ul class="nav nav-stack flex-wrap small mt-3">
                                                        <li class="nav-item">
                                                            <i class="bi bi-hand-thumbs-up-fill pe-1"></i>{{$post->like->count()}}
                                                        </li>
                                                        <li class="nav-item">
                                                            <i class="bi bi-chat-fill pe-1"></i>{{$post->comment->count()}}
                                                        </li>
                                                        <!-- Card share action START -->
                                                        <li class="nav-item dropdown ms-sm-auto">
                                                            <a class="nav-link mb-0" href="#" id="cardShareAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bi bi-reply-fill flip-horizontal ps-1"></i>2
                                                            </a>
                                                            <!-- Card share action dropdown menu -->
                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction2">
                                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                                                <li><hr class="dropdown-divider"></li>
                                                                <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                                                            </ul>
                                                        </li>
                                                        <!-- Card share action END -->
                                                    </ul>
                                                    <!-- Feed react END -->
                                                </div>
                                                <!-- Card body END -->
                                            </div>
                                        </a>
                                        <!-- Card feed item END -->
                                    </div>
                                @endif
                            @elseif($post->file->isEmpty())
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Card feed item START -->
                                    <div class="card ">
                                        <!-- Card body START -->
                                        <div class="card-body">
                                            <!-- Info -->
                                            <a class="text-body" href="{{route('home.posts.show' ,$post)}}" >{{$post->text}}</a>
                                            <!-- Feed react START -->
                                            <ul class="nav nav-stack flex-wrap small mt-3">
                                                <li class="nav-item">
                                                    <i class="bi bi-hand-thumbs-up-fill pe-1"></i>{{$post->like->count()}}
                                                </li>
                                                <li class="nav-item">
                                                    <i class="bi bi-chat-fill pe-1"></i>{{$post->comment->count()}}
                                                </li>
                                                <!-- Card share action START -->
                                                <li class="nav-item dropdown ms-sm-auto">
                                                    <a class="nav-link mb-0" href="#" id="cardShareAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-reply-fill flip-horizontal ps-1"></i>2
                                                    </a>
                                                    <!-- Card share action dropdown menu -->
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction2">
                                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                                                    </ul>
                                                </li>
                                                <!-- Card share action END -->
                                            </ul>
                                            <!-- Feed react END -->
                                        </div>
                                        <!-- Card body END -->
                                    </div>
                                    <!-- Card feed item END -->
                                </div>
                            @endif

                        @endforeach
                        <!-- Main content END -->
                    </div> <!-- Row END -->
                </div>
                <!-- Posts tab END -->
            </div>
        </div>
    </div>
    <!-- Container END -->
</main>
