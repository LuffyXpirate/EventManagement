<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up</title>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"/>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(to right, #4f46e5, #06b6d4);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .wrapper {
      background-color: #ffffff;
      padding: 40px 30px;
      border-radius: 15px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .wrapper h1 {
      text-align: center;
      color: #333;
    }

    .input-box {
      position: relative;
    }

    .input-box input,
    .input-box select {
      width: 100%;
      padding: 12px 40px 12px 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      outline: none;
      font-size: 15px;
      transition: 0.3s;
    }

    .input-box input:focus,
    .input-box select:focus {
      border-color: #06b6d4;
      box-shadow: 0 0 5px rgba(6, 182, 212, 0.4);
    }

    .input-box i {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #888;
      font-size: 18px;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background: #4f46e5;
      color: #fff;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover {
      background: #4338ca;
    }

    .register-link {
      text-align: center;
      font-size: 14px;
      margin-top: 15px;
    }

    .register-link a {
      color: #06b6d4;
      text-decoration: none;
    }

    .register-link a:hover {
      text-decoration: underline;
    }

  </style>
</head>

<body>
<div class="wrapper">
    <form action="{{ url('register') }}" method="post">
        @csrf
        <h1>Sign Up</h1>
        <br>

        <div class="input-box">
            <input type="text" placeholder="Full Name" name="name" required>
            <i class="bi bi-person"></i>
        </div>
        <br>

        <div class="input-box">
            <input type="email" placeholder="Email Address" name="email" required>
            <i class="bi bi-envelope"></i>
        </div>
        <br>

        <div class="input-box">
            <input type="password" placeholder="Password" name="password" id="password" required>
            <i class="bi bi-eye" id="toggle-password" style="cursor:pointer;"></i>
        </div>
        <br>

        <div class="input-box">
            <input type="password" placeholder="Confirm Password" name="password_confirmation" required>
            <i class="bi bi-lock"></i>
        </div>
        <br>

        <div class="input-box">
            <select name="user_type" required>
                <option value="" disabled selected>Select User Type</option>
                <option value="organizer">Organizer</option>
                <option value="attendee">Attendee</option>
            </select>
        </div>
        <br>

        <button type="submit" class="btn">Register</button>
        <br>

        <div class="register-link">
            <p>Already have an account? <a href="{{ url('login') }}">Sign In</a></p>
        </div>
    </form>
</div>

<script>
document.getElementById('toggle-password').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type');
    passwordInput.setAttribute('type', type === 'password' ? 'text' : 'password');
    this.classList.toggle('bi-eye-slash');
});
</script>

</body>
</html>
