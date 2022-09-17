@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Formulario') <!--nombre pagina, nombre de seccion-->
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
                    <div class="card-header">Ingresar Libro</div>
                    <div class="card-body">

                        <form action="{{ route('Libro.save')}}" method="POST" enctype="multipart/form-data" class="alerta">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-5 mb-4">
                                    <label for="nombre" >Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Hola Mundo Cruel"  required>
                                    <input type="hidden" name="control" value="form">
                                </div>

                                <div class="col-md-5 mb-4">
                                    <label for="fecha" >Fecha Apertura</label>
                                    <input type="date" name="fecha" class="form-control" placeholder="10/5/2020"  required >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-5 mb-4">
                                    <label for="nombre"> Nombre Autor</label>
                                    <input type="text" name="nombre_autor" class="form-control" placeholder="Jose Mendez"  required>
                                </div>

                                <div class="col-md-5 mb-4 ">
                                    <label for="nuero">Numero Serie</label>
                                    <input type="number" name="serie" class="form-control" placeholder="23424"  required>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-5 mb-4">
                                    <label for="nombre"> Editorial</label>
                                    <input type="text" name="editorial" class="form-control" placeholder="casa blanca"  required>
                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary "  >
                                <i class="fas fa-plus">  Guardar</i>
                            </button>
                            <a class="btn btn-primary  offset-2" href="{{url('/')}}" role="button">
                                <i  class="fas fa-arrow-left"> Regresar</i>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('alerta')=='ok')

        <script>
            Swal.fire({
                title: 'No se pudo agregar la Calificacion',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif

    @if(session('alertaQery')=='murio')

        <script>
            Swal.fire({
                title: 'No se pudo agregar la Calificacion',
                text:'Es un error de Base de datos',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif
@endsection
