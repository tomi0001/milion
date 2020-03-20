@extends('Layout.main')

@section('content')
<div class="login">
    <div class="title">
        USTAW HASŁO
    </div>
    <form action="{{ url('/main/loginAction')}}" method="post">
    <table class="table">
        <tr>
            <td class="login">
                Twój Nick
            </td>
            <td class="login2">
                <input type="text" name="login" class="form-control">
            </td>
        </tr>
        
        <tr>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <td colspan="2" class="center">
                <input type="submit"  value="ZAGRAJ" class="btn btn-primary">
            </td>
        </tr>
    </table>
    </form>
</div>
@endsection

 @section('title')
  - Logowanie
 @endsection