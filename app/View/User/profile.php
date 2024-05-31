<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hồ sơ</title>
  <!-- font-awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- My css -->
  <link rel="stylesheet" href=".\public\css\cssProject.css">
  <link rel="stylesheet" href="..\public\css\cssProject.css">
</head>

<body>

<?php include './app/View/Template/navbar.php' ?>
<?php include './app/View/Template/sidebar.php' ?>

<div class="main-content">
    <div class="container mt-5">
    <h2>User Profile</h2>
    <div class="row mt-4">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Settings</h5>
                    </div>
                    <div class="card-body">
                      <form action="/QuanLiTrungTamTA/profile/edit" id="FormEditProfile" method="POST">
                          <div class="row mb-4">
                            <label for="full_name" class="col-sm-3 col-form-label">Full name:</label>
                            <div class="col-sm-9 mb-1">
                              <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $user['full_name'];?>" readonly>
                            </div>
                          </div>
                          <div class="row mb-4">
                            <label for="email" class="col-sm-3 col-form-label">Email Address:</label>
                            <div class="col-sm-9 mb-1">
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email'];?>" readonly>
                            </div>
                          </div>
                          <div class="row mb-4">
                            <label for="phone" class="col-sm-3 col-form-label">Phone Number:</label>
                            <div class="col-sm-9 mb-1">
                              <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $user['phone'];?>" readonly>
                            </div>
                          </div>
                      </form>
                        <div class="row mb-4">
                          <label for="username" class="col-sm-3 col-form-label">Username:</label>
                          <div class="col-sm-9 mb-1">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username'];?>" readonly>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <label for="password" class="col-sm-3 col-form-label">Password:</label>
                          <div class="col-sm-9 mb-1">
                            <div class="input-group">
                            <input type="password" class="form-control" id="password" value="**********" readonly>
                            <div class="input-group-append" style="cursor: pointer;" data-toggle="modal" data-target="#formResetPasswordProfile">
                              <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <button type="button" class="btn btn-success mr-3" id="editProfile">Edit Profile</button>
                          <button type="button" class="btn btn-primary mr-2 d-none" id="saveProfile">Save</button>
                          <button type="button" class="btn btn-secondary mr-3 d-none" id="Close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formResetPasswordProfile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Đặt lại mật khẩu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="/QuanLiTrungTamTA/profile/resetPassWord" method="POST" onsubmit="return validateForm()">
          <div class="form-group">
            <label for="YourPassword">Your Password:</label>
            <input type="password" class="form-control" id="YourPassword" name="YourPassword">
          </div>
          <div class="form-group">
            <label for="newPassword">New Password:</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword">
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
          </div>
          <button type="submit" class="btn btn-primary form-control" id="btnSaveResetPassword">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script>
    const buttonEditProfile = document.getElementById('editProfile');
    const buttonSaveProfile = document.getElementById('saveProfile');
    const buttonClose = document.getElementById('Close');

    function validateForm() {
      var newPassword = document.getElementById('newPassword').value;
      var confirmPassword = document.getElementById('confirmPassword').value;

      if (newPassword !== confirmPassword) {
        alert('Mật khẩu không khớp');
        return false; // Ngăn form submit
      }
      return true; // Cho phép form submit
    }

    buttonEditProfile.addEventListener('click', function() {
      document.getElementById('full_name').readOnly = false;
      document.getElementById('email').readOnly = false;
      document.getElementById('phone').readOnly = false;
      buttonEditProfile.classList.add('d-none');
      buttonSaveProfile.classList.remove('d-none');
      buttonClose.classList.remove('d-none');
    });

    buttonClose.addEventListener('click',function(){
      document.getElementById('full_name').readOnly = true;
      document.getElementById('email').readOnly = true;
      document.getElementById('phone').readOnly = true;
      buttonEditProfile.classList.remove('d-none');
      buttonSaveProfile.classList.add('d-none');
      buttonClose.classList.add('d-none');
    });

    buttonSaveProfile.addEventListener('click',function(){
      const FormEditProfile = document.getElementById('FormEditProfile');
      FormEditProfile.submit();
    });

  </script>
</body>
</html>
