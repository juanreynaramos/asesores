<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Nombre de la empresa</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nombreEmpresa"  value="<?php echo($row['nombreEmpresa'] );?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Comprobante de Ingreso </label>
            <div class="input-group">
                <input type="text" class="form-control" id="comprobanteIngreso"  value="<?php echo($row['comprobanteIngreso'] );?>" readonly>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Salario Bruto Mensual</label>
            <div class="input-group">
                <input type="text" class="form-control" value="<?php echo($row['salarioBrutoMensual'] );?>" readonly>
            </div>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Salario Neto Mensual</label>
            <div class="input-group">
                <input type="text" class="form-control"  value="<?php echo($row['salarioNetoMensual'] );?>" readonly>
                
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Tipo de empleo </label>
            <div class="input-group">
                <input type="text" class="form-control" id="tipoEmpleo" value="<?php echo($row['tipoEmpleo'] );?>" readonly>
            </div>                                                
        </div>
    </div>   
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Fecha Inicio</label>
            <div class="input-group">
                <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" value="<?php echo($row['fechaInicio'] );?>" readonly>
            </div>                                                
        </div>
    </div>
</div>
    