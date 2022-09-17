@extends('layauts.base') <!--para heredar de base-->
@section('title', 'Lista') <!--nombre pagina, nombre de seccion-->
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h1 class="text-center mb-5">
                    <i class="fas fa-user-graduate">Libros</i>
                </h1>
                <a class="btn btn-primary  mb-1" href="{{url('/formLibro')}}">
                    <i class="fas fa-user-plus"> AGREGAR</i>
                </a>
                <a class="btn btn-primary  mb-1" href="{{url('/')}}" role="button">
                    <i  class="fas fa-arrow-left"> Regresar</i>
                </a>

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>

                        <th>Nombre Libro</th>
                        <th>Fecha Apertura</th>
                        <th>Nombre Autor</th>
                        <th>Numero Serie</th>
                        <th>Nombre de Casa Editorial</th>

                    </tr>
                    </thead>

                    <tbody>

                        @foreach($libro as $libros)
                            <tr>


                                <td>{{$libros->nombre}}</td>
                                <td>{{$libros->fecha}}</td>
                                <td>{{$libros->nombre_autor}}</td>
                                <td>{{$libros->serie}}</td>
                                <td>{{$libros->editorial}}</td>

                                <td width="10px">
                                    <a href="{{route('editformLibro', $libros->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"> Editar</i>
                                    </a>

                                </td>
                                <td width="10px">
                                    <form action="{{route('deleteLibro', $libros->id)}}"  method="POST" class="Alert-eliminar">
                                        @csrf @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"> Eliminar</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            <!--paginas-->
            {{ $libro->onEachSide(3)->links() }}

        </div>
    </div>
    </div>

@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Mensaje de Modificacion-->
    @if(session('Modificado')=='Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Libro Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <!--Mensaje de Guardado-->
    @if(session('Guardado')=='Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Libro Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif


    <!--Mensaje de Eliminado-->
    @if(session('Eliminado')=='Eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'se elimino el Libro exitosamente',
                'success'
            )
        </script>
    @endif
    <script>
        $('.Alert-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro que desea eliminar el Libro?',
                text: "Si presiona si se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>


@endsection
