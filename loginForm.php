<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/user-style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <title>Ayo Kerja | Login</title>
</head>

<body class="body">
  <main class="login-page vh-100">
    <div class="login-form mx-auto">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10 text-center mt-5">
            <form action="process.php?action=login" method="post">
              <img class="mb-4" src="assets/copywriting.png" alt="" width="100" />
              <h1 class="mb-1 fw-bold fs-1">Login</h1>
              <p class="mb-4">Login For Admin</p>
              <div class="form-floating mb-2">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                  required />
                <label for="floatingInput">Email Address</label>
              </div>
              <div class="form-floating mb-4">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"
                  required />
                <label for="floatingPassword">Password</label>
              </div>

              <button class="w-100 btn btn-dark btn-lg mb-2" type="submit">Login</button>
              <a href="registerForm.php" class="w-100 btn btn-outline-dark btn-sm mb-4">Create New Account?</a>

              <a href="home.php" class="btn btn-sm btn-link">Back to home</a>
              <p class="font-footer mt-3 mb-4 text-muted fw-light">Copyright &copy; 2022 by mfarhan08a.</p>
            </form>
          </div>
        </div>
      </div>
      <footer>
        <div class="container">
          <div class="row text-center">
            <div class="col"></div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>