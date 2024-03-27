<div class="card card-body">
    <div class="d-flex mb-3">
        <!-- Avatar -->
        <div class="avatar avatar-xs me-2">
            <a href="{{route('home.users.show' , Auth::user()->id)}}">
                <img class="avatar-img rounded-circle"
                        @if(Auth::user()->photo != null)
                            src="{{asset(Auth::user()->photo->path)}}"
                        @else
                            src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                        @endif>

            </a>
        </div>

        <!-- Form Start -->
        <form class="w-100" action="{{route('home.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <textarea class="form-control pe-4 border-0"  name="text" id="post_text" rows="2" data-autoresize placeholder="Share your thoughts..."></textarea><br>

            <!-- Share feed toolbar START -->
            <ul class="nav nav-pills nav-stack small fw-normal">
                <li class="nav-item">
                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionPhoto"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionVideo"> <i class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link bg-light py-1 px-2 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="bi bi-card-list text-danger pe-2 "></i>File </a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link bg-light py-1 px-2 mb-0" href="#" data-bs-toggle="modal" data-bs-target="#modalCreateVoice"> <i class="bi bi-card-list text-warning pe-2 "></i>Voice </a>
                </li>
                <li class="nav-item">
                    <button type="submit" name="submit" value="Post" class="nav-link bg-light py-1 px-2 mb-0">
                        Post
                    </button>
                </li>
                <li class="nav-item dropdown ms-lg-auto">
                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Create a poll</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a question </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>
                    </ul>
                </li>
            </ul>
            @foreach($errors->all() as $error)
                <div >{{ $error }}</div>
            @endforeach

            <!-- Modals start-->
            <!-- Modal Add photo START -->
            <div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal feed header START -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="feedActionPhotoLabel">Add photo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal feed header END -->

                        <!-- Modal feed body START -->
                        <div class="modal-body">
                            <div class="modal-body text-bg-dark">
                                <input type="file" name="images[]" multiple id="photo" class="form-control " accept="image/*" >
                            </div>
                        </div>
                        <!-- Modal feed body END -->

                        <!-- Modal feed footer -->
                        <div class="modal-footer ">
                            <!-- Button -->
                            <button type="button" class="btn btn-success-soft" data-bs-dismiss="modal">Done</button>
                        </div>
                        <!-- Modal feed footer -->

                    </div>
                </div>
            </div>
            <!-- Modal Add photo END -->

            <!-- Modal Add video START -->
            <div class="modal fade" id="feedActionVideo" tabindex="-1" aria-labelledby="feedActionVideoLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal feed header START -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="feedActionVideoLabel">Add video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal feed header END -->

                        <!-- Modal feed body START -->
                        <div class="modal-body">
                            <!-- Add Feed -->
                            {{--                                                    <div class="d-flex mb-3">--}}
                            {{--                                                        <!-- Avatar -->--}}
                            {{--                                                        <div class="avatar avatar-xs me-2">--}}
                            {{--                                                            <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/03.jpg')}}" alt="">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <!-- Feed box  -->--}}
                            {{--                                                        <form class="w-100">--}}
                            {{--                                                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>--}}
                            {{--                                                        </form>--}}
                            {{--                                                    </div>--}}

                            {{--                                                    <!-- Dropzone photo START -->--}}
                            {{--                                                    <div>--}}
                            {{--                                                        <label class="form-label">Upload attachment</label>--}}
                            {{--                                                        <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>--}}
                            {{--                                                            <div class="dz-message">--}}
                            {{--                                                                <i class="bi bi-camera-reels display-3"></i>--}}
                            {{--                                                                <p>Drag here or click to upload video.</p>--}}
                            {{--                                                            </div>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </div>--}}
                            <!-- Dropzone photo END -->
                            <div class="modal-body text-bg-dark">
                                video : <input type="file" name="videos[]" multiple id="video" class="form-control" accept="video/*">
                            </div>
                        </div>
                        <!-- Modal feed body END -->

                        <!-- Modal feed footer -->
                        <div class="modal-footer">
                            <!-- Button -->
                            {{--                                                    <button type="button" class="btn btn-danger-soft me-2"><i class="bi bi-camera-video-fill pe-1"></i> Live video</button>--}}
                            <button type="button" class="btn btn-success-soft" data-bs-dismiss="modal" >Done</button>
                        </div>
                        <!-- Modal feed footer -->
                    </div>
                </div>
            </div>
            <!-- Modal Add video END -->

            <!-- Modal Add file START -->
            <div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal feed header START -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabelCreateAlbum">Add file</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal feed header END -->


                        <!-- Modal feed body START -->
                        <div class="modal-body">
                            <div class="modal-body text-bg-dark">
                                file : <input type="file" name="files[]" multiple id="file" class="form-control">
                            </div>
                        </div>
                        <!-- Modal feed body END -->


                        <!-- Modal footer -->
                        <!-- Button -->
                        <div class="modal-footer">
                            {{--                                                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>--}}
                            {{--                                                    <button type="button" class="btn btn-success-soft">Create now</button>--}}
                            <button type="button" class="btn btn-success-soft" data-bs-dismiss="modal" >Done</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Add file END -->

            <!-- Modal Add voice START -->
            <div class="modal fade" id="modalCreateVoice" tabindex="-1" aria-labelledby="modalLabelCreateVoice" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal feed header START -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabelCreateVoice">Add voice</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal feed header END -->


                        <!-- Modal feed body START -->
                        <div class="modal-body">
                            <div class="modal-body text-bg-dark">
                                Voice : <input type="file" name="voice[]" multiple id="voice" class="form-control">
                            </div>
                        </div>
                        <!-- Modal feed body END -->


                        <!-- Modal footer -->
                        <!-- Button -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success-soft" data-bs-dismiss="modal" >Done</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Add voice END -->
            <!--  modals end-->

        </form>
        <!-- Form END -->
    </div>
</div>
