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
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/tiny-slider/dist/tiny-slider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/glightbox-master/dist/css/glightbox.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/dropzone/dist/dropzone.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/plyr/plyr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/zuck.js/dist/zuck.min.css')}}">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="{{asset('import/assets/vendor/glightbox-master/dist/js/glightbox.min.js')}}" defer></script>
	<script src="{{asset('import/assets/vendor/glightbox-master/dist/js/glightbox.js')}}" defer></script>
	<livewire:styles />
</head>
<body>
{{--<div class="preloader">--}}
{{--    <div class="preloader-item">--}}
{{--        <div class="spinner-grow text-primary"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- =======================
Header START nav-->
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
		<div class="row g-4">

			<!-- Sidenav START -->
			<div class="col-lg-3">

				<!-- Advanced filter responsive toggler START -->
				<div class="d-flex align-items-center d-lg-none">
					<button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
						<span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
						<span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
					</button>
				</div>
				<!-- Advanced filter responsive toggler END -->

				<!-- Navbar START-->
				<nav class="navbar navbar-expand-lg mx-0">
					<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
						<!-- Offcanvas header -->
						<div class="offcanvas-header">
							<button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>

						<!-- Offcanvas body -->
						<div class="offcanvas-body d-block px-2 px-lg-0">
							<!-- Card START -->
							<div class="card overflow-hidden">
								<!-- Cover image -->
								<div class="h-50px" style="background-image:url({{asset('import/assets/images/bg/01.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
									<!-- Card body START -->
									<div class="card-body pt-0">
										<div class="text-center">
										<!-- Avatar -->
										<div class="avatar avatar-lg mt-n5 mb-3">
											<a href="{{route('home.users.show' , Auth::user()->id )}}"><img class="avatar-img rounded border border-white border-3"
                                                              @if(Auth::user()->photo != null)
                                                              src="{{asset(Auth::user()->photo->path)}}"
                                                              @else
                                                              src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                                              @endif
                                                              alt="your personal photo "></a>
										</div>
										<!-- Info -->
										<h5 class="mb-0"> <a href="{{route('home.users.show' , Auth::user()->id )}}">{{Auth::user()->name}}</a> </h5>
										<small>Web Developer at Webestica</small>
										{{--										<p class="mt-3">I'd love to change the world, but they won’t give me the source code.</p>--}}
                                            <hr>
										<!-- User stat START -->
										<div class="hstack gap-2 gap-xl-3 justify-content-center">
											<!-- User stat item -->
											<div>
												<h6 class="mb-0">{{Auth::user()->info->posts_number}}</h6>
												<small>Posts</small>
											</div>
											<!-- Divider -->
											<div class="vr"></div>
											<!-- User stat item -->
                                            <div>
                                                <h6 class="mb-0">{{Auth::user()->info->follower}}</h6>
                                                <small>Follower</small>
                                            </div>
                                            <!-- Divider -->
                                            <div class="vr"></div>
                                            <!-- User stat item -->
                                            <div>
                                                <h6 class="mb-0">{{Auth::user()->info->following}}</h6>
                                                <small>Following</small>
                                            </div>
										</div>
										<!-- User stat END -->
									</div>

									<!-- Divider -->
									<hr>

									<!-- Side Nav START -->
									<ul class="nav nav-link-secondary flex-column fw-bold gap-2">
										<li class="nav-item">
											<a class="nav-link" href="my-profile.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/home-outline-filled.svg')}}" alt=""><span>Feed </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="my-profile-connections.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/person-outline-filled.svg')}}" alt=""><span>Connections </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="blog.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/earth-outline-filled.svg')}}" alt=""><span>Latest News </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="events.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/calendar-outline-filled.svg')}}" alt=""><span>Events </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="groups.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/chat-outline-filled.svg')}}" alt=""><span>Groups </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="notifications.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/notification-outlined-filled.svg')}}" alt=""><span>Notifications </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="settings.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/cog-outline-filled.svg')}}" alt=""><span>Settings </span></a>
										</li>
									</ul>
									<!-- Side Nav END -->


								</div>
								<!-- Card body END -->
								<!-- Card footer -->
								<div class="card-footer text-center py-2">
									<a class="btn btn-link btn-sm" href={{route('home.users.show' , auth::user()->id)}}>View Profile </a>
								</div>
							</div>
							<!-- Card END -->

							<!-- Helper link START -->
							<ul class="nav small mt-4 justify-content-center lh-1">
								<li class="nav-item">
									<a class="nav-link" href="my-profile-about.html">About</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="settings.html">Settings</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" target="_blank" href="https://support.webestica.com/login">Support </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" target="_blank" href="docs/index.html">Docs </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="help.html">Help</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="privacy-and-terms.html">Privacy & terms</a>
								</li>
							</ul>
							<!-- Helper link END -->
							<!-- Copyright -->
							<p class="small text-center mt-1">©{{date('Y')}} <a class="text-reset" target="_blank" href=""> Webestica </a></p>
						</div>
					</div>
				</nav>
				<!-- Navbar END-->
			</div>
			<!-- Sidenav END -->
			

			<!-- Main content START -->
            <!--warning --- don't delete or change the id of the under div : id="posts-container"-->
			<div class="col-md-8 col-lg-6 vstack gap-4" id="posts-container">
                <!--place of posting start-->
                @include('layouts.place-posting')
				<!-- posting place end -->

                @include('posts.load')
            </div>
			<!-- Main content END -->

			<!-- Right sidebar START -->
			<div class="col-lg-3">
				<div class="row g-4">
					<!-- Card follow START -->
					<div class="col-sm-6 col-lg-12">
						<div class="card">
							<!-- Card header START -->
							<div class="card-header pb-0 border-0">
								<h5 class="card-title mb-0">Who to follow</h5>
							</div>
							<!-- Card header END -->
							<!-- Card body START -->
							@livewire('who-to-follow')
							<!-- Card body END -->
						</div>
					</div>
					<!-- Card follow START -->

					<!-- Card News START -->
					<div class="col-sm-6 col-lg-12">
						<div class="card">
							<!-- Card header START -->
							<div class="card-header pb-0 border-0">
								<h5 class="card-title mb-0">Today’s news</h5>
							</div>
							<!-- Card header END -->
							<!-- Card body START -->
							<div class="card-body">
								<!-- News item -->
								<div class="mb-3">
									<h6 class="mb-0"><a href="blog-details.html">Ten questions you should answer truthfully</a></h6>
									<small>2hr</small>
								</div>
								<!-- News item -->
								<div class="mb-3">
									<h6 class="mb-0"><a href="blog-details.html">Five unbelievable facts about money</a></h6>
									<small>3hr</small>
								</div>
								<!-- News item -->
								<div class="mb-3">
									<h6 class="mb-0"><a href="blog-details.html">Best Pinterest Boards for learning about business</a></h6>
									<small>4hr</small>
								</div>
								<!-- News item -->
								<div class="mb-3">
									<h6 class="mb-0"><a href="blog-details.html">Skills that you can learn from business</a></h6>
									<small>6hr</small>
								</div>
								<!-- Load more comments -->
								<a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
									<div class="spinner-dots me-2">
										<span class="spinner-dot"></span>
										<span class="spinner-dot"></span>
										<span class="spinner-dot"></span>
									</div>
									View all latest news
								</a>
							</div>
							<!-- Card body END -->
						</div>
					</div>
					<!-- Card News END -->
				</div>
			</div>
			<!-- Right sidebar END -->

		</div> <!-- Row END -->
	</div>
	<!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Main Chat START -->
{{-- <div class="d-none d-lg-block">
	<!-- Button -->
	<a class="icon-md btn btn-primary position-fixed end-0 bottom-0 me-5 mb-5" data-bs-toggle="offcanvas" href="#offcanvasChat" role="button" aria-controls="offcanvasChat">
		<i class="bi bi-chat-left-text-fill"></i>
	</a>
	<!-- Chat sidebar START -->
	<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasChat">
		<!-- Offcanvas header -->
		<div class="offcanvas-header d-flex justify-content-between">
			<h5 class="offcanvas-title">Messaging</h5>
			<div class="d-flex">
				<!-- New chat box open button -->
				<a href="#" class="btn btn-secondary-soft-hover py-1 px-2">
					<i class="bi bi-pencil-square"></i>
				</a>
				<!-- Chat action START -->
				<div class="dropdown">
					<a href="#" class="btn btn-secondary-soft-hover py-1 px-2" id="chatAction" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots"></i>
					</a>
					<!-- Chat action menu -->
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatAction">
						<li><a class="dropdown-item" href="#"> <i class="bi bi-check-square fa-fw pe-2"></i>Mark all as read</a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Chat setting </a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-2"></i>Disable notifications</a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-volume-up-fill fa-fw pe-2"></i>Message sounds</a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block setting</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-2"></i>Create a group chat</a></li>
					</ul>
				</div>
				<!-- Chat action END -->

				<!-- Close  -->
				<a href="#" class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="offcanvas" aria-label="Close">
					<i class="fa-solid fa-xmark"></i>
				</a>

			</div>
		</div>
		<!-- Offcanvas body START -->
		<div class="offcanvas-body pt-0 custom-scrollbar">
			<!-- Search contact START -->
			<form class="rounded position-relative" action="{{url('users/search/{name}' )}}" method="get">
				<input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
				<button class="btn bg-transparent px-3 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
			</form>
			<!-- Search contact END -->
			<ul class="list-unstyled">

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/01.jpg')}}" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Frances Guerrero </a>
						<div class="small text-secondary text-truncate">Frances sent a photo.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> Just now </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast2">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/02.jpg')}}" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Lori Ferguson </a>
						<div class="small text-secondary text-truncate">You missed a call form Carolyn🤙</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 1min </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-offline">
						<img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Samuel Bishop </a>
						<div class="small text-secondary text-truncate">Day sweetness why cordially 😊</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 2min </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar">
						<img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/04.jpg')}}" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Dennis Barrett </a>
						<div class="small text-secondary text-truncate">Happy birthday🎂</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 10min </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar avatar-story status-online">
						<img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/05.jpg')}}" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Judy Nguyen </a>
						<div class="small text-secondary text-truncate">Thank you!</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 2hrs </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Carolyn Ortiz </a>
						<div class="small text-secondary text-truncate">Greetings from Webestica.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 1 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="flex-shrink-0 avatar">
						<ul class="avatar-group avatar-group-four">
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
							</li>
						</ul>
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link text-truncate d-inline-block" href="#!">Frances, Lori, Amanda, Lawson </a>
						<div class="small text-secondary text-truncate">Btw are you looking for job change?</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 4 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-offline">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Bryan Knight </a>
						<div class="small text-secondary text-truncate">if you are available to discuss🙄</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 6 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Louis Crawford </a>
						<div class="small text-secondary text-truncate">🙌Congrats on your work anniversary!</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 1 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Jacqueline Miller </a>
						<div class="small text-secondary text-truncate">No sorry, Thanks.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 15, dec </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Amanda Reed </a>
						<div class="small text-secondary text-truncate">Interested can share CV at.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 18, dec </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Larry Lawson </a>
						<div class="small text-secondary text-truncate">Hope you're doing well and Safe.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 20, dec </div>
				</li>
				<!-- Button -->
				<li class="mt-3 d-grid">
					<a class="btn btn-primary-soft" href="messaging.html"> See all in messaging </a>
				</li>

			</ul>
		</div>
		<!-- Offcanvas body END -->
	</div>
	<!-- Chat sidebar END -->

	<!-- Chat END -->

	<!-- Chat START -->
	<div aria-live="polite" aria-atomic="true" class="position-relative">
		<div class="toast-container toast-chat d-flex gap-3 align-items-end">

			<!-- Chat toast START -->
			<div id="chatToast" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
				<div class="toast-header bg-mode">
					<!-- Top avatar and status START -->
					<div class="d-flex justify-content-between align-items-center w-100">
						<div class="d-flex">
							<div class="flex-shrink-0 avatar me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0 mt-1">Frances Guerrero</h6>
								<div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
							</div>
						</div>
						<div class="d-flex">
						<!-- Call button -->
						<div class="dropdown">
							<a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">
								<li><a class="dropdown-item" href="#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
								<li class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
							</ul>
						</div>
						<!-- Card action END -->
						<a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat" aria-expanded="false" aria-controls="collapseChat"><i class="bi bi-dash-lg"></i></a>
						<button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
					</div>
				</div>
				<!-- Top avatar and status END -->

				</div>
				<div class="toast-body collapse show" id="collapseChat">
					<!-- Chat conversation START -->
					<div class="chat-conversation-content custom-scrollbar h-200px">
						<!-- Chat time -->
						<div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
										<div class="small my-2">6:15 AM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
										<!-- Files START -->
										<!-- Files END -->
										<div class="small my-2">12:16 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
										<div class="small my-2">3:22 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
									<!-- Images -->
									<div class="d-flex my-2">
										<div class="small text-secondary">5:35 PM</div>
										<div class="small ms-2"><i class="fa-solid fa-check"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat time -->
						<div class="text-center small my-2">2 New Messages</div>
						<!-- Chat Typing -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-3 rounded-2">
											<div class="typing d-flex align-items-center">
												<div class="dot"></div>
												<div class="dot"></div>
												<div class="dot"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Chat conversation END -->
					<!-- Chat bottom START -->
					<div class="mt-2">
						<!-- Chat textarea -->
						<textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
						<!-- Button -->
						<div class="d-sm-flex align-items-end mt-2">
							<button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
							<button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
							<button class="btn btn-sm btn-success-soft me-2"> Gif </button>
							<button class="btn btn-sm btn-primary ms-auto"> Send </button>
						</div>
					</div>
					<!-- Chat bottom START -->
				</div>
			</div>
			<!-- Chat toast END -->

			<!-- Chat toast 2 START -->
			<div id="chatToast2" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
				<div class="toast-header bg-mode">
					<!-- Top avatar and status START -->
					<div class="d-flex justify-content-between align-items-center w-100">
						<div class="d-flex">
							<div class="flex-shrink-0 avatar me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0 mt-1">Lori Ferguson</h6>
								<div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
							</div>
						</div>
						<div class="d-flex">
						<!-- Call button -->
						<div class="dropdown">
							<a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown2" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown2">
								<li><a class="dropdown-item" href="#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
								<li class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
							</ul>
						</div>
						<!-- Card action END -->
						<a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat2" role="button" aria-expanded="false" aria-controls="collapseChat2"><i class="bi bi-dash-lg"></i></a>
						<button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
					</div>
				</div>
				<!-- Top avatar and status END -->

				</div>
				<div class="toast-body collapse show" id="collapseChat2">
					<!-- Chat conversation START -->
					<div class="chat-conversation-content custom-scrollbar h-200px">
						<!-- Chat time -->
						<div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
										<div class="small my-2">6:15 AM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
										<!-- Files START -->
										<!-- Files END -->
										<div class="small my-2">12:16 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
										<div class="small my-2">3:22 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
									<!-- Images -->
									<div class="d-flex my-2">
										<div class="small text-secondary">5:35 PM</div>
										<div class="small ms-2"><i class="fa-solid fa-check"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat time -->
						<div class="text-center small my-2">2 New Messages</div>
						<!-- Chat Typing -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-3 rounded-2">
											<div class="typing d-flex align-items-center">
												<div class="dot"></div>
												<div class="dot"></div>
												<div class="dot"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Chat conversation END -->
					<!-- Chat bottom START -->
					<div class="mt-2">
						<!-- Chat textarea -->
						<textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
						<!-- Button -->
						<div class="d-sm-flex align-items-end mt-2">
							<button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
							<button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
							<button class="btn btn-sm btn-success-soft me-2"> Gif </button>
							<button class="btn btn-sm btn-primary ms-auto"> Send </button>
							
						</div>
					</div>
					<!-- Chat bottom START -->
				</div>
			</div>
			<!-- Chat toast 2 END -->

		</div>
	</div>
	<!-- Chat END -->

</div> --}}
 <!-- Main Chat END -->




<script>
    $(document).ready(function () {
        let nextPageUrl = '{{ $posts->nextPageUrl() }}';
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                if (nextPageUrl) {
                    loadMorePosts();
                }
            }
        });
        function loadMorePosts() {
            $.ajax({
                url: nextPageUrl,
                type: 'get',
                beforeSend: function () {
                    nextPageUrl = '';
                },
                success: function (data) {
                    nextPageUrl = data.nextPageUrl;
                    $("#posts-container").append(data.view);
                },
                error: function (xhr, status, error) {
                    console.error("Error loading more posts:", error);
                }
            });
        }
    });
</script>
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/tiny-slider/dist/tiny-slider.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}" defer></script>

<script src="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.min.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/plyr/plyr.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/dropzone/dist/min/dropzone.min.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/zuck.js/dist/zuck.min.js')}}" defer></script>
<script src="{{asset('import/assets/js/zuck-stories.js')}}" defer></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}" defer></script>
<livewire:scripts />
</body>
</html>
