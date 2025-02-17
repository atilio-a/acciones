@extends('layouts.admin')

@section('title', 'Datos de Usuario')
@section('content-header', 'Cuenta de Usuario')

@section('content')

    <div class="card">
        <div class="card-body">
            {{-- aqui la ruto esta rara del accion, es mas no tendria accion porque es un show --}}
            <form action="{{ route('users.show', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group col-lg-8 col-8">
                    <label for="first_name">Nombre</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Nombre" disabled
                        value="{{ old('first_name', $user->first_name . ', ' . $user->last_name) }}">

                </div>

                <div class="form-group col-lg-8 col-8">
                    <label for="telfono">Telefono</label>
                    <input type="text" name="telefono" class="form-control" id="telefono" disabled
                        placeholder="Telefono" value="{{ old('telefono', $user->telefono) }}">
                </div>


                <div class="form-group col-lg-8 col-8">
                    <label for="telefono_consultorio">Telefono Consultorio</label>
                    <input type="text" name="telefono_consultorio" class="form-control" disabled
                        id="telefono_consultorio	" placeholder="Telefono Consultorio"
                        value="{{ old('telefono_consultorio', $user->telefono_consultorio) }}">
                </div>
                <div class="card border-primary col-lg-8 col-8">
                    <div class="card-header text-white bg-primary mb-3">Direccion</div>
                    <div class="form-group">
                        <label for="calle">Calle</label>
                        <input type="text" name="calle" class="form-control" id="calle" placeholder="Calle"
                            value="{{ old('calle', $user->calle . ' - Nº ' . $user->numero) }}">
                    </div>

                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <input type="text" name="departamento" class="form-control" id="departamento"
                            placeholder="Departamento" value="{{ old('departamento', $user->departamento) }}">
                    </div>

                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ciudad"
                            value="{{ old('ciudad', $user->ciudad . ', ' . $user->pais) }}">
                    </div>


                    <div class="form-group">
                        <label for="codigo_postal">Codigo Postal</label>
                        <input type="text" name="codigo_postal" class="form-control" id="codigo_postal"
                            placeholder="Codigo Postal" value="{{ old('codigo_postal', $user->codigo_postal) }}">
                    </div>
                </div>


                <div class="form-group col-lg-8 col-8">
                    <label for="email">Email</label>
                    <input required type="text" name="email" class="form-control" id="email" placeholder="email"
                        value="{{ old('email', $user->email) }}">
                </div>
                <div class="form-group col-lg-8 col-8">
                    <label for="Rol">Email</label>
                    <input required type="text" name="email" class="form-control" id="email" placeholder="rol"
                        value="{{ old('rol', $user->roll) }}">
                </div>
                <a href="{{ route('usuarios.index') }}" class="btn btn-success"><i class="fas fa-eye"> Volver al
                        Listado</i></a>

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
