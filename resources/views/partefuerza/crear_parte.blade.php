@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
        <h3 class="parte-unidad"><span>estas asignado a: </span><strong>{{Auth::user()->unidades_asignadas[0]->nombre}}</strong></h3>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear parte de fuerza</div>
                    <div class="panel-body">
                    {!! Form::open(array('url' => 'partefuerza', 'action' => 'post', 'class' => 'form-horizontal')) !!}
                    <input type="hidden"name="unidad_id" value="{{Auth::user()->unidades_asignadas[0]->codunijic }}">
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td><strong>CATEGORIA</strong></td>
                                        <td style="width:20%"><strong>FUERZA</strong></td> 
                                        <td style="width:20%"><strong>FORMAN</strong></td>
                                        <td style="width:20%"><strong>FALTAN</strong></td>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <td>Oficiales</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-fza" name="of_fuerza" value="{{ old('of_fuerza') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-forman" name="of_forman" value="{{ old('of_forman') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-faltan" name="of_faltan" readonly="true" value="{{ old('of_faltan') }}">
                                        </td>        
                                    </tr>  
                                    <tr>
                                        <td>Cuadro Permanente</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-fza" name="cp_fuerza" value="{{ old('cp_fuerza') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-forman" name="cp_forman" value="{{ old('cp_forman') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-faltan" name="cp_faltan" readonly="true" value="{{ old('cp_faltan') }}">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td>Soldados de tropa Profesional</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-fza" name="sltp_fuerza" value="{{ old('sltp_fuerza') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-forman" name="sltp_forman" value="{{ old('sltp_forman') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-faltan" name="sltp_faltan" readonly="true" value="{{ old('sltp_faltan') }}">
                                        </td>   
                                    </tr>   
                                    <tr>
                                        <td>Soldados Conscriptos</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-fza" name="slc_fuerza" value="{{ old('slc_fuerza') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-forman" name="slc_forman" value="{{ old('slc_forman') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-faltan" name="slc_faltan" readonly="true" value="{{ old('slc_faltan') }}">
                                        </td>   
                                    </tr>   
                                    <tr>
                                        <td>Empleados Civiles</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-fza" name="ec_fuerza" value="{{ old('ec_fuerza') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-forman" name="ec_forman" value="{{ old('ec_forman') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-faltan" name="ec_faltan" readonly="true" value="{{ old('ec_faltan') }}">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td>Alumnos</td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-fza" name="alumnos_fuerza" value="{{ old('alumnos_fuerza') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-forman" name="alumnos_forman" value="{{ old('alumnos_forman') }}">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control input-pf-faltan" name="alumnos_faltan" readonly="true" value="{{ old('alumnos_faltan') }}">
                                        </td>    
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>TOTAL</strong>
                                        </td>
                                        <td class="text-center">
                                            <strong><span id="fuerza_total"></span></strong>
                                        </td>
                                        <td class="text-center">
                                            <strong><span id="forman_total"></span></strong>
                                        </td>
                                        <td class="text-center">
                                            <strong><span id="faltan_total"></span></strong>
                                        </td>
                                    </tr>                                       
                                </table>
                            </div>    
                            <div class="col-md-7">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Demostracion</div>
                                    <div class="panel-body">
                                    <div class="form-group row">
                                    <span class="col-md-3 control-label">Cantidad</span>
                                            <div class="col-md-2">
                                                <input type="number" min="0" class="form-control" name="demo-cant" value="{{ old('nombres') }}">
                                            </div>
                                            <div class="col-md-4">
                                                {!! Form::select('motivo', $motivos, null, ['id'=>'motivo_demo','class' => 'form-control', 'placeholder' => 'Selecciona motivo']) !!}
                                            </div>
                                            <div class="col-md-2">
                                                <a id="add_motivo" class="btn btn-success">Agregar Motivo</a>
                                            </div>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table id="demostracion-tabla" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td style="width:20%"><strong>CANTIDAD</strong></td>
                                            <td style="width:60%"><strong>MOTIVO</strong></td>
                                            <td style="width:20%"><strong></strong></td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-hover">                                                                                                                                                                                 
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-8">
                                <div class="form-inline">
                                    <a href="{{ URL::action('ParteFuerzaController@index') }}" class="btn btn-danger">Cancelar</a>
                                    <input type="submit" class="btn btn-success" value="Guardar Parte">
                                </div>
                            </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@parent
    <script>
    $('.input-pf-fza').change(function(event) {

            var num = $(this).val().match(/^\d+$/);
                if (num === null) {
                    // If we have no match, value will be empty.
                    this.value = "0";
            }

        var total_of = parseInt($("input[name='of_fuerza']").val());
        var total_cp = parseInt($("input[name='cp_fuerza']").val());
        var total_sltp = parseInt($("input[name='sltp_fuerza']").val());
        var total_slc = parseInt($("input[name='slc_fuerza']").val());
        var total_ec = parseInt($("input[name='ec_fuerza']").val());
        var total_alu = parseInt($("input[name='alumnos_fuerza']").val());

        var of_forman = $("input[name='of_forman']");
        var cp_forman = $("input[name='cp_forman']");
        var sltp_forman = $("input[name='sltp_forman']");
        var slc_forman = $("input[name='slc_forman']");
        var ec_forman = $("input[name='ec_forman']");
        var alu_forman = $("input[name='alumnos_forman']");

        of_forman.attr('max', total_of);       
        cp_forman.attr('max', total_cp);       
        sltp_forman.attr('max', total_sltp);     
        slc_forman.attr('max', total_slc);      
        ec_forman.attr('max', total_ec);       
        alu_forman.attr('max', total_alu);      

        if(total_of < parseInt(of_forman.val())){
            of_forman.val(total_of);
        }
        if(total_cp < parseInt(cp_forman.val())){
            cp_forman.val(total_cp);
        }
        if(total_sltp< parseInt(sltp_forman.val())){
            sltp_forman.val(total_sltp);
        }
        if(total_slc < parseInt(slc_forman.val())){
            slc_forman.val(total_slc);
        }
        if(total_ec < parseInt(ec_forman.val())){
            ec_forman.val(total_ec);
        }
        if(total_alu < parseInt(alu_forman.val())){
            alu_forman.val(total_alu);
        }                

        actualizar_total();
    });

    $('.input-pf-forman').change(function(event) {
        var num = $(this).val().match(/^\d+$/);
        if (num === null) {
                // If we have no match, value will be empty.
                this.value = "0";
        }
        actualizar_total();
    });

    function actualizar_total()
    {
        total_of_fza = parseInt($("input[name='of_fuerza']").val());
        total_cp_fza = parseInt($("input[name='cp_fuerza']").val());
        total_sltp_fza = parseInt($("input[name='sltp_fuerza']").val());
        total_slc_fza = parseInt($("input[name='slc_fuerza']").val());
        total_ec_fza = parseInt($("input[name='ec_fuerza']").val());
        total_alu_fza = parseInt($("input[name='alumnos_fuerza']").val());

        var total_fza = total_of_fza+total_cp_fza+total_sltp_fza+total_slc_fza+total_ec_fza+total_alu_fza;
        if(!isNaN(total_fza)){
            $('#fuerza_total').text(total_fza);
        }

        total_of_forman = parseInt($("input[name='of_forman']").val());
        total_cp_forman = parseInt($("input[name='cp_forman']").val());
        total_sltp_forman = parseInt($("input[name='sltp_forman']").val());
        total_slc_forman = parseInt($("input[name='slc_forman']").val());
        total_ec_forman = parseInt($("input[name='ec_forman']").val());
        total_alu_forman = parseInt($("input[name='alumnos_forman']").val());

        if(total_of_forman > total_of_fza){total_of_forman = total_of_fza; $("input[name='of_forman']").val(total_of_fza)};
        if(total_cp_forman > total_cp_fza){total_cp_forman = total_cp_fza; $("input[name='cp_forman']").val(total_cp_fza)};
        if(total_sltp_forman > total_sltp_fza){total_sltp_forman = total_sltp_fza; $("input[name='sltp_forman']").val(total_sltp_fza)};
        if(total_slc_forman > total_slc_fza){total_slc_forman = total_slc_fza; $("input[name='slc_forman']").val(total_slc_fza)};
        if(total_ec_forman > total_ec_fza){total_ec_forman = total_ec_fza; $("input[name='ec_forman']").val(total_ec_fza)};
        if(total_alu_forman > total_alu_fza){total_alu_forman = total_alu_fza; $("input[name='alumnos_forman']").val(total_alu_fza)};

        var total_forman = total_of_forman+total_cp_forman+total_sltp_forman+total_slc_forman+total_ec_forman+total_alu_forman;
        if(!isNaN(total_forman)){
            $('#forman_total').text(total_forman);
        }

        $("input[name='of_faltan']").val(total_of_fza- total_of_forman);
        $("input[name='cp_faltan']").val(total_cp_fza - total_cp_forman);
        $("input[name='sltp_faltan']").val(total_sltp_fza - total_sltp_forman);
        $("input[name='slc_faltan']").val(total_slc_fza - total_slc_forman);
        $("input[name='ec_faltan']").val(total_ec_fza - total_ec_forman);
        $("input[name='alumnos_faltan']").val(total_alu_fza - total_alu_forman);

        total_of_faltan = parseInt($("input[name='of_faltan']").val());
        total_cp_faltan = parseInt($("input[name='cp_faltan']").val());
        total_sltp_faltan = parseInt($("input[name='sltp_faltan']").val());
        total_slc_faltan = parseInt($("input[name='slc_faltan']").val());
        total_ec_faltan = parseInt($("input[name='ec_faltan']").val());
        total_alu_faltan = parseInt($("input[name='alumnos_faltan']").val());

        var total_faltan = total_of_faltan+total_cp_faltan+total_sltp_faltan+total_slc_faltan+total_ec_faltan+total_alu_faltan;
        if(!isNaN(total_forman)){
            $('#faltan_total').text(total_faltan);
        }
    }


    $("#demostracion-tabla").on('click','.del-demo',function() {
        $(this).closest('tr').remove();
    });

    $("#add_motivo").click(function(event) {

        var cantidad = parseInt($("input[name='demo-cant']").val());
        var motivo = $("select[name='motivo']").val();
        var total_faltante = parseInt($("#faltan_total").text());
        var total_tabla = 0;
        var motivo_nombre = $( "#motivo_demo").find("option:selected" ).text();
        var agregado = false;


        if(cantidad > 0 && motivo != ""){
            if(cantidad <= total_faltante)
            {
                $('#demostracion-tabla').find('tbody tr td:nth-child(1) input').each( function(){
                    //add item to array
                    total_tabla = total_tabla + parseInt($(this).val());
                });

                if(total_tabla+cantidad <= total_faltante)
                {
                    $('#demostracion-tabla').find('tbody tr td:nth-child(2) input').each( function(){
                        //add item to array
                        if($(this).val() == motivo){
                            cant_actual = parseInt($(this).parent().parent().find('td').eq(0).find('input').val());
                            cant_actual += cantidad;
                            $(this).parent().parent().find('td').eq(0).find('input').val(cant_actual);
                            $(this).parent().parent().find('td').eq(0).find('span').text(cant_actual);
                            agregado = true;
                        }

                    });

                    if(!agregado){
                        $("#demostracion-tabla").find("tbody").append('<tr><td><input type="hidden" name="cantidad[]" value="'+cantidad+'"><span>'+cantidad+'</span></td><td><input type="hidden" name="motivos[]" value="'+motivo+'">'+motivo_nombre+'</td><td><input type="hidden" name="ids[]" value=""><button class="btn btn-danger btn-sm del-demo">eliminar</button></td></tr>');
                        agregado = false;
                    }
                }
                else{
                    console.log("ya complestaste a los faltantes");
                    return false;
                }

            }
            else{
                console.log("sobrepasa total faltante");
                return false;
            }
        }
        else{
            console.log("falta el motivo");
            return false;
        }
        return false;
    });


    </script>
@endsection