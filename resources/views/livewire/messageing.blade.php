<div class="row gx-0">
    <!-- Sidebar START -->
    <div class="col-lg-4 col-xxl-3" id="chatTabs" role="tablist">
        <!-- Divider -->
        <div class="d-flex align-items-center mb-4 d-lg-none">
            <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                <span class="h6 mb-0 fw-bold d-lg-none ms-2">Chats</span>
            </button>
        </div>
        <!-- Advanced filter responsive toggler END -->
        <div class="card card-body border-end-0 border-bottom-0 rounded-bottom-0">
            <div class=" d-flex justify-content-between align-items-center">
                <h1 class="h5 mb-0">Active chats <span class="badge bg-success bg-opacity-10 text-success">6</span></h1>
                <!-- Chat new create message item START -->
                <div class="dropend position-relative">
                    <div class="nav">
                        <a class="icon-md rounded-circle btn btn-sm btn-primary-soft nav-link toast-btn" data-target="chatToast" href="#" > <i class="bi bi-pencil-square"></i> </a>
                    </div>
                </div>
                <!-- Chat new create message item END -->
            </div>
        </div>
        <nav class="navbar navbar-light navbar-expand-lg mx-0">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
            <!-- Offcanvas header -->
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas"></button>
            </div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body p-0">
            <div class="card card-chat-list rounded-end-lg-0 card-body border-end-lg-0 rounded-top-0">
              
            <!-- Search chat START -->
            <form class="position-relative">
                <input wire:model.live="search"  class="form-control py-2" type="search" placeholder="Search for chats" aria-label="Search">
                <button class="btn bg-transparent text-secondary px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit">
                    <i class="bi bi-search fs-5"></i>
                </button>
            </form>
            <!-- Search chat END -->
            <!-- Chat list tab START -->
              <div class="mt-4 h-100">
                <div class="chat-tab-list custom-scrollbar">
                  <ul class="nav flex-column nav-pills nav-pills-soft">
                    @foreach($users as $user)
                        <li class="nav-link active text-start" data-bs-dismiss="offcanvas" wire:click="Receiver({{$user->id}})">
                            <!-- Chat user tab item -->
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar avatar-story me-2 status-online">
                                        <img class="avatar-img rounded-circle" 
                                        @if($user->photo != null)
                                        src="{{asset($user->photo->path)}}"
                                        @else
                                        src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                        >
                                        @endif
                                    </div>
                                    <div class="flex-grow-1 d-block">
                                        <h6 class="mb-0 mt-1">{{$user->name}}</h6>
                                        <div class="small text-secondary">{{$user->email}}</div>
                                    </div>
                                </div>
                        </li>
                        {{-- <button wire:click="Receiver({{$user->id}})" class="nav-link active text-start"  type="button" href="#!">
                            chating
                        </button> --}}

                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- Chat list tab END -->
            </div>
          </div>
        </div>
      </nav>
    </div>
    <!-- Sidebar START -->

    <!-- Chat conversation START -->
    {{-- @if(! empty($this->reciver_id ))
      @endif --}}
      
  @if($this->reciver != null)
    
    <div class="col-lg-8 col-xxl-9">
      <div class="card card-chat rounded-start-lg-0 border-start-lg-0">
        <div class="card-body h-100">
          <div class="tab-content py-0 mb-0 h-100" id="chatTabsContent">
            <!-- Conversation item START -->
            <div class="fade tab-pane show active h-100" id="chat-1" role="tabpanel" aria-labelledby="chat-1-tab">
              <!-- Top avatar and status START -->
              <div class="d-sm-flex justify-content-between align-items-center">
                <div class="d-flex mb-2 mb-sm-0">
                  <div class="flex-shrink-0 avatar me-2">
                    <img class="avatar-img rounded-circle" 
                    @if($this->reciver->photo != null)
                    src="{{asset($this->reciver->photo->path)}}">
                    @else
                    src="{{asset('import/assets/images/avatar/placeholder.jpg')}}">
                    @endif
                  </div>
                  <div class="d-block flex-grow-1">
                    <h6 class="mb-0 mt-1">{{$this->reciver->name}}</h6>
                    <div 
                      class="small text-secondary">
                      @if($this->reciver->status == 1)
                      <i class="fa-solid fa-circle text-success me-1"></i>Online
                      @else
                      <i class="fa-solid fa-circle text-secondary me-1"></i>Ofline
                      @endif
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <!-- Call button -->
                  {{-- <a href="#!" class="icon-md rounded-circle btn btn-primary-soft me-2 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Audio call"><i class="bi bi-telephone-fill"></i></a> --}}
                  {{-- <a href="#!" class="icon-md rounded-circle btn btn-primary-soft me-2 px-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Video call"><i class="bi bi-camera-video-fill"></i></a> --}}
                  <!-- Card action START -->
                  <div class="dropdown">
                    <a class="icon-md rounded-circle btn btn-primary-soft me-2 px-2" href="#" id="chatcoversationDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>               
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-check-lg me-2 fw-icon"></i>Mark as read</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-mic-mute me-2 fw-icon"></i>Mute conversation</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-person-check me-2 fw-icon"></i>View profile</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete chat</a></li>
                      <li class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive chat</a></li>
                    </ul>
                  </div>
                  <!-- Card action END -->
                </div>
              </div>
              <!-- Top avatar and status END -->

              <hr>


              <!-- Chat conversation START -->
              <div class="chat-conversation-content " id="chatControl">
                @forelse ($this->message as $m)
                    @if($m->from_id == $this->me->id)
                      <div class="d-flex justify-content-end text-end mb-1">
                        <div class="w-100">
                          <div class="d-flex flex-column align-items-end">
                            <div class="bg-primary text-white p-2 px-3 rounded-2">{{$m->body}}
                              <!-- Images -->
                              <div class="d-flex my-2">
                                {{-- <div class="small text-secondary">{{$m->created_at}}</div> --}}
                                <div class="small text-secondary">{{ \Carbon\Carbon::parse($m->created_at)->format('h:i A') }}</div>

                                <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @else
                      <div class="d-flex mb-1">
                        <div class="flex-shrink-0 avatar avatar-xs me-2">
                          <img class="avatar-img rounded-circle" 
                            @if($this->reciver->photo != null)
                            src="{{asset($this->reciver->photo->path)}}">
                            @else
                            src="{{asset('import/assets/images/avatar/placeholder.jpg')}}">
                            @endif
                        </div>
                        <div class="flex-grow-1">
                          <div class="w-100">
                            <div class="d-flex flex-column align-items-start">
                              <div class="bg-light text-secondary p-2 px-3 rounded-2">{{$m->body}}
                                <div class="small my-2">{{ \Carbon\Carbon::parse($m->created_at)->format('h:i A') }}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif
                @empty
                    
                @endforelse
                <!-- Chat message left text-->
                {{-- <div class="d-flex mb-1">
                  <div class="flex-shrink-0 avatar avatar-xs me-2">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="">
                  </div>
                  <div class="flex-grow-1">
                    <div class="w-100">
                      <div class="d-flex flex-column align-items-start">
                        <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity yet attempted happiness Gay prosperous impression😮</div>
                        <div class="small my-2">3:22 PM</div>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <!-- Chat message left image-->
                {{-- <div class="d-flex mb-1">
                  <div class="flex-shrink-0 avatar avatar-xs me-2">
                    <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/10.jpg')}}" alt="">
                  </div>
                  <div class="flex-grow-1">
                    <div class="w-100">
                      <div class="d-flex flex-column align-items-start">
                        <div class="bg-light text-secondary p-2 px-3 rounded-2">
                          <p class="small mb-0">Congratulations:)</p>
                          <div class="card shadow-none p-2 border border-2 rounded mt-2">
                            <img src="{{asset('import/assets/images/elements/14.svg')}}" alt="">
                          </div>
                        </div>
                        <div class="small my-2">3:22 PM</div>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <!-- Chat message right text-->
                {{-- <div class="d-flex justify-content-end text-end mb-1">
                  <div class="w-100">
                    <div class="d-flex flex-column align-items-end">
                      <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view but over man Solskdfmlsdfnlksdflksdflksdfnlksdfnlksdnflskdnflkklklkl lksdnfklnsdflknsdklfnslkdfnslkdfnslkfdn at within mr to simple assure Mr disposing.</div>
                      <!-- Images -->
                      <div class="d-flex my-2">
                        <div class="small text-secondary">5:35 PM</div>
                        <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <!-- Chat message right image -->
                {{-- <div class="d-flex justify-content-end text-end mb-1">
                  <div class="w-100">
                    <div class="d-flex flex-column align-items-end">
                      <img class="rounded h-200px" src="{{asset("import/assets/images/avatar/05.jpg")}}" alt="">
                      <div class="small my-2">5:36 PM</div>
                    </div>
                  </div>
                </div> --}}


              </div> 
            </div>
          </div>
        </div>
        <div class="card-footer">
            <form wire:submit.prevent="sendMessage" class="d-sm-flex align-items-end">
              <textarea id="message" wire:model="messageToSend" class="form-control mb-sm-0 mb-3" data-autoresize placeholder="Type a message" rows="1"></textarea>
              <button class="btn btn-sm btn-danger-soft ms-sm-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
              <button class="btn btn-sm btn-secondary-soft ms-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
              <button id="send" class="btn btn-sm btn-primary ms-2" type="submit"><i class="fa-solid fa-paper-plane fs-6"></i></button>
            </form>
        </div>
      </div>
    </div>
    {{-- <script>
      // function scrollChatToBottom() {
      //   var chatControl = $("#chatControl");
      //   chatControl.scrollTop(chatControl.prop("scrollHeight"));
      // }
      // scrollChatToBottom();
      // function getCurrentTime() {
      //     const currentDate = new Date();
      //     let hours = currentDate.getHours();
      //     let minutes = currentDate.getMinutes();
      //     // Add leading zero if minutes is less than 10
      //     minutes = minutes < 10 ? '0' + minutes : minutes;
      //     const currentTimeString = hours + ':' + minutes;
      //     return currentTimeString;
      // }
      Pusher.logToConsole = true;
      var pusher = new Pusher('2d71b511dc2458847016', {
        cluster: 'ap2'
      });
      var channel = pusher.subscribe('chat');
        channel.bind('chatMessage', function(data) {
          alert(JSON.stringify(data));
      });
    </script> --}}
  @endif
    <!-- Chat conversation END -->
</div>


