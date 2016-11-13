<div class="col-sm-offset-0 col-lg-12 col-sm-12 ">
    <legend><center><h1> Cotización de Servicios RapiCarga</h1></center></legend>
    <form class="form-inline">
        <div class="form-group">
            <label for="exampleInputName2">Num de Cotizacion</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="Num cotizacion">
        </div>

        <div class="form-group">
            <label for="datepicker" class="control-label">Fecha</label>
            <input type="date" style="width: 60%;" class="form-control" name="datepicker" placeholder="Fecha (ej. 2016-12-31)" value="" id="datepicker">
            <div class="help-block with-errors"></div>
        </div>

        <span><br></span>
        <legend><center><h4> Datos Generales de la Empresa</h4></center></legend>

        <div class="control-group form-group">
            <label for="cedula">Cedula Cliente</label>
            <div class="controls">
                <input type="text" placeholder="Cedula" style="width: 60%;" class="form-control" id="busqueda" required data-validation-required-message="filtro de b&uacute;squeda.">
                <button type="button" class="btn btn-primary" onclick="CedSeek();"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName2">Nombre del Cliente</label> 
            <br>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="Cliente">
        </div>
        <div class="form-group" >
            <label for="exampleInputEmail2">Nombre Comercial</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Nombre">
        </div>
        <div class="form-group"   >
            <label for="exampleInputEmail2">Nombre Legal</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Nombre Legal">
        </div>

        <legend><center><h4> Ruta de la Carga</h4></center></legend>
        <br>
        <label for="exampleInputEmail2">Pais Origen</label>
        <br>
        <div class="form-group row">
            <div class="col-md-2">
                <select class="form-control" id="condiciones">
                    <option value='Contado'> </option>
                    <option value='Panama'>Panama</option>
                    <option value='HongKong'>Hong Kong</option>
                    <option value='Mexico'>Mexico</option>
                    <option value='Otros'>Otros paises</option>
                </select>
            </div>
        </div>
        <div class="form-group" >
            <label for="exampleInputEmail2">Pais Destino</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Destino">
        </div>
        <div class="form-group"   >
            <label for="exampleInputEmail2"> Empresa Maritimas</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Empresa Maritima">
        </div>

        <legend><center><h4> Detalles y Servicios de la Carga</h4></center></legend>

        <div class="form-group">
            <label for="exampleInputName2">Tipo de Carga</label> 
            <br>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="Contenedor">
            <br>

            <label for="exampleInputEmail2">Tipo de Transporte</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Transporte">
            <br>
        </div>
        <div class="form-group"   >
            <label for="exampleInputEmail2">Dimensiones</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="pie cubico">
            <br>

            <label for="exampleInputEmail2">Peso</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Toneladas">
            <br>
        </div>
        <div class="form-group"   >
            <label for="exampleInputEmail2">Empresa Aduanal</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Seguros">
            <br>

            <label for="exampleInputEmail2">Valor Real de la Carga</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Valor Real">
            <br>
        </div>



        <legend><center><h4> Detalles de la Cotizacion</h4></center></legend>

        <div class="form-group">
            <label for="exampleInputName2">Transporte Internacional</label> 
            <br>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="Costo Transporte">
        </div>
        <div class="form-group" >
            <label for="exampleInputEmail2">Trasnporte Local</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Local">
        </div>
        <div class="form-group"   >
            <label for="exampleInputEmail2"> Servicio Aduanal</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Aseguradora">
        </div>
        <div class="form-group"   >
            <label for="exampleInputEmail2"> Total</label>
            <br>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Total">
        </div>



        <div class="form-group">
            <br>
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insertar" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancelar" />
            </div>
        </div>
    </form>
</div>
<!--  Modal formulario Update Usuarios-->  
<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="buscaCed" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Buscar cedula del Cliente</h4>
            </div>
            <div class="modal-body" id="modalBodyUpdateUsuario">
                <input id="idced"  name="btn_add" type="text" class="" Placeholder="Cedula" />
                <input  onclick="CedSeek();" name="Buscar" type="Button" class="btn btn-warning" value="Buscar" />
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dalog -->
</div><!-- /.modal update-->
<script type="text/javascript">
// A $( document ).ready() block.
    $(document).ready(function () {
        $('#buscaCed').modal('show');
    });

    function CedSeek()
    {
        var cedula =
                cedula = $("#idced").val();

        if (cedula == '') //seg�n el texto de b�squeda (cedula,nombre o apellido)
        {
            var data = $("#busqueda").val(); //texto de b�squeda
            if (data ==='') {
                $('#info').html("<h2>Escriba una cedula.</h2>").show().fadeOut(3000);
                return;
            }
            $("#tablaResultados").load("<?php echo base_url('Usuarios/findUser/1/'); ?>" + data, function () {
                $(this).show(700);
            });
        }


    }

    $(function () {

        $("#datepicker").datepicker();
        $("#datepicker").datepicker("option", "dateFormat", 'yy-mm-dd');    // Le pasamos el formato de la fecha
    });

</script>