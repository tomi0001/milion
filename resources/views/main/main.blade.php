@extends('Layout.main')

@section('content')

<div class="center" id="newGame">
    <form method='get'>

        <select name='Categories' class='form-control' onchange="loadSubCategories2('{{ url('/main/loadSubCategories')}}')" >
            <option value=''></option>
            @foreach ($listCategories as $list)
                <option value='{{$list->id}}'>{{$list->name}}</option>
            @endforeach
        </select>


        <select name='subCategories' class='form-control' >
            <option value=''></option>

        </select>
        <input type='button' onclick="loadPrice('{{ url('/main/loadFirstQuestion')}}'); loadtlo1('{{ url('/main/loadQuestion/')}}',0)" class="btn btn-success center" value='Nowa Gra'>
    </form>

</div><br>
    <div id="lifebuoys">
        <br><br>
        <a onclick="halfToHalf('{{ url('/main/halfToHalf')}}')" id='halfToHalf2'>
            <div class="lifebuoys" id='halfToHalf'>
                50:50
            </div>
        </a>
        <a href="{{ url('/mainthelephoneFriends')}}">
            <div class="lifebuoys">
                Telefon do przyjaciela
            </div>
        </a>
         <a href="{{ url('/main/questionToPublics')}}">
            <div class="lifebuoys">
                Pytanie do publiczności
            </div>
        </a>
    </div>
    <div class="topMain" >
        </div>
        <div class="bottomMain">
            <div class="question">
                <div class="questionQuestion" id="question" >

                </div>
                <div class="questionQuestion2">
                    <table class="question">
                        <tr>

                            <td class="questionQuestionA" id="a">
                                <a onclick="replyAction('a','{{ url('/main/getQuestion/a')}}')" class="linkReply" onmouseover="linkOver('A')" onmouseout="linkOut('A')">
                                    <div class="ABCD">
                                        A:
                                    </div>
                                    <div id="questionA" class="divReply">

                                    </div>
                                </a>
                            </td>
                            <td class="questionQuestionA" id="b">
                                <a  onclick="replyAction('b','{{ url('/main/getQuestion/b')}}')" class="linkReply"  onmouseover="linkOver('B')" onmouseout="linkOut('B')">
                                    <div class="ABCD">
                                        B:
                                    </div>
                                   <div id="questionB" class="divReply">

                                    </div>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="questionQuestionA" id="c">
                                <a  onclick="replyAction('c','{{ url('/main/getQuestion/c')}}')" class="linkReply" onmouseover="linkOver('C')" onmouseout="linkOut('C')">
                                    <div class="ABCD">
                                        C:
                                    </div>
                                   <div id="questionC" class="divReply">

                                    </div>
                                </a>
                            </td>
                            <td class="questionQuestionA" id="d">
                                <a  onclick="replyAction('d','{{ url('/main/getQuestion/d')}}')" class="linkReply" onmouseover="linkOver('D')" onmouseout="linkOut('D')">
                                    <div class="ABCD">
                                        D:
                                    </div>
                                   <div id="questionD" class="divReply">

                                    </div>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
<script>
    window.onload=loadAmbient();

    </script>
@endsection
