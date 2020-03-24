@extends('Layout.main')

@section('content')
<div class="center">
    <button onclick="loadtlo1('{{ url('/main/loadQuestion/')}}',0)" class="btn btn-success center">Nowa Gra</button>
</div>
    <div class="topMain">
            
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

