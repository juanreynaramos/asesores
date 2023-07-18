                      
<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>D A T O S</h4></div></div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Nombre</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nombre" name="nombre" required >
                <input type="hidden" class="form-control" id="idSolicitante" name="idSolicitante" value="0">
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Apellidos </label>
            <div class="input-group">
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Sexo</label>
            <div class="input-group">
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="HOMBRE" selected>Hombre</option>
                    <option value="MUJER">Mujer</option>
                    <option value="OTRO" >Otro</option>
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
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Edad</label>
            <div class="input-group">
                <input type="number" class="form-control" id="edad" name="edad" min="18" max="100" required>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Fecha Nacimiento</label>
            <div class="input-group">
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required >
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
                <input type="text" class="form-control" id="cp" name="cp" required>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Ciudad </label>
            <div class="input-group">
                <input type="text" class="form-control" id="ciudad" name="ciudad" required>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Estado</label>
            <div class="input-group">
                <input type="text" class="form-control" id="estado" name="estado" required >
            </div>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Municipio</label>
            <div class="input-group">
                <input type="text" class="form-control" id="municipio" name="municipio" required>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Calle </label>
            <div class="input-group">
                <input type="text" class="form-control" id="calle" name="calle" required>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Notas</label>
            <div class="input-group">
            <textarea class="form-control" id="notas" name="notas" rows="3"></textarea>
            </div>
        </div>
    </div>
</div>

<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>I N G R E S O</h4></div></div>
  <input type="hidden"  id="num" name="num" value="0">
  <div id="contenedor-divs"></div>
  <input type="button" class="btn btn-secondary" value="Nuevo Ingreso" onclick="crearDiv()">
<!--
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Nombre de la empresa</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" required>
            </div>
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Comprobante de Ingreso </label>
            <div class="input-group">
                <input type="text" class="form-control" id="comprobanteIngreso" name="comprobanteIngreso" required>
            </div>                                                
        </div>
    </div>    
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Salario Bruto Mensual</label>
            <div class="input-group">
                <input type="text" class="form-control" id="salarioBrutoMensual" name="salarioBrutoMensual" required>
            </div>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Salario Neto Mensual</label>
            <div class="input-group">
                <input type="text" class="form-control" id="salarioNetoMensual" name="salarioNetoMensual" required>
            </div>                                                
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Tipo de empleo </label>
            <div class="input-group">
                <input type="text" class="form-control" id="tipoEmpleo"  name="tipoEmpleo" required>
            </div>                                                
        </div>
    </div>   
    <div class="col-sm-4"> 
        <div class="form-group">
            <label class="control-label">Fecha Inicio</label>
            <div class="input-group">
                <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" required >
            </div>                                                
        </div>
    </div>
    <button onclick="agregar();" class="btn btn-secondary" type="button" id="bt1">Agregar Ingreso</button>
</div> 

<div id="agrego1" style="display: none;">
        

<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>I N G R E S O 2</h4></div></div>
        <div class="row">
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Nombre de la empresa</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nombreEmpresa1" name="nombreEmpresa1" >
                </div>                                                
            </div>
        </div>
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Comprobante de Ingreso </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="comprobanteIngreso1" name="comprobanteIngreso1">
                </div>                                                
            </div>
        </div>    
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Salario Bruto Mensual</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="salarioBrutoMensual1" name="salarioBrutoMensual1" >
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Salario Neto Mensual</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="salarioNetoMensual1" name="salarioNetoMensual1" >
                </div>                                                
            </div>
        </div>
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Tipo de empleo </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="tipoEmpleo1"  name="tipoEmpleo1" >
                </div>                                                
            </div>
        </div>   
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Fecha Inicio</label>
                <div class="input-group">
                    <input type="date" name="fechaInicio1" id="fechaInicio1" class="form-control"  >
                </div>                                                
            </div>
        </div>
    </div>
    <button onclick="agregar2();" class="btn btn-secondary" type="button" id="bt2">Agregar Otro Ingreso</button>
</div>

<div id="agrego2" style="display: none;">
        

<hr class="solid large">
<div class="row"><div class="col-sm-12"><h4>I N G R E S O 3</h4></div></div>
        <div class="row">
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Nombre de la empresa</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nombreEmpresa2" name="nombreEmpresa2" >
                </div>                                                
            </div>
        </div>
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Comprobante de Ingreso </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="comprobanteIngreso2" name="comprobanteIngreso2">
                </div>                                                
            </div>
        </div>    
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Salario Bruto Mensual</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="salarioBrutoMensual2" name="salarioBrutoMensual2" >
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Salario Neto Mensual</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="salarioNetoMensual2" name="salarioNetoMensual2" >
                </div>                                                
            </div>
        </div>
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Tipo de empleo </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="tipoEmpleo2"  name="tipoEmpleo2" >
                </div>                                                
            </div>
        </div>   
        <div class="col-sm-4"> 
            <div class="form-group">
                <label class="control-label">Fecha Inicio</label>
                <div class="input-group">
                    <input type="date" name="fechaInicio2" id="fechaInicio2" class="form-control"  >
                </div>                                                
            </div>
        </div>
    </div>
</div>
                    -->