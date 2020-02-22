@extends('Layout.mainUser')

@section('content')
<div class="blank">
    
</div>
<div class="login">
    <div class="title">
        <div class="center">LOGOWANIE</div>
    </div>
    
        <table class="table">
    <form action="{{ url('/user/registerAction')}}" method="post">
            <tr>
                <td class="login">Twój login</td>
                <td><input type="text" name="login" class="form-control" value='{{Request::old("login")}}'></td>
            </tr>
            <tr>
                <td class="login">Twój email</td>
                <td><input type="text" name="email" class="form-control" value='{{Request::old("email")}}'></td>
            </tr>
            <tr>
                <td class="login">Twoje hasło</td>
                <td><input type="password" name="password" class="form-control"></td>
            </tr>
            <tr>
                <td class="login">Wpisz jeszcze raz swoje hasło</td>
                <td><input type="password" name="passwordConfirm" class="form-control"></td>
            </tr>
            <tr>
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td colspan="2" class="center"><input type="submit" value="zarejestruj" class="btn btn-primary"></td>
            </tr>
    </form>
            <tr>
                <td colspan="2">
                    <div class='message center'>
                    @if (session('error')  )
                    
                        @foreach (session('error') as $errors) 
                            <span class='error'>{{$errors}}</span><br>
                        @endforeach
                    @endif
                    </div>
                </td>
            </tr>
            
        </table>
    </form>
</div>
@endsection