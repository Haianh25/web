<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login for Admin</title>
    <link rel="stylesheet" href="../Framework/bootstrap-4.0.0-dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../CSS/loginadmin.css">
    <link rel="stylesheet" href="../Font/fontawesome-free-6.2.0-web/css/all.css">
  

</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-lg-3 login-form">
                    <div class="col-lg-3 login-form">
                        
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button onclick="checkLogin()"  class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>

<script>
    let usernmae = document.querySelectorAll('.form-control');
    let btnLogin = document.querySelector('.btn-outline-primary');
    const userAdmin = "admin";
    const pwAdmin = "admin";
    function checkLogin() {
      
  if (usernmae[0].value === userAdmin && usernmae[1].value === pwAdmin) {
    window.location.assign('admin.php');
  } else {
    alert("Đăng nhập sai tài khoản");
  }
}

</script>



</body>
</html>