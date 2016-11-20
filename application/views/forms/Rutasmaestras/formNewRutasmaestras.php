<!-- Formulario datos de usuario -->
        <div class="row">
            <div class="col-md-8">
                <h3>Datos de las Rutas Maestras</h3>
                <form data-toggle="validator" role="form" id="contactForm">
                <div class="control-group form-group">
                        <div class="controls">
                            <label>Puerto Origen:</label>
                            <?php echo form_dropdown('puertoorigen', $Puertos, '', 'class="form-control" id="puertoorigen"'); ?>
                            <p class="help-block"></p>
                        </div>
                </div>
                
  				
                    <div class="control-group form-group">
				  <div class="controls">
					    <label for="pais" class="control-label">Puerto Destino:</label>
					     <?php echo form_dropdown('puertodestino	', $Puertos, '', 'class="form-control" id="puertodestino"'); ?>
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