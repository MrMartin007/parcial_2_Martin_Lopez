@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Editar') <!--nombre pagina, nombre de seccion-->
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100%;
            margin: 0;
            font-family: Lato, sans-serif;
            background-color:     #E1E2E1;
        }
        header{
            background: #1488CC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .card-header{
            background: #1488CC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color:white;
        }
    </style>


    <!--Validacion de errores-->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <div style="height: 20px;"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg p-3 mb-5 bg-white ">
                                <div class="card-header">EDITAR CUSTOMER</div>
                                <div class="card-body">
                        <form action="{{ route('editLibro', $libro->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PATCH')

                            <div class="form-row">
                                <div class="col-md-5 mb-4">
                                    <label for="nombre" >Nombre</label>
                                    <input type="text" name="nombre" class="form-control" class="form-control" value="{{$libro->nombre}}">
                                </div>

                                <div class="col-md-5 mb-4">
                                    <label for="fecha" >Fecha Apertura</label>
                                    <input type="date" name="fecha" class="form-control"class="form-control" value="{{$libro->fecha}}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-5 mb-4">
                                    <label for="nombre"> Nombre Autor</label>
                                    <input type="text" name="nombre_autor" class="form-control" pclass="form-control" value="{{$libro->nombre_autor}}">
                                </div>

                                <div class="col-md-5 mb-4 ">
                                    <label for="nuero">Numero Serie</label>
                                    <input type="number" name="serie" class="form-control" class="form-control" value="{{$libro->serie}}">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-5 mb-4">
                                    <label for="nombre"> Editorial</label>
                                    <input type="text" name="editorial" class="form-control" class="form-control" value="{{$libro->editorial}}">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary offset-3 "  >
                                <i class="fas fa-plus">  Modificar</i>
                            </button>
                            <a class="btn btn-primary  offset-2" href="{{url('/')}}" role="button">
                                <i  class="fas fa-arrow-left"> Regresar</i>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
