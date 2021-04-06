@extends('layouts.app')

@push('scripts')
    <script>
        const select_states = document.getElementById('state');
        const select_municipalities = document.getElementById('municipality');
        const select_cities = document.getElementById('city_id');

        const data_municipalities = @json($municipalities);
        const data_cities = @json($cities);

        function popular_select(option_id, fieldType) {
            if (option_id === 'INVALID') return;
            let data = [];

            // if states select changes... then clear municipalities select
            if (fieldType === 'state') select_municipalities.innerHTML = '';

            // clear cities select when states or municipalities select changes
            select_cities.innerHTML = '';

            if (fieldType === 'state') {
                data = data_municipalities.filter(municipalitiy => {
                    return municipalitiy.state_id == option_id;
                });
            } else if (fieldType === 'municipality'){
                data = data_cities.filter(city => {
                    return city.municipality_id == option_id;
                });
            }

            data.forEach(el => {
                const option = document.createElement('option');

                option.value = fieldType === 'state' ? el.municipality_id : el.city_id;
                option.innerText = el.name;

                // if states select changes... then i would populate municipalities select; else; i would populate cities select
                fieldType === 'state' ? select_municipalities.appendChild(option) : select_cities.appendChild(option);
            });

            // if states select changes... then i would populate municipalities and automatically populate cities select (using the first element of municipalities select)
            if (fieldType === 'state') popular_select(data[0].municipality_id, 'municipality');
        }

        select_states.addEventListener('change', function (ev) {
            popular_select(ev.target.value, 'state');
        });

        select_municipalities.addEventListener('change', function (ev) {
            popular_select(ev.target.value, 'municipality');
        });
    </script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar @if(request()->has('create_user')) usuario @else individuo @endif</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('controller.register') }}">
                        @csrf

{{--                        Cedula select--}}

                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">Cedula</label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autofocus>

                                @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        Firstnames select--}}

                        <div class="form-group row">
                            <label for="firstnames" class="col-md-4 col-form-label text-md-right">Nombres</label>

                            <div class="col-md-6">
                                <input id="firstnames" type="text" class="form-control @error('firstnames') is-invalid @enderror" name="firstnames" value="{{ old('firstnames') }}" required autocomplete="firstnames">

                                @error('firstnames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        Surnames select--}}

                        <div class="form-group row">
                            <label for="surnames" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="surnames" type="text" class="form-control @error('surnames') is-invalid @enderror" name="surnames" value="{{ old('surnames') }}" required autocomplete="surnames">

                                @error('surnames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        Birthday select--}}

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" required>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        Phone number select--}}

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Numero de telefono</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" autocomplete="phone_number">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        Gender select--}}

                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">Sexo</label>

                            <div class="col-md-6">
                                <select id="sex" name="sex">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>

{{--                        State select--}}

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <select id="state" name="state">
                                    @foreach($states as $state)
                                        @if ($loop->first)
                                            <option value="INVALID">Seleccione un estado</option>
                                        @endif

                                        <option value="{{$state->state_id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

{{--                        Municipality select--}}

                        <div class="form-group row">
                            <label for="municipality" class="col-md-4 col-form-label text-md-right">Municipio</label>

                            <div class="col-md-6">
                                <select id="municipality" name="municipality">
                                    <option value="INVALID">Seleccione un municipio</option>
                                </select>
                            </div>
                        </div>

{{--                        City select--}}

                        <div class="form-group row">
                            <label for="city_id" class="col-md-4 col-form-label text-md-right">Ciudad</label>

                            <div class="col-md-6">
                                <select id="city_id" name="city_id">
                                    <option value="INVALID">Seleccione una ciudad</option>
                                </select>
                            </div>
                        </div>

{{--                        Address exact select--}}

                        <div class="form-group row">
                            <label for="address_exact" class="col-md-4 col-form-label text-md-right">Dirección exacta</label>

                            <div class="col-md-6">
                                <input id="address_exact" type="text" class="form-control" name="address_exact">
                            </div>
                        </div>


                        @if(request()->has('create_user'))
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar @if(request()->has('create_user')) usuario @else individuo @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
