<option value=""></option>
@foreach ($listCategories as $list)
    <option value="{{$list->id}}">{{$list->name}}</option>
@endforeach