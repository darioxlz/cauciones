@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear @if(request()->has('create_caution')) caución @else notificacion @endif</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('notifications.save') }}" enctype="multipart/form-data" >
                            @csrf

                            {{--                        Individual select--}}

                            <div class="form-group row">
                                <label for="individual_id" class="col-md-4 col-form-label text-md-right">Individuo</label>

                                <div class="col-md-6">
                                    <select id="individual_id" name="individual_id">
                                        @foreach($individuals as $individual)
                                            <option value="{{$individual->individual_id}}">{{$individual->firstnames. " " . $individual->surnames}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--                        Misdeed select--}}

                            <div class="form-group row">
                                <label for="misdeed_id" class="col-md-4 col-form-label text-md-right">Delito</label>

                                <div class="col-md-6">
                                    <select id="misdeed_id" name="misdeed_id">
                                        @foreach($misdeeds as $misdeed)
                                            <option value="{{$misdeed->misdeed_id}}">{{$misdeed->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--                        Notification description input--}}

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>


                            @if(request()->has('create_caution'))
                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">Imagen</label>

                                    <div class="col-md-6">
                                        <input type="file" class="form-control-file" id="image" name="image" required accept="image/x-png,image/gif,image/jpeg">

                                        @error('image')
                                            <span class="" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Crear @if(request()->has('create_caution')) caución @else notificacion @endif
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
