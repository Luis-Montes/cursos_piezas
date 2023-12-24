<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <title>Login</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <img src="https://static.wixstatic.com/media/d638e4_41554f43337d4b7a91fb7e5bbce51c8f~mv2.png"
                      style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Cursos Laguna</h4>
                  </div>
  
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if (session('mensaje'))
                      <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                          {{ session('mensaje') }}
                      </p>
                    @endif


                    <p>Inicia sesión con tu cuenta</p>
  
                    <div class="form-outline mb-4">
                      <input name="matricula" type="text" id="matricula" class="form-control"
                        placeholder="Matricula" />
                      <label class="form-label" for="form2Example11">Matricula</label>
                    </div>
  
                    <div class="form-outline mb-4">
                      <input name="password" type="password" id="form2Example22" class="form-control" />
                      <label class="form-label" for="form2Example22">Contraseña</label>
                    </div>
  
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                        in</button>
                      {{-- <a class="text-muted" href="#!">Forgot password?</a> --}}
                    </div>
  
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">No tienes una cuenta?</p>
                      <a href="{{ route('registro') }}">
                        <button type="button" class="btn btn-outline-danger">Crea una nueva</button>
                      </a>
                      
                    </div>
  
                  </form>
  
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>