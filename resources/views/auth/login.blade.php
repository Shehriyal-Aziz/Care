<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Plus Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #27c2baff, #11879cff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 900px;
            background: #fff;
            border-radius: 12px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Left Section */
        .login-left {
            width: 50%;
            background: #418b80ff;
            padding: 40px;
            position: relative;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-left h1 {
            font-size: 36px;
            color: #fff;
            margin-bottom: 10px;
        }

        .login-left p {
            color: #eaf7f3;
            line-height: 1.6;
        }

        .login-left img {
            position: absolute;
            bottom: 0;
            right: 20px;
            width: 260px;
            max-width: 100%;
        }

        /* Right Section */
        .login-right {
            width: 50%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 500;
            font-size: 24px;
        }

        .login-right h2 span {
            color: #006D5B;
            font-weight: 700;
        }

        /* Form Styles */
        form label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .input-wrapper {
            position: relative;
            margin-bottom: 18px;
        }

        form input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        form input:focus {
            outline: none;
            border-color: #006D5B;
            box-shadow: 0 0 0 3px rgba(0, 109, 91, 0.1);
        }

        /* Password Toggle */
        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px;
            color: #666;
            width: auto;
            transition: color 0.3s;
        }

        .password-toggle:hover {
            color: #006D5B;
            background: transparent;
        }

        .password-toggle svg {
            width: 20px;
            height: 20px;
        }

        /* Checkbox */
        .remember-wrapper {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }

        .remember-wrapper input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
            cursor: pointer;
        }

        .remember-wrapper label {
            margin: 0;
            font-size: 13px;
            cursor: pointer;
            font-weight: normal;
        }

        /* Buttons and Links */
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            gap: 15px;
        }

        .forgot-link {
            font-size: 13px;
            color: #006D5B;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-link:hover {
            color: #004d41;
            text-decoration: underline;
        }

        button[type="submit"] {
            padding: 12px 30px;
            background: #006D5B;
            border: none;
            color: #fff;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s, transform 0.1s;
        }

        button[type="submit"]:hover {
            background: #2c9987ff;
        }

        button[type="submit"]:active {
            transform: scale(0.98);
        }

        /* Alert Messages */
        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
                max-width: 450px;
            }

            .login-left,
            .login-right {
                width: 100%;
            }

            .login-left {
                padding: 30px;
                min-height: 200px;
            }

            .login-left h1 {
                font-size: 28px;
            }

            .login-left p {
                font-size: 14px;
            }

            .login-left img {
                display: none;
            }

            .login-right {
                padding: 30px;
            }

            .login-right h2 {
                font-size: 20px;
                margin-bottom: 25px;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }

            button[type="submit"] {
                width: 100%;
                order: -1;
            }

            .forgot-link {
                text-align: center;
                display: block;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .login-left {
                padding: 25px;
                min-height: 150px;
            }

            .login-right {
                padding: 25px;
            }

            .login-left h1 {
                font-size: 24px;
            }

            form input {
                padding: 10px 12px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <!-- Left Section -->
        <div class="login-left">
            <div>
                <h1>WELCOME!</h1>
                <p>Join Care Plus and start your journey<br>toward better health.</p>
            </div>
            <img src="/images/docauth.png" height="90%dvh" alt="Doctor Illustration">
        </div>

        <!-- Right Section -->
        <div class="login-right">
            <h2>Login to <span>Care Plus</span></h2>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Status Message -->
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="input-wrapper">
                    <label for="email">{{ __('Email') }}</label>
                    <x-input id="email"
                        class="block mt-1 w-full border-[#006D5B] focus:border-[#006D5B] focus:ring-[#006D5B]/30 rounded-md"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username" />
                </div>
               

                <!-- Password Field -->
                <div class="input-wrapper">
                    <label for="password">{{ __('Password') }}</label>
                    <div class="password-wrapper">
                        <x-input id="password"
                            class="block mt-1 w-full border-[#006D5B] focus:border-[#006D5B] focus:ring-[#006D5B]/30 rounded-md"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password" />
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="remember-wrapper">
                    <x-checkbox id="remember_me" name="remember" class="text-[#006D5B] focus:ring-[#006D5B] border-[#006D5B]" />
                    <label for="remember_me">{{ __('Remember me') }}</label>
                </div>

                <!-- Form Footer -->
                <div class="form-footer">
                    @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif


                    <!-- <a href="{{ route('register') }}">    Dont have an account? {{ __('Register here') }}</a> -->

                    <a class="forgot-link" href="{{ route('register') }}">Dont have account?Register first</a>
                    <x-button class="ms-4 bg-[#006D5B] hover:bg-[#004d41] text-white px-6 py-2 rounded-md transition duration-200 ease-in-out">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
            }
        }
    </script>

</body>

</html>