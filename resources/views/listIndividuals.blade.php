@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>@if(request()->has('list_users')) Usuarios @else Individuos @endif</h1>

            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Cedula</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $row)
                        <tr>
                            <th scope="row">{{$row->individual_id}}</th>
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
