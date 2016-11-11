<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter | Cotizaciones into MySQL Database</title>
    <!--link the bootstrap css file-->
    <link href="<?php echo base_url("css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
    <!-- link jquery ui css-->
    <link href="<?php echo base_url('js/jquery-ui-1.11.2/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!--include jquery library-->
    <script src="<?php echo base_url('js/js/jquery-1.10.2.js'); ?>"></script>
    <!--load jquery ui js file-->
    <script src="<?php echo base_url('js/jquery-ui-1.11.2/jquery-ui.min.js'); ?>"></script>
        
    <style type="text/css">
    .colbox {
        margin-left: 0px;
        margin-right: 0px;
    }
    </style>
    
    <script type="text/javascript">
    //load datepicker control onfocus
    $(function() {
        $("#hireddate").datepicker();
    });
    </script>
    
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-0 col-lg-15 col-sm-15 well">
          <legend><center><h1> Cotización de Servicios RapiCarga</h1></center></legend>
            <form class="form-inline">
          <?php $attributes = array("class" => "form-horizontal", "id" => "cotizacionform", "name" => "cotizacionform"); echo form_open("employee/index", $attributes);?>

            <fieldset>
                <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-12 col-sm-8">
                                <label for="employeeno" class="control-label">No Cotizacion</label>
                                </br>
                                 <input id="employeeno" name="employeeno" placeholder="No Cotizacion" type="text" class="form-control" value="<?php echo set_value('employeeno'); ?>" />
                                <span class="text-danger"><?php echo form_error('employeeno'); ?></span>
                             </div>
                       </div>
                </div>
                <div class="form-group">
                        <div class="row colbox">
                        
                            <div class="col-lg-12 col-sm-8">
                                <label for="employeeno" class="control-label">Fecha cotizacion</label>
                                </br>
                                 
                                <input id="employeeno" name="employeeno" placeholder="Fecha" type="text" class="form-control" value="<?php echo set_value('employeeno'); ?>" />
                             <span class="text-danger"><?php echo form_error('employeeno'); ?></span>
                             
                            </div>

                       </div>
                </div>


            </fieldset>

              <fieldset>
              <legend><center><h4> Datos Generales de la Empresa</h4></center></legend>
                    <div class="form-group">
                        <div class="row colbox">
                        
                            <div class="col-lg-12 col-sm-8">
                                <label for="employeeno" class="control-label">Nombre del Cliente</label>
                                </br>
                                 
                                <input id="employeeno" name="employeeno" placeholder="Nombre Cliente" type="text" class="form-control" value="<?php echo set_value('employeeno'); ?>" />
                             <span class="text-danger"><?php echo form_error('employeeno'); ?></span>
                             
                            </div>

                       </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-12 col-sm-8">
                            <label for="employeename" class="control-label">Nombre Comercial de la Empresa</label>
                            </br>
                            <input id="employeename" name="employeename" placeholder="Nombre Comercial" type="text" class="form-control"  value="<?php echo set_value('employeename'); ?>" />
                            <span class="text-danger"><?php echo form_error('employeename'); ?></span>
                        </div>

                        </div>
                </div>

               <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-10 col-sm-8">
                            <label for="department" class="control-label">Nombre Legal de la Empresa</label>
                        
                        <input id="employeename" name="employeename" placeholder="Nombre Legal" type="text" class="form-control"  value="<?php echo set_value('employeename'); ?>" />
                           <!-- <?php
                            $attributes = 'class = "form-control" id = "department"';
                            echo form_dropdown('department',$department,set_value('department'),$attributes);?>-->
                            <span class="text-danger"><?php echo form_error('department'); ?></span>
                        </div>
                    </div>
                </div>
                </fieldset>

                <fieldset>
                <legend><center><h4> Detalles y Servicios de la Carga</h4></center></legend>
                <div class="form-group">

                    <div class="row colbox">
                        <div class="col-lg-8 col-sm-8">
                            <label for="designation" class="control-label">Tipo de Carga</label>
                            <input id="employeename" name="employeename" placeholder="Tipo de Carga" type="text" class="form-control"  value="<?php echo set_value('employeename'); ?>" />
                            <?php
                            $attributes = 'class = "form-control" id = "designation"';
                            echo form_dropdown();?>
                          <!-- <?php
                            $attributes = 'class = "form-control" id = "designation"';
                            echo form_dropdown('designation',$designation, set_value('designation'), $attributes);?>     -->         
                            <span class="text-danger"><?php echo form_error('designation'); ?></span>
                        </div>

                    <div class="row colbox">
                        <div class="col-lg-8 col-sm-8">
                            <label for="designation" class="control-label">Tipo de Transporte</label>
                            <input id="employeename" name="employeename" placeholder="Tipo de Carga" type="text" class="form-control"  value="<?php echo set_value('employeename'); ?>" />
                            <?php
                            $attributes = 'class = "form-control" id = "designation"';
                            echo form_dropdown();?>
                          <!-- <?php
                            $attributes = 'class = "form-control" id = "designation"';
                            echo form_dropdown('designation',$designation, set_value('designation'), $attributes);?>     -->         
                            <span class="text-danger"><?php echo form_error('designation'); ?></span>
                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row colbox ">
                        <div class="col-lg-8 col-sm-4">
                            <label for="hireddate" class="control-label">Peso</label>
                              <input id="hireddate" name="hireddate" placeholder="Toneladas" type="text" class="form-control"  value="<?php echo set_value('hireddate'); ?>" />
                            <span class="text-danger"><?php echo form_error('hireddate'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-8 col-sm-8">
                            <label for="salary" class="control-label">Dimensiones</label>
                             <input id="salary" name="salary" placeholder="Dimensiones en pies" type="text" class="form-control" value="<?php echo set_value('salary'); ?>" />
                            <span class="text-danger"><?php echo form_error('salary'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-8 col-sm-8">
                            <label for="salary" class="control-label">Valor Real Carga</label>
                            <input id="salary" name="salary" placeholder="Valor Real en Toneladas" type="text" class="form-control" value="<?php echo set_value('salary'); ?>" />
                            <span class="text-danger"><?php echo form_error('salary'); ?></span>
                        </div>
                    </div>
                </div>
                </fieldset>

                <fieldset>
                      <div class="btn-group">
                          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pais Origen</button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                          </div>
                        </div>
             </fieldset>


                <fieldset>
                <legend><center><h4> Ruta de la Carga</h4></center></legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-12 col-sm-8">
                            <label for="designation" class="control-label">Pais Origen</label>
                       
                            <input id="employeename" name="employeename" placeholder="Origen" type="text" class="form-control"  value="<?php echo set_value('employeename'); ?>" />

                          <!-- <?php
                            $attributes = 'class = "form-control" id = "designation"';
                            echo form_dropdown('designation',$designation, set_value('designation'), $attributes);?>     -->         
                            <span class="text-danger"><?php echo form_error('designation'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-12 col-sm-8">
                            <label for="hireddate" class="control-label">Pais Destino</label>
                        
                            <input id="hireddate" name="hireddate" placeholder="Destino" type="text" class="form-control"  value="<?php echo set_value('hireddate'); ?>" />
                            <span class="text-danger"><?php echo form_error('hireddate'); ?></span>
                        </div>
                    </div>
                </div>

                 <div class="form-group">
                     <div class="radio">
                          <label><input type="radio" name="optradio"> Maersk</label>
                    </div>
                    <div class="radio">
                          <label><input type="radio" name="optradio"> APL</label>
                    </div>
                    <div class="radio disabled">
                         <label><input type="radio" name="optradio" disabled> Llapag LLoyd</label>
                    </div>
                </div>

                </fieldset>

                     <fieldset>
                <legend><center><h4> Detalle de Cotización</h4></center></legend>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-8 col-sm-8">
                            <label for="designation" class="control-label">Transporte Internacional</label>
                            <input id="employeename" name="employeename" placeholder="Tipo de Carga" type="text" class="form-control"  value="<?php echo set_value('employeename'); ?>" />
                            <!-- <?php
                            $attributes = 'class = "form-control" id = "designation"';
                            echo form_dropdown('designation',$designation, set_value('designation'), $attributes);?>     -->         
                            <span class="text-danger"><?php echo form_error('designation'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row colbox ">
                        <div class="col-lg-8 col-sm-4">
                            <label for="hireddate" class="control-label">Transporte Local </label>
                              <input id="hireddate" name="hireddate" placeholder="Toneladas" type="text" class="form-control"  value="<?php echo set_value('hireddate'); ?>" />
                            <span class="text-danger"><?php echo form_error('hireddate'); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-8 col-sm-8">
                            <label for="salary" class="control-label">Servicio Aduanal</label>
                             <input id="salary" name="salary" placeholder="Dimensiones en pies" type="text" class="form-control" value="<?php echo set_value('salary'); ?>" />
                            <span class="text-danger"><?php echo form_error('salary'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-8 col-sm-8">
                            <label for="salary" class="control-label">Total</label>
                            <input id="salary" name="salary" placeholder="Valor Real en Toneladas" type="text" class="form-control" value="<?php echo set_value('salary'); ?>" />
                            <span class="text-danger"><?php echo form_error('salary'); ?></span>
                        </div>
                    </div>
                </div>
                </fieldset>

                <fieldset>
                <br/>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                        <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insertar" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancelar" />
                    </div>
                </center></div>
            </fieldset>

            <?php echo form_close(); ?>
          <!--<?php echo $this->session->flashdata('msg'); ?>-->
        </div>
    </div>
</div>
</body>
</html>