<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('cssfile/homepage.css') }}">
</head>

<body>

@include('citizen.message')
<script>
        // Hide the success message after 2 seconds (2000 milliseconds)
        setTimeout(function () {
            var successAlert = document.getElementById('success');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 2000);
        setTimeout(function () {
            var DangerAlter = document.getElementById('error');
            if (DangerAlter) {
                DangerAlter.style.display = 'none';
            }
        }, 2000);
</script>

    <header>
        <nav class="navbar">
            <div class="container">
                <a href="#" class="logo">Logo</a>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="cta">
                    <a href="{{ route('citizen.login') }}" class="btn login">Login</a>
                    <a href="{{ route('registerpage') }}" class="btn register" id="registerBtn">Register</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="video-container">
                <video autoplay muted loop>
                    <source src="{{ asset('/videos/vid.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <div class="container">
                <div class="hero-content" style="justify-content: center; margin-top:150px;">
                    <h1>Welcome to Our Website</h1>
                    <p>Explore our services and join our community today!</p>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <div class="feature">
                    <h2>Feature 1</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget leo eu nisi aliquam suscipit.
                    </p>
                </div>
                <div class="feature">
                    <h2>Feature 2</h2>
                    <p>Nulla feugiat felis a lectus vehicula, vel ullamcorper ex pellentesque. Phasellus ac ultrices
                        urna.</p>
                </div>
                <div class="feature">
                    <h2>Feature 3</h2>
                    <p>Quisque vitae eros pretium, placerat libero in, vehicula nulla. Vestibulum ante ipsum primis in
                        faucibus orci luctus et ultrices posuere cubilia curae.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Company. All rights reserved.</p>
        </div>
    </footer>
</body>

<!-- <script>


// Get the modal element
var modal = document.getElementById('registerModal');

// Get the button that opens the modal
var btn = document.getElementById('registerBtn');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName('close')[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = 'block';
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = 'none';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

</script> -->

</html>