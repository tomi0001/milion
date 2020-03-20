@extends('Layout.main')

@section('content')

@include ('admin.menu')

<br>
<div class="addquestion">
    <div class="title">
        DODAJ NOWĄ KATEGORIE
    </div>
    <form method="get">
        <table class="table">
            <tr>
                <td class="login">
                    nazwa
                </td>
                <td>
            
                    <input type='text' name='categories' class='form-control'>
                </td>
            </tr>
            <tr>
                
                <td colspan='2' class='center'>
            
                    <input type="button" class='btn btn-success' onclick="addCategorie('{{ url('/admin/addCategorie')}}')" value="Dodaj">
                </td>
            </tr>
            <tr>
                
                <td colspan='2' class='center'>
            <div id="showAddCategorie">
                
            </div>
                     </td>
            </tr>
        </table>
    </form>    
            
</div>            
            
            
            
<div class="addquestion">  
    <div class="title">
        DODAJ NOWĄ PODKATEGORIE
    </div>
    <form method='get'>
            
            <table class="table">
                        <tr>
                <td class="login">
                    nazwa
                </td>
                <td>
            
                    <input type='text' name='subCategories' class='form-control'>
                </td>
            </tr>
            <tr>
                <td class="login">
                    Należy do kategori
                </td>
                <td>
                    <select class="form-control" name="idCategories">
                        <option value=""></option>
                        @foreach ($Categorie as $list)
                            <option value="{{$list->id}}">{{$list->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                
                <td colspan='2' class='center'>
            
                    <input type="button" class='btn btn-success' onclick="addSubCategorie('{{ url('/admin/addSubCategorie')}}')" value="Dodaj">
                </td>
            </tr>
            <tr>
                
                <td colspan='2' class='center'>
            <div id="showAddSubCategorie">
                
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