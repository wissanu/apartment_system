<?php include 'inc/header_login.php'; ?>
<form class="form-signin" method="POST" action="login_p.php">
      <img class="mb-4" src="assets/img/vjlogin01.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal" style="color: white;">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label style="color: white;">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button name="btn-submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3" style="color: white;">&copy; 2019-2020</p>
    </form>
<?php include 'inc/footer_login.php'; ?>
