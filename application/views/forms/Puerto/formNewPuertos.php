<!-- Formulario datos de usuario -->
        <div class="row">
            <div class="col-md-8">
                <h3>Datos los Puertos del Sistema</h3>
                <form data-toggle="validator" role="form" id="contactForm">
                <div class="control-group form-group">
                        <div class="controls">
                            <label>NOMBRE DEL PUERTO:</label>
                            <input type="text" style="width: 25%;" class="form-control" id="nombre" required data-validation-required-message="Por favor ingrese el Nombre del Puerto.">
                            <p class="help-block"></p>
                        </div>
                </div>
                
  				
                    <div class="control-group form-group">
				  <div class="controls">
					    <label for="pais" class="control-label">Pa&iacute;s:</label>
					     <?php echo form_dropdown('Paises', $PAISES, '', 'class="form-control" id="idpais"'); ?>
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
                    
 
				  <div id="success"></div>
				    
			     <div class="form-group">
			    	<button type="submit" class="btn btn-primary">Crear Puerto</button>
			  	</div>
			  	<span style="color: red; display:block;"></span>
  				</div>

 
</form>