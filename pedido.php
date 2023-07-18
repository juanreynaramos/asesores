<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>P E D I D O</h4></div></div>
<div class="row">
<div class="col-sm-4"> 
    <div class="form-group">
        <label class="control-label">Destino</label>
        <div class="input-group">            
            <select class="form-control" id="destino" name="destino" required>
                <option value="AUTO" selected>Auto</option>
                <option value="CASA">Casa</option>
                <option value="TARJETA CREDITO" >Tarjeta Crédito</option>
                <option value="PRESTAMO" >Préstamo</option>
            </select>
        </div>
    </div>
</div>
<div class="col-sm-4"> 
    <div class="form-group">
        <label class="control-label">Monto Solicitado </label>
        <div class="input-group">
            <input type="text" class="form-control" id="montoSolicitado" name="montoSolicitado" required>
        </div>
    </div>
</div>    
<div class="col-sm-4"> 
    <div class="form-group">
        <label class="control-label">Plazo (en años)</label>
        <div class="input-group">           
            <input type="number" class="form-control" id="plazo" name="plazo" min="1" max="10" value="1" required>
        </div>
    </div>
</div>
</div>