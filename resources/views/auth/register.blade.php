<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <title>Registro</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    {{-- Generador de matriculas --}}
    <?php
    function Matricula(){
        $digitos = '0123456789ABCDEFGHIJKLMNOPQ';
        $longitud = 9;
        $matricula = '';

        for ($i=0; $i < $longitud; $i++) { 
            $matricula .= $digitos[rand(0, strlen($digitos) -1)];
        }

        return $matricula;
    }
    $NuevaMatricula = Matricula();
?>

    <section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Crea una Cuenta</h2>
  
                <form action="{{ route('registro') }}" method="POST">
                  @csrf
                  <div class="form-outline mb-4">
                    <label class="form-label" for="name">Nombre Completo</label>
                    <input name="name" type="text" id="name" class="form-control form-control-lg" />
                  </div>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input name="email" type="email" id="email" class="form-control form-control-lg" />
                  </div>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Contraseña</label>
                    <input name="password" type="password" id="password" class="form-control form-control-lg" />
                  </div>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="matricula">Tu Matricula</label>
                    <input readonly name="matricula" type="text" id="matricula" class="form-control form-control-lg" value="<?php echo $NuevaMatricula ?>"/>
                  </div>
  
                  <div class="d-flex justify-content-center">
                    <button type="submit"
                      class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Registrar</button>
                  </div>
  
                  <p class="text-center text-muted mt-5 mb-0">Ya tienes una cuenta? <a href="{{ route('login') }}"
                      class="fw-bold text-body"><u>Inicia Sesión aquí</u></a></p>
  
                </form>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>