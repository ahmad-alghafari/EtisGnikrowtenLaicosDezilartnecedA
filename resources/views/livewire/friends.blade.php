<div class="card-body position-relative pt-0">
    <div class="row g-3">
        @forelse($friends as $user)
        <div class="col-6">
            <!-- Friends item START -->
            <div class="card shadow-none text-center h-100">
                <!-- Card body -->
                <div class="card-body p-2 pb-0">
                    <div class="avatar avatar-story avatar-xl">
                        <a href="{{route('home.users.show' , $user->mind)}}"><img class="avatar-img rounded-circle" 
                            @if($user->mind->photo != null)
                            src="{{asset($user->mind->photo->path)}}"
                            @else
                            src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                            @endif 
                        ></a>
                    </div>
                    <h6 class="card-title mb-1 mt-3"> <a href="{{route('home.users.show' , $user->mind)}}">{{$user->mind->name}}</a></h6>
                    <p class="mb-0 small lh-sm">
                        {{-- 16 mutual connections --}}
                    </p>
                </div>
                <!-- Card footer -->
                <div class="card-footer p-2 border-0">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                    <button wire:click="unfollow({{$user->mind}})" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Unfollow"> <i class="bi bi-person-x"></i> </button>
                </div>
            </div>
            <!-- Friends item END -->
        </div>
        @empty
        @endforelse
    </div>
</div>