<table class="table priceQuestion">
@php
    $i = 0;
@endphp

    @foreach ($price as $list)
    
        
        <tr><td id='price_{{$i}}'>{{$list}}</td></tr>
             @php
                $i++;
             @endphp
       
    @endforeach
    
</table>
