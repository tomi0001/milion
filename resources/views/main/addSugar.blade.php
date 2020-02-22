<div class='addSugar'>
    <div class='titleSugar center'>
        DODAJ NOWY POMIAR
        
    </div>
    <form method="get">
    <div class="row sugarCenter">
      <div class="col-md-7">
        <input type="range" id="volume" name="volume"
             min="0" max="999" onchange='changeSugar()'>
      </div>
      <div class="col-md-5">
        <input type='number' name="sugarVal" id='sugarValue' class="form-control" onchange="changeSugarText()" name="volume">
      </div>
        
    </div>
    <div class="row sugarCenter">
        <div class="col-md-4">
            <span class="sugarTable"> Co jadłeś ?</span>
        </div>
        <div class="col-md-8">
        <select name="whatFood" class="form-control">
            
        </select>
        </div>
    </div>
    </form>
</div>