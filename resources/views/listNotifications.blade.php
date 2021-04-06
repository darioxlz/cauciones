@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Fecha</th>
                </tr>
                </thead>

                <tbody>
                @foreach($data as $row)
                    <tr>
                        <th scope="row">{{$row->file_id}}</th>
                        <th>{{$row->firstnames}}</th>
                        <th>{{$row->surnames}}</th>
                        <th>{{$row->cedula}}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $data->appends(request()->input())->links() !!}
            </div>
        </div>
    </div>
@endsection
