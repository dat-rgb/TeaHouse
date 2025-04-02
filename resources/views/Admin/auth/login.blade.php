<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

    <!-- Google Font : Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Tabler Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <!--  CSS -->
    <link rel="stylesheet" href="{{ asset('/css/admin/login.css') }}">

</head>

<body class="bg-white text-white">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card bg-custom-blue text-white" style="border-radius: 1rem; width: 100%; max-width: 400px;">
            <div class="card-body p-5 text-center">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-4">Đăng nhập hệ thống Tea House</p>

                <!-- Login Form -->
                <form action="" method="POST">
                    @csrf
                    <!-- Email Input -->
                    <div class="form-outline form-white mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="email" required />
          
                    </div>
                    <!-- Password Input -->
                    <div class="form-outline form-white mb-4">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="password" required />
                      
                    </div>
                    <!-- Forgot Password Link -->
                    <p class="small mb-5 pb-lg-2">
                        <a class="text-white-50" href="">Forgot password?</a>
                    </p>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-outline-light btn-lg px-5">Login</button>
                </form>

                <!-- Social Media Links -->
                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for interactivity like modals, dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq6O2hbAyeOa9W+qAijFcQ36lxvq0WlEqG1tiEZHnPME2" crossorigin="anonymous"></script>
</body>

</html>
