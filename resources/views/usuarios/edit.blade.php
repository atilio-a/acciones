@extends('layouts.admin2')

@section('title', 'Actualizar cuenta Usuario')
@section('content-header', 'Actualizar cuenta de Usuario')

@section('content')

    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #cdd3f1;
            border: 1px solid #3c3ff3;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px;
        }


        .select2-red+.select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #f1a5e5;
            border: 1px solid #d1089f;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $(".js-example-responsive").select2({

                width: 'resolve' // need to override the changed default
            });
           
        });
    </script>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')



                <div class="form-group col-lg-8 col-8">
                    <label for="first_name">Nombre</label>
                    <input type="text" required name="first_name"
                        class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="Nombre"
                        value="{{ old('first_name', $user->first_name) }}">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-lg-8 col-8">
                    <label for="last_name">Apellido</label>
                    <input type="text" required name="last_name"
                        class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Apellido"
                        value="{{ old('last_name', $user->last_name) }}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-lg-8 col-8">
                    <label for="telfono">Telefono</label>
                    <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono"
                        value="{{ old('telefono', $user->telefono) }}">
                </div>

                <div class="form-group col-lg-8 col-8">
                    <label for="email">Email</label>
                    <input required type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="email" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-lg-8 col-8">
                    <label for="entity_id">Entidad</label>
                    <select name="entity_id" class="form-control" required>
                        <!-- Aquí debes cargar las entidades desde tu base de datos -->
                        @foreach ($entities as $entity)
                            <option value="{{ $entity->id }}" {{ $user->entity_id == $entity->id ? 'selected' : '' }}>
                                {{ $entity->nombre }} - {{ optional($entity->entidad_padre)->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-8 col-8">
                    <label for="entities">Entidades Habilitadas</label>
                    @php
                    $selected = [];
                    foreach ($user->entities as $entity) {
                        $selected[]=$entity->id_entity
                    }

                    @endphp
                    <select name="entities[]" class="form-control js-example-responsive" multiple="multiple"
                        style="width: 95%">
                        
                        @foreach ($entities as $entity)
                            <option value="{{ $entity->id }}" 
                                {{ in_array($entity->id,$selectd) ?'selectd ': '' }} > 
                                {{ $entity->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-8 col-8">
                    <label for="email">Clave <span class="text-white bg-warning ">
                            <strong>(Dejar en blanco si NO necesita cambiarla)
                            </strong>
                    </label>
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Dejar en blanco si NO necesita cambiarla" value="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="card border-success col-lg-8 col-8">
                    <div class="card-header text-white bg-success mb-3">Seleccione un Rol</div>
                    <div class="card-body text-success">
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select name="rol" class="form-select col-lg-8 col-8  @error('rol') is-invalid @enderror"
                                id="estado">
                                <option style="background-color: rgb(238, 243, 221);" value="PENDIENTE"
                                    {{ old('rol', $user->rol) === 'PENDIENTE' ? 'selected' : '' }}>PENDIENTE</option>

                                <option style="background-color: rgb(157, 240, 208);" value="COMUN"
                                    {{ old('rol', $user->rol) === 'COMUN' ? 'selected' : '' }}>COMUN</option>
                                <option style="background-color: rgb(245, 114, 105);" value="ADMINISTRADOR"
                                    {{ old('rol') === 'ADMINISTRADOR' ? 'selected' : '' }}>ADMINISTRADOR</option>

                            </select>
                            @error('rol')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <button class="btn btn-success btn-block btn-lg col-lg-6 col-6 " type="submit">Guardar cambios</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
