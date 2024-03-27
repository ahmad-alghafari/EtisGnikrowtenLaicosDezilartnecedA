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
  <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css')}}" />

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">

  <style>
        /* Hide the default scrollbar */
    ::-webkit-scrollbar {
      display: none;
    }

    /* Style the container with overflow */
    #chatControl {
      overflow-y: auto;
      scrollbar-width: thin; /* For Firefox */
    }

    /* Style the scrollbar track */
    #chatControl::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Style the scrollbar thumb */
    #chatControl::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 5px;
    }

    /* Style the scrollbar thumb on hover */
    #chatControl::-webkit-scrollbar-thumb:hover {
      background: #555;
    }   
  </style>

	<livewire:styles />
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
  
  <!-- Container START -->
  <div class="container">
    <!-- Row start -->
		@livewire('messageing')
    <!-- Row END -->
    <!-- =======================
    Chat END -->

	</div>
  <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Chat START -->
 {{-- <div class="position-fixed bottom-0 end-0 p-3">

  <!-- Chat toast START -->
  <div id="chatToast" class="toast bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
    <div class="toast-header bg-mode d-flex justify-content-between">
      <!-- Title -->
      <h6 class="mb-0">New message</h6>
      <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <!-- Top avatar and status END -->
    <div class="toast-body collapse show" id="collapseChat">
      <!-- Chat conversation START -->
      <!-- Form -->
      <form>
        <div class="input-group mb-3">
          <span class="input-group-text border-0">To</span>
          <input class="form-control" type="text" placeholder="Type a name or multiple names">
        </div>
      </form>         
      <!-- Chat conversation END -->
      <!-- Extra space -->
      <div class="h-200px"></div>
      <!-- Button  -->
      <div class="d-sm-flex align-items-end">
        <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1" spellcheck="false"></textarea>
        <button class="btn btn-sm btn-danger-soft ms-sm-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
        <button class="btn btn-sm btn-secondary-soft ms-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
        <button class="btn btn-sm btn-primary ms-2"><i class="fa-solid fa-paper-plane fs-6"></i></button>
      </div>
    </div>
  </div>
  <!-- Chat toast END -->

</div> --}}

<!-- Chat END -->

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
      function getCurrentTime() {
        const currentDate = new Date();
        let hours = currentDate.getHours();
        const meridiem = hours >= 12 ? 'PM' : 'AM'; // Determine AM or PM
        hours = hours % 12 || 12; // Convert 24-hour time to 12-hour time
        let minutes = currentDate.getMinutes();
        // Add leading zero if minutes is less than 10
        minutes = minutes < 10 ? '0' + minutes : minutes;
        const currentTimeString = hours + ':' + minutes + ' ' + meridiem;
        return currentTimeString;
        }
		$(document).ready(function() {
        function scrollChatToBottom() {
          var chatControl = $("#chatControl");
          chatControl.scrollTop(chatControl.prop("scrollHeight"));
        }
        scrollChatToBottom();
    		$(document).on("click", "#send", function(e) {
        		// e.preventDefault();
        		const message = $("#message").val();
				    const text = 
                  '<div class="d-flex justify-content-end text-end mb-1">'+
                  '<div class="w-100">'+
                  '<div class="d-flex flex-column align-items-end">'+
                  '<div class="bg-primary text-white p-2 px-3 rounded-2">'+
                    message +
                  '<div class="d-flex my-2">'+
                  '<div class="small text-secondary">'+
                    getCurrentTime() +
                  '</div><div class="small ms-2"><i class="fa-solid fa-check"></i></div></div></div></div></div>';
				if (message.trim() !== "") { // Check if message is not empty
					$("#chatControl").append(text); 
          scrollChatToBottom();
          // Append message to chat conversation content
					// $("#message").val("");  Clear the textarea after sending the message
				}
    		});

        $(window).resize(function() {
        scrollChatToBottom(); // Scroll to bottom on window resize
    });
		});
  
    Pusher.logToConsole = true;
      var pusher = new Pusher('2d71b511dc2458847016', {
        cluster: 'ap2'
      });
      var channel = pusher.subscribe('chat{{Auth::user()->id}}');
        channel.bind('chatMessage', function(data) {
          // alert(JSON.stringify(data));
          // let message = 
          //       '<div class="d-flex mb-1"><div class="flex-shrink-0 avatar avatar-xs me-2">'+
          //       '<img class="avatar-img rounded-circle"'+ 
          //         if($path == 'placeholder')
          //         'src="{asset('import/assets/images/avatar/placeholder.jpg')}">'+
          //         else
          //         'src="{asset($path)}">'+
          //         endif
                    
          //         '</div><div class="w-100"><div class="d-flex flex-column align-items-start"><div class="bg-light text-secondary p-2 px-3 rounded-2">'+
          //           JSON.stringify(data) +
          //         '</div><div class="small my-2">'+
          //           getCurrentTime() +
          //         '</div></div></div></div></div>';
          let message = 
                '<div class="d-flex mb-1"><div class="flex-shrink-0 avatar avatar-xs me-2">'+
                '<img class="avatar-img rounded-circle"'+ 
                  'src="{{asset('import/assets/images/avatar/placeholder.jpg')}}">'+
                  '</div><div class="w-100"><div class="d-flex flex-column align-items-start"><div class="bg-light text-secondary p-2 px-3 rounded-2">'+
                    data.message +
                  '<div class="small my-2">'+
                    getCurrentTime() +
                  '</div></div></div></div></div>';
          $("#chatControl").append(message); 
          scrollChatToBottom(); 
      });
  
</script>
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{asset('import/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}"></script>

<livewire:scripts />
</body>
</html>