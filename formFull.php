                      
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>D A T O S</h4></div></div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Nombre</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo($var['nombre'] );?>" readonly>
                <input type="hidden" class="form-control" id="idSolicitante" name="idSolicitante" value="<?php echo($var['idSolicitante'] );?>" readonly>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Apellidos </label>
            <div class="input-group">
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo($var['apellidos'] );?>" readonly>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Sexo</label>
            <div class="input-group">
                <select class="form-control" id="sexo" name="sexo" readonly>
                <option value="HOMBRE" <?php if($var['sexo'] == "HOMBRE") echo "selected"; ?> >Hombre</option>
                <option value="MUJER" <?php if($var['sexo'] == "MUJER") echo "selected"; ?> >Mujer</option>
                <option value="OTRO" <?php if($var['sexo'] == "OTRO") echo "selected"; ?> >Otro</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label class="control-label">Correo Electrónico</label>
            <div class="input-group">
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo($var['correo'] );?>" readonly>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Edad</label>
            <div class="input-group">
                <input type="number" class="form-control" id="edad" name="edad" min="18" max="100" value="<?php echo($var['edad'] );?>" readonly>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Fecha Nacimiento</label>
            <div class="input-group">
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="<?php echo($var['fechaNacimiento'] );?>" readonly>
            </div>                                                
        </div>
    </div> 
</div>
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>D O M I C I L I O</h4></div></div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Código Postal</label>
            <div class="input-group">
                <input type="text" class="form-control" id="cp" name="cp" value="<?php echo($var['cp'] );?>" readonly >
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Ciudad </label>
            <div class="input-group">
                <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo($var['ciudad'] );?>" readonly>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Estado</label>
            <div class="input-group">
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo($var['estado'] );?>" readonly>
            </div>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Municipio</label>
            <div class="input-group">
                <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo($var['municipio'] );?>" readonly>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Calle </label>
            <div class="input-group">
                <input type="text" class="form-control" id="calle" name="calle" value="<?php echo($var['calle'] );?>" readonly>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Notas</label>
            <div class="input-group">
            <textarea class="form-control" id="notas" name="notas" rows="3" value="<?php echo($var['notas'] );?>" readonly></textarea>
            </div>
        </div>
    </div>
</div>
