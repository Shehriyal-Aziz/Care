<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Plus Register</title>
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

        .register-wrapper {
            width: 100%;
            max-width: 900px;
            background: #fff;
            border-radius: 12px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        /* Left Section */
        .register-left {
            width: 50%;
            background: #418b80ff;
            padding: 40px;
            position: relative;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-left h1 {
            font-size: 36px;
            color: #fff;
            margin-bottom: 10px;
        }

        .register-left p {
            color: #eaf7f3;
            line-height: 1.6;
        }

        .register-left img {
            position: absolute;
            bottom: 0;
            right: 20px;
            width: 260px;
            max-width: 100%;
        }

        /* Right Section */
        .register-right {
            width: 50%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-right h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 500;
            font-size: 24px;
        }

        .register-right h2 span {
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
            margin-bottom: 16px;
        }

        form input {
            width: 100%;
            padding: 11px 15px;
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

        /* Button */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #006D5B;
            border: none;
            color: #fff;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s, transform 0.1s;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background: #2c9987ff;
        }

        button[type="submit"]:active {
            transform: scale(0.98);
        }

        /* Login Link */
        .login {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
            color: #666;
        }

        .login a {
            color: #006D5B;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .login a:hover {
            color: #004d41;
            text-decoration: underline;
        }

        /* Alert Messages */
        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .register-wrapper {
                flex-direction: column;
                max-width: 450px;
            }

            .register-left,
            .register-right {
                width: 100%;
            }

            .register-left {
                padding: 30px;
                min-height: 200px;
            }

            .register-left h1 {
                font-size: 28px;
            }

            .register-left p {
                font-size: 14px;
            }

            .register-left img {
                display: none;
            }

            .register-right {
                padding: 30px;
            }

            .register-right h2 {
                font-size: 20px;
                margin-bottom: 20px;
            }

            .input-wrapper {
                margin-bottom: 14px;
            }

            form input {
                padding: 10px 12px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .register-left {
                padding: 25px;
                min-height: 150px;
            }

            .register-right {
                padding: 25px;
            }

            .register-left h1 {
                font-size: 24px;
            }

            .register-right h2 {
                font-size: 18px;
            }
        }

        /* Password strength indicator */
        .password-strength {
            height: 4px;
            background: #e0e0e0;
            border-radius: 2px;
            margin-top: 8px;
            margin-bottom: 8px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s, background 0.3s;
        }

        .strength-weak { 
            width: 33%; 
            background: #e74c3c; 
        }

        .strength-medium { 
            width: 66%; 
            background: #f39c12; 
        }

        .strength-strong { 
            width: 100%; 
            background: #27ae60; 
        }
    </style>
</head>
<body>

<div class="register-wrapper">
    <!-- Left Section -->
    <div class="register-left">
        <div>
            <h1>WELCOME!</h1>
            <p>Join Care Plus and start your journey<br>toward better health.</p>
        </div>
        <img src="/images/docauth.png" height="90%dvh" alt="Register Illustration">
    </div>

    <!-- Right Section -->
    <div class="register-right">
        <h2>Create <span>Account</span></h2>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div class="input-wrapper">
                <label for="name">{{ __('Name') }}</label>
                <x-input id="name" 
                    class="block mt-1 w-full border-[#006D5B] focus:border-[#006D5B] focus:ring-[#006D5B]/30 rounded-md"
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required 
                    autofocus 
                    autocomplete="name" />
            </div>

            <!-- Email Field -->
            <div class="input-wrapper">
                <label for="email">{{ __('Email') }}</label>
                <x-input id="email" 
                    class="block mt-1 w-full border-[#006D5B] focus:border-[#006D5B] focus:ring-[#006D5B]/30 rounded-md"
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
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
                        autocomplete="new-password"
                        oninput="checkPasswordStrength()" />
                    <button type="button" class="password-toggle" onclick="togglePassword('password', 'eye-icon-1')">
                        <svg id="eye-icon-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <div class="password-strength" id="password-strength">
                    <div class="password-strength-bar" id="password-strength-bar"></div>
                </div>
            </div>

            <!-- Confirm Password Field -->
            <div class="input-wrapper">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <div class="password-wrapper">
                    <x-input id="password_confirmation" 
                        class="block mt-1 w-full border-[#006D5B] focus:border-[#006D5B] focus:ring-[#006D5B]/30 rounded-md"
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" />
                    <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', 'eye-icon-2')">
                        <svg id="eye-icon-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit">{{ __('Register') }}</button>

            <!-- Login Link -->
            <div class="login">
                Already have an account?
                <a href="{{ route('login') }}">{{ __('Login here') }}</a>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(iconId);
        
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

    function checkPasswordStrength() {
        const password = document.getElementById('password').value;
        const strengthBar = document.getElementById('password-strength-bar');
        
        // Remove existing classes
        strengthBar.className = 'password-strength-bar';
        
        if (password.length === 0) {
            return;
        }
        
        let strength = 0;
        
        // Length check
        if (password.length >= 8) strength++;
        if (password.length >= 12) strength++;
        
        // Character variety checks
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
        if (/\d/.test(password)) strength++;
        if (/[^a-zA-Z\d]/.test(password)) strength++;
        
        // Apply strength class
        if (strength <= 2) {
            strengthBar.classList.add('strength-weak');
        } else if (strength <= 4) {
            strengthBar.classList.add('strength-medium');
        } else {
            strengthBar.classList.add('strength-strong');
        }
    }
</script>

</body>
</html>