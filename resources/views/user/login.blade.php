@extends('Layout.mainUser')

@section('content')
<div class="blank">
    
</div>
<div class="login">
    <div class="title">
        <div class="center">LOGOWANIE</div>
    </div>
    
        <table class="table">
    <form action="{{ url('/user/loginAction')}}" method="post">
            <tr>
                <td class="login">Twój login</td>
                <td><input type="text" name="login" class="form-control"></td>
            </tr>
            <tr>
                <td class="login">Twoje hasło</td>
                <td><input type="password" name="password" class="form-control"></td>
            </tr>
            <tr>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <td colspan="2" class="center"><input type="submit" value="zaloguj" class="btn btn-primary"></td>
            </tr>
    </form>
            <tr>
                <td colspan='2'>
                    @if (session('succes'))
                        <div class='message center'><span class='succes'>{{session('succes')}}</span></div>
                    @endif
                    @if (session('error'))
                        <div class='message center'><span class='error'>{{session('error')}}</span></div>
                    @endif
                </td>
            </tr>
            <tr>
                
                <td colspan="2" class="center"><a href="{{url('/user/register')}}"><input type="button" value="nie masz konta zarejestruj się" class="btn btn-success"></a></td>
            </tr>
        </table>
    </form>
</div>
@endsection