@extends('Layout.main')

@section('content')
<div class="login">
    <div class="title">
        USTAW HASŁO
    </div>
    <form action="{{ url('/admin/setPasswordAction')}}" method="post">
    <table class="table">
        <tr>
            <td class="login">
                Twoje hasło
            </td>
            <td>
                <input type="password" name="password" class="form-control">
            </td>
        </tr>
        <tr>
            <td class="login">
                powtórz hasło
            </td>
            <td>
                <input type="password" name="passwordConfirm" class="form-control">
            </td>
        </tr>
        <tr>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <td colspan="2" class="center">
                <input type="submit"  value="USTAW" class="btn btn-primary">
            </td>
        </tr>
    </table>
    </form>
</div>
@endsection

 @section('title')
  - Ustawianie hasła
 @endsection