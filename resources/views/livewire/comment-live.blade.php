<!-- Add comment -->
<div>
    <script>
        document.getElementById('clicker').addEventListener("click",() => {
        document.getElementById('file_input').click();
    });
    </script>
    <div class="d-flex mb-3">
        <!-- Avatar -->
        <div class="avatar avatar-xs me-2">
            <a href="#!"> <img class="avatar-img rounded-circle" @if(Auth::user()->photo != null) src="{{asset(Auth::user()->photo->path)}}" @else  src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" @endif ></a>
        </div>
        <!-- Comment box  -->
        <form wire:submit="save" class="nav nav-item w-100 position-relative row" >
            <div class="col-md-9">
                <textarea wire:model="text" data-autoresize class="form-control pe-5 bg-light" name="text" rows="1" placeholder="Add a comment..."></textarea>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
                
                <label for="file_input" class="nav-link bg-transparent px-3 border-0" id="clicker">
                    <i class="bi bi-images"></i>
                    
                    <input wire:model="file" type="file" name="file" id="file_input" class="form-control" 
                    style="display: none;">
                </label>

                <button class="nav-link bg-transparent px-3 border-0" type="submit">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
        </form> 
    </div>

<!-- Comment START -->    
    @isset($comment)
        <ul class="comment-wrap list-unstyled">
            <!-- Comment item START -->
            <li class="comment-item">
                <div class="d-flex">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs">
                        <a href="{{route('home.users.show' , $comment->user)}}"><img class="avatar-img rounded-circle" @if($comment->user->photo != null) src="{{asset($comment->user->photo->path)}}" @else src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" @endif  ></a>
                     </div>
                    <!-- Comment by -->
                    <div class="ms-2">
                        <div class="bg-light p-3 rounded">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1"> <a href="#!"> {{$comment->user->name}} </a> </h6>
                                 <small class="ms-2">{{$comment->created_at->diffForHumans()}}</small>
                            </div>
                            <p class="small mb-0">{{$comment->text}}</p>
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
                         <!-- Comment react -->
                        <ul class="nav nav-divider pt-2 small">
                            <li class="nav-item">
                                 {{-- <a class="nav-link" href="#!"> Like (1)</a> --}}
                                 @livewire('like-comment-live' , ['comment' => $comment ])
                           </li>
                        </ul>
                    </div>
                </div>
            </li>
             <!-- Comment item END -->
        </ul>
    @endisset
    <!-- Comment END -->
</div>