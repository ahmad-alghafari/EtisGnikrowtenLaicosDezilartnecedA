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
	<link rel="shortcut icon" href="{{asset("import/assets/images/favicon.ico")}}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset("import/assets/vendor/font-awesome/css/all.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("import/assets/vendor/bootstrap-icons/bootstrap-icons.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("import/assets/vendor/tiny-slider/dist/tiny-slider.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("import/assets/vendor/glightbox-master/dist/css/glightbox.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("import/assets/vendor/plyr/plyr.css")}}">

  <!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset("import/assets/css/style.css")}}">

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
@livewire('search')
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{asset("import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}" defer></script>

<!-- Vendors -->
<script src="{{asset("import/assets/vendor/tiny-slider/dist/tiny-slider.js")}}" ></script>
<script src="{{asset("import/assets/vendor/glightbox-master/dist/js/glightbox.min.js")}}" defer></script>
<script src="{{asset("import/assets/vendor/plyr/plyr.js")}}" defer></script>

<!-- Theme Functions -->
<script src="{{asset("import/assets/js/functions.js")}}" defer></script>

</body>
</html>
