@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endpush


@section('contenido')

<div class="container">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                  <form action="{{ route('cursos') }}" method="GET" class="d-flex">
                    <input type="text" name="search" placeholder="Buscar" class="form-control me-2">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </form>
                </div>
                @auth
                @if (auth()->user()->role == 'admin')
                     <div class="col-md-6">
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#modalagregarcurso">
                            Agregar
                        </button>
                    </div>                   
                @endif                    
                @endauth


            </div>
        </div>
        <br>          
        <!-- Modal Nuevo Curso -->
        <div class="modal fade" id="modalagregarcurso" tabindex="-1" aria-labelledby="modalagregarcursoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalagregarcursoLabel">Agregar Nuevo Curso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                                                    <div class="mb-3">
                                <label for=""></label>
                                <form id="dropzone" method="POST" action="{{ route('imagen') }}" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                                    @csrf
                                </form>
                            </div>
                            <form action="{{ route('cursos') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre" class="form-label">Nombre del Curso</label>
                                        <input required name="nombre" type="text" id="nombre" placeholder="Nombre del Curso" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Dificultad</label>
                                        <input required name="nivel" type="text" class="form-control" id="nivel" placeholder="Dificultad">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Duración</label>
                                        <input required name="duracion" type="text" class="form-control" id="duracion" placeholder="Duración">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Precio</label>
                                        <input required name="precio" type="text" class="form-control" id="precio" placeholder="Precio">
                                    </div>


                                    <div class="mb-3">
                                        <label for="form-label">Descripción</label>
                                        <textarea name="descripcion" class="form-control w-100" rows="4" id="descripcion" maxlength="220"></textarea>
                                        <p id="descripcion-character-count">Caracteres restantes: 220</p>
                                    </div>

                                    <script>
                                        const descripcionTextarea = document.getElementById("descripcion");
                                        const descripcionCharacterCount = document.getElementById("descripcion-character-count");

                                        descripcionTextarea.addEventListener("input", function () {
                                            const remainingChars = descripcionTextarea.maxLength - descripcionTextarea.value.length;

                                            if (remainingChars >= 0) {
                                                descripcionCharacterCount.textContent = `Caracteres restantes: ${remainingChars}`;
                                            } else {
                                                descripcionCharacterCount.textContent = "Has excedido el límite de caracteres.";
                                            }
                                        });
                                    </script>

                                    

                                    <div class="mb-3">
                                        <select name="maestro_id" id="maestro_id" class="form-control">
                                            @foreach ($maestros as $maestro)
                                                <option value="{{ $maestro->id }}" data-nombre="{{ $maestro->nombre }}">{{ $maestro->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input name="imagen" type="hidden" value="{{ old('imagen') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                                            </svg> Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    


<div class="row mx-5">
    <div class="container mt-2">
        <div class="row">
            @foreach ($cursos as $curso)
            <div class="col"> 
                <div id="card-curso" class="card h-100 shadow-sm"> 
                    <img src="{{ asset('img') . '/' . $curso->imagen }}" class="card-img-top" alt="..."> 
                    <div class="card-body"> 
                        <div class="clearfix mb-3"> 
                            <span class="float-start badge rounded-pill bg-success">${{$curso->precio}}</span> 
                             
                        </div> 
                        <h5 class="card-title">{{$curso->nombre}}</h5> 
                        <div class="d-grid gap-2 my-4">
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#cursoModal{{ $curso->id }}">MAS INFORMACIÓN</a>
                        </div> 
                    </div> 
                </div> 
            </div> 
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $cursos->links() }}
    </div>
</div>

{{-- type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cursoModal{{$curso->id}}" --}}

@foreach ($cursos as $curso)
<div class="modal fade" id="cursoModal{{ $curso->id }}" tabindex="-1" aria-labelledby="cursoModal{{ $curso->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cursoModal{{ $curso->id }}Label">{{ $curso->nombre }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ $curso->descripcion }}</p>
                <!-- Agrega aquí más detalles del curso si lo deseas -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach




@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection