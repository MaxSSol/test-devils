@extends('layouts.auth')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="{{route('authenticate')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" name="email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-3 col-form-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </div>
        </form>
    </div>
@endsection
