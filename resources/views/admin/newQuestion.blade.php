@extends('Layout.main')

@section('content')

@include ('admin.menu')

<br>
<div class="addquestion">
    <div class="title">
        DODAJ NOWE PYTANIE
    </div>
    <form method="get" id="question">
        <table class="table">
            <tr>
                <td class="login">
                    Treśc pytania
                </td>
                <td>
            
                    <textarea name="question" class="form-control" cols="45"></textarea>
                </td>
            </tr>
            <tr>
                <td class="login">
                    Odpowiedź A
                </td>
                <td>
            
                    <textarea name="questionA" class="form-control question" cols="45" rows="1"></textarea>
                </td>
            </tr>
            <tr>
                <td class="login">
                    Odpowiedź B
                </td>
                <td>
            
                    <textarea name="questionB" class="form-control question" cols="45" rows="1"></textarea>
                </td>
            </tr>
            <tr>
                <td class="login">
                    Odpowiedź C
                </td>
                <td>
            
                    <textarea name="questionC" class="form-control question" cols="45" rows="1" ></textarea>
                </td>
            </tr>
            <tr>
                <td class="login">
                    Odpowiedź D
                </td>
                <td>
            
                    <textarea name="questionD" class="form-control question" cols="45" rows="1" ></textarea>
                </td>
            </tr>
            <tr>
                <td class="login">
                    Poprawna odpowiedź
                </td>
                <td>
            
                    <select name="correctQuestion" class="form-control" onkeydown="if ((event.which && event.which == 13) ||
(event.keyCode && event.keyCode == 13))
{addquestion('{{ url('/admin/addQuestion')}}');return false;}
else return true;">
                        <option value="">Wybierz</option>
                        <option value="a">Odpowiedź A</option>
                        <option value="b">Odpowiedź B</option>
                        <option value="c">Odpowiedź C</option>
                        <option value="d">Odpowiedź D</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="login">
                    Przedział pytania
                </td>
                <td>
            
                    <select name="sectionQuestion" class="form-control" onkeydown="if ((event.which && event.which == 13) ||
(event.keyCode && event.keyCode == 13))
{addquestion('{{ url('/admin/addQuestion')}}');return false;}
else return true;">
                         <option value=""></option>
                        <option value="0">50</option>
                        <option value="1">100</option>
                        <option value="2">200</option>
                        <option value="3">300</option>
                        <option value="4">500</option>
                        <option value="5">1 000</option>
                        <option value="6">2 000</option>
                        <option value="7">4 000</option>
                        <option value="8">5 000</option>
                        <option value="9">8 000</option>
                        <option value="10">10 000</option>
                        <option value="11">20 000</option>
                        <option value="12">40 000</option>
                        <option value="13">50 000</option>
                        <option value="14">70 000</option>
                        <option value="15">100 000</option>
                        <option value="16">200 000</option>
                        <option value="17">300 000</option>
                        <option value="18">500 000</option>
                        <option value="19">750 000</option>
                        <option value="20">1 000 000</option>
                        <option value="21">2 000 000</option>
                        <option value="22">4 000 000</option>
                        <option value="23">5 000 000</option>
                        
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td class="login" width='40%'>
                    Do jakiej kategoriie<br>
                    <select name='categories' class='form-control' onchange='loadSubCategories("{{ url('/admin/loadSubCategories')}}")' onkeydown="if ((event.which && event.which == 13) ||
(event.keyCode && event.keyCode == 13))
{addquestion('{{ url('/admin/addQuestion')}}');return false;}
else return true;">
                        <option value=''>Wybierz</option>
                            @foreach ($categories as $list)
                                <option value='{{$list->id}}'>{{$list->name}}</option>
                            @endforeach
                    </select>
                </td>
                <td class='login'>
                    Do jakiej podkategorii
                    <select name='subCategories' class='form-control'>
                        
                    </select>
                </td>
            </tr>
            <tr>
                
                <td colspan='2' class='center'>
            
                    <input type="button" class='btn btn-success' onclick="addquestion('{{ url('/admin/addQuestion')}}')" value="Dodaj">
                </td>
            </tr>
            <tr>
                
                <td colspan='2' class='center'>
            <div id="showAddQuestion">
                
            </div>
                     </td>
            </tr>
        </table>
    </form>
</div>
@endsection

 @section('title')
  - Panel Administracyjny
 @endsection