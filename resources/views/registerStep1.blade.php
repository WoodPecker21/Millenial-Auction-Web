<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Millennial Auction</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url("{{ asset('images/lukisan.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .login-container {
            background-color: #2f3042;
            height: 100vh;
            width: 50%;
            position: absolute;
            right: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-inline: 60px;
            color: white;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1 class="fw-bold" style="padding-bottom: 24px;">Register</h1>
        <form action="{{ route('registerStep1') }}" method="post" enctype="multipart/form-data" id="registerForm">
            @csrf
            <div class="mb-2 d-flex justify-content-between">
                <div style="width: 48%;">
                    <label class="form-label" for="nama_user">Name</label>
                    <input class="form-control" type="text" name="nama_user" id="nama_user">
                </div>
                <div style="width: 48%;">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label" for="email_user">Email</label>
                <input class="form-control" type="email" name="email_user" id="email_user">
            </div>
            <div class="mb-2">
                <label class="form-label" for="password">Password</label>
                <div class="input-group">
                    <input class="form-control" type="password" name="password" id="password">
                    <span class="input-group-text" id="password-toggle">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label" for="no_telp_user">No Telepon</label>
                <input class="form-control" type="tel" name="no_telp_user" id="no_telp_user">
            </div>
            <div class="mb-4">
                <button type="submit" class="btn text-white text-center" style="background-color: #ed8359; width: 100%;">
                    Next
                </button>
            </div>

        </form>
        <div class="text-center">
            <p>Already have an account? <a href="/" style="color: #ed8359; text-decoration: none;">Login</a></p>
        </div>

        <div id="alert-container"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#password-toggle").on("click", function() {
                var passwordInput = $("#password");
                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                } else {
                    passwordInput.attr("type", "password");
                }
            });

            $("#registerForm").submit(function(e) {
                e.preventDefault();

                // Perform form submission using AJAX
                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    success: function(response) {
                        // Display success alert
                        console.log(response);
                        var idregistered = response.idregistered;

                        if (idregistered) {
                            sessionStorage.setItem('idregistered', idregistered);
                            console.log('idregistered:', idregistered);

                            showAlert('success', 'Success, register step 2...');

                            // Redirect to registerstep2 after a delay
                            setTimeout(function() {
                                window.location.href = "/registerStep2/" + idregistered;
                            }, 2000); // 2000 milliseconds = 2 seconds
                        } else {
                            console.error('idregistered is undefined or null');
                        }
                    },
                    error: function(response) {
                        // Display error alert
                        console.log(response);
                        var errorMessage = response.responseJSON.message;

                        if (errorMessage && typeof errorMessage === 'object') {
                            // If the message is an object, use the first message
                            errorMessage = errorMessage[Object.keys(errorMessage)[0]];
                        } else {
                            // If the message is not an object, use the entire message
                            errorMessage = errorMessage || 'Register step 1 failed. Please try again.';
                        }
                        showAlert('danger', errorMessage);
                    }
                });
            });

            function showAlert(type, message) {
                // Clear existing alerts
                $("#alert-container").empty();

                // Create alert element
                var alertElement = $('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                    '<strong>' + message + '</strong>' +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>');

                // Append alert to the container
                $("#alert-container").append(alertElement);
            }
        });
    </script>

</body>

</html>