<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .input-group-append {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form method='POST' action='/QuanLiTrungTamTA/reset_password'>
            <input type='hidden' name='token' value='<?php echo $token; ?>'>
            <div class="form-group">
                <label for='new_password'>New Password:</label>
                <div class="input-group">
                    <input type='password' class="form-control" name='new_password' id='new_password' required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for='confirm_password'>Confirm Password:</label>
                <div class="input-group">
                    <input type='password' class="form-control" name='confirm_password' id='confirm_password' required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="toggleConfirmPassword">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <button type='button' class="btn btn-primary">Reset Password</button>
        </form>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordField = document.getElementById('new_password');
        var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // Toggle confirm password visibility
    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        var confirmPasswordField = document.getElementById('confirm_password');
        var type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordField.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    document.querySelector('button[type="button"]').addEventListener('click', function() {
        var new_password = document.getElementById('new_password').value;
        var confirm_password = document.getElementById('confirm_password').value;

        if (new_password !== confirm_password) {
            alert('Mật khẩu không khớp !');
            return;
        }

        var form = document.querySelector('form');
        form.submit();
    });
</script>

</html>
