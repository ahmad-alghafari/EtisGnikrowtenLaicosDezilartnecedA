<div class="card-body">
    <!-- Users who to follow item START -->
    @foreach($users as $user)
        <div class="hstack gap-2 mb-3">
            <!-- Avatar -->
            <div class="avatar">
                <a href="{{route('home.users.show' , $user)}}"><img class="avatar-img rounded-circle"
                                  @if($user->photo != null)
                                      src="{{asset($user->photo->path)}}"
                                  @else
                                      src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                  @endif
                    ></a>
            </div>
            <!-- Title -->
            <div class="overflow-hidden">
                <a class="h6 mb-0" href="{{route('home.users.show' , $user)}}">{{$user->name}} </a>
                @if($user->info != null && $user->info->job != null)
                <p class="mb-0 small text-truncate">{{substr($user->info->job , 0, 10)}}</p>
                @endif
            </div>
            <!-- Button -->
            <button wire:click="toggleFollow({{$user}})" class="btn btn-primary-soft rounded-circle icon-md ms-auto"><i class="fa-solid fa-plus"> </i></button>
            
        </div>
    @endforeach
    <!-- Users who to follow item END -->

    <!-- new Users item START -->
    @forelse($newUsers as $user)
        <div class="hstack gap-2 mb-3">
            <!-- Avatar -->
            <div class="avatar">
                <a href="{{route('home.users.show' , $user)}}"><img class="avatar-img rounded-circle"
                                  @if($user->photo != null)
                                      src="{{asset($user->photo->path)}}"
                                  @else
                                      src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                  @endif
                    ></a>
            </div>
            <!-- Title -->
            <div class="overflow-hidden">
                <a class="h6 mb-0" href="{{route('home.users.show' , $user)}}">{{$user->name}} </a>
                @if($user->info != null && $user->info->job != null)
                <p class="mb-0 small text-truncate">{{substr($user->info->job , 0, 10)}}</p>
                @endif
            </div>
            <!-- Button -->
            <button wire:click="toggleFollow({{$user}})" class="btn btn-primary-soft rounded-circle icon-md ms-auto"><i class="fa-solid fa-plus"> </i></button>
            
        </div>
    @empty
    @endforelse
    <!-- new Users item End -->


    <!-- View more button -->
    <div class="d-grid mt-3">
        <a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
    </div>
</div>
