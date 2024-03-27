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
    <div class="preloader">
        <div class="preloader-item">
            <div class="spinner-grow text-primary"></div>
        </div>
    </div>
    <!-- Container START -->
    <div class="container">
        <div class="row g-4">

            <!-- Main content START -->
            <div class="col-lg-8 vstack gap-4">
                <!-- My profile START -->
                <div class="card">
                    <!-- Cover image -->
                    <div class="h-200px rounded-top" style="background-image:url({{asset('import/assets/images/Blocked_background.png')}}); background-position: center; background-size: cover; background-repeat: no-repeat;">

                    </div>

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
                                <p>the user is blocked</p>
                            </div>
                            <!-- Button -->
                            <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                                <form action="{{route('home.blocks.destroy' , $user)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger-soft me-2" type="submit"> <i class="bi bi-x-square-fill pe-1"></i> UnBlock </button>
                                </form>
                            </div>
                        </div>
                        <!-- List profile -->
                        <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Blocked from : {{$user->blockMe->where('user_blocker' ,Auth::user()->id)->first()->created_at->format('M d, Y')}}</li>
                        </ul>
                    </div>
                    <!-- Card body END -->
                    <div class="card-footer mt-3 pt-2 pb-0">
                    </div>
                </div>
                <!-- My profile END -->

            </div>
            <!-- Main content END -->

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
