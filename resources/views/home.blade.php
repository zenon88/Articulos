@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/articulos/public/css/toastr.min.css">
<script src="{{ asset('js/articulos.js') }}" defer></script>
<script src="{{ asset('js/toastr.js') }}" defer></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Articulos') }}</div>

                <div class="card-body">
                <form method="POST"  id="Articulos" name="articulos">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="sku">{{ __('SKU') }}</label>
                            </div>
                            <div class="col-md-4">
                                <input id="Sku_art" type="text" class="form-control" name="Sku_art"  onkeyup="this.value=Numeros(this.value)" value="{{ old('Sku_art') }}" maxlength="6" >
                                @error('Sku_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3" id="descon" style="display:none">
                            <div class="col-md-1">
                                 <input type="checkbox" id="Desc_art" name="Desc_art" value="1" onclick="rchecked()">
                                 @error('Desc_art')
                                         <span  style="color:red" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="nombre">{{ __('Descontinuado') }}</label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row" style="padding-top:8px">
                            <div class="col-md-2">
                                <label for="articulo">{{ __('Articulo') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Dart_art" type="text" class="form-control" name="Dart_art"  value="{{ old('Dart_art') }}" maxlength="15" disabled>
                                @error('Dart_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top:8px">
                            <div class="col-md-2">
                                <label for="marca">{{ __('Marca') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Marc_art" type="text" class="form-control" name="Marc_art"  value="{{ old('Marc_art') }}" maxlength="15" disabled>
                                @error('Marc_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top:8px">
                            <div class="col-md-2">
                                <label for="modelo">{{ __('Modelo') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input id="Mode_art" type="text" class="form-control" name="Mode_art"   value="{{ old('Mode_art') }}" maxlength="20" disabled>
                                @error('Dart_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top:8px">
                            <div class="col-md-2">
                                <label for="id_compania">{{ __('Departamento') }}</label>
                            </div>
                            <div class="col-md-8">
                                <select id="Id_depto" name="Id_depto" class="form-control" onchange="obtieneclase()" disabled>
                                 <option value="0">Seleccionar Depto</option>
                                     @foreach ($deptos as $depto)
                                         <option value="{{ $depto->Id_depto}}" >{{ $depto->Nom_depto }}</option>
                                     @endforeach
                                 </select>
                               <!-- <input id="Dart_art" type="text" class="form-control" name="Dart_art"  onkeyup="this.value=Numeros(this.value)" value="{{ old('Dart_art') }}" maxlength="15" disabled>
                                --> 
                               @error('Dart_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top:8px">
                            <div class="col-md-2">
                                <label for="id_compania">{{ __('Clase') }}</label>
                            </div>
                            <div class="col-md-8">
                                <select id="Clas_art" name="Clas_art" class="form-control" onchange="obtienefamilia()" disabled> 
                                </select>
                                @error('Clas_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top:8px">
                            <div class="col-md-2">
                                <label for="familia">{{ __('Familia') }}</label>
                            </div>
                            <div class="col-md-8">
                                <select id="Fami_art" name="Fami_art" class="form-control" disabled> 
                                </select>
                                @error('Fami_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" style="padding-top:8px">
                            <div class="col-md-2">
                                <label for="id_compania">{{ __('Stock') }}</label>
                            </div>
                            <div class="col-md-3">
                                <input id="Stok_art" type="text" class="form-control" name="Stok_art"  onkeyup="this.value=Numeros(this.value)" value="{{ old('Stok_art') }}" maxlength="9" disabled>
                                @error('Sku_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="id_compania">{{ __('Cantidad') }}</label>
                            </div>
                            <div class="col-md-3">
                                <input id="Cant_art" type="text" class="form-control" name="Cant_art"  onkeyup="this.value=Numeros(this.value)" value="{{ old('Cant_art') }}" maxlength="9" disabled>
                                @error('Cant_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    
                        </div>
                        <div id="fecha" class="form-group row" style="padding-top:8px;display:none">
                            <div class="col-md-2" id="fecalta1" >
                                <label for="id_compania">{{ __('Fecha Alta') }}</label>
                            </div>
                            <div class="col-md-3" id="fecalta2" >  
                                <input id="Feca_art" type="date" class="form-control" name="Feca_art"  value="{{ old('Sku_art') }}"  disabled >
                                @error('Sku_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2" id="fecbaja1">
                                <label for="fecbaja">{{ __('Fecha Baja') }}</label>
                            </div>
                            <div class="col-md-3" id="fecbaja2">
                                <input id="Fecb_art" type="date" class="form-control" name="Fecb_art"  value="{{ old('Fecb_art') }}" disabled>
                                @error('Fecb_art')
                                    <span style="color:red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div id="guardar" class="form-group row" style="padding-top:8px;display:none">
                            <div class="col-md-4">
                              
                            </div>
                            <div class="col-md-3">
                              
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary" onclick="actualizaguarda(0)">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                        <div id="borrar" class="form-group row" style="padding-top:8px;display:none;text-align:center">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary" onclick="eliminar()">
                                    {{ __('Eliminar') }}
                                </button>
                            </div>
                            <div class="col-md-6" style="padding-top:8px">
                                  <button type="button" class="btn btn-primary" onclick="actualizaguarda(1)">
                                      {{ __('Actualizar') }}
                                  </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
var existe=0;
function Numeros(string)
{
    var keycode = event.keyCode;  
    if(keycode == '13')
    {
        var token = '{{csrf_token()}}';
        var out =$('#Sku_art').val();
        var data={_token:token,Sku:out};
        $.ajax({
        type: "get",
        url: "{{route('home1')}}",
        data: data,
        'dataType': "json",
        success: function (data) 
        {
            if(data.status=="true")
            {
                existe=1;
                // toastr.success("Existe informaciòn");
                document.getElementById('borrar').style.display = "flex";
                document.getElementById('descon').style.display = "flex";
                document.getElementById('fecha').style.display = "flex";
                if($('#guardar').css('display') == 'flex')
                {
                    document.getElementById('guardar').style.display = "none";
                }
                //Campos editar
                document.getElementById('Dart_art').disabled = false;
                document.getElementById('Marc_art').disabled = false;
                document.getElementById('Mode_art').disabled = false;
                document.getElementById('Id_depto').disabled = false;
                document.getElementById('Stok_art').disabled = false;
                document.getElementById('Cant_art').disabled = false;
                if(data.Fecb_art!="1900-01-01")
                {
                    document.getElementById('Desc_art').checked=true;
                }   
                $('#Dart_art').val(data.Dart_art);
                $('#Marc_art').val(data.Marc_art);
                $('#Mode_art').val(data.Mode_art);
                $('#Id_depto').val(data.Dept_art);
                $('#Cant_art').val(data.Cant_art);
                $('#Stok_art').val(data.Stok_art);
                $('#Feca_art').val(data.Feca_art);
                $('#Fecb_art').val(data.Fecb_art);
                load_clase(data.Dept_art,data.Clas_art);
                load_familia(data.Clas_art,data.Fami_art);
            }
            else
            {
                toastr.error('No existe información');
                $('#Dart_art').val("");
                $('#Marc_art').val("");
                $('#Mode_art').val("");
                $('#Id_depto').val(0);
                $('#Cant_art').val("");
                $('#Stok_art').val("");
                $('#Feca_art').val("");
                $('#Fecb_art').val("");
                load_clase(0,0);
                load_familia(0,0);
                document.getElementById('Dart_art').disabled = false;
                document.getElementById('Marc_art').disabled = false;
                document.getElementById('Mode_art').disabled = false;
                document.getElementById('Stok_art').disabled = false;
                document.getElementById('Cant_art').disabled = false;
                document.getElementById('Id_depto').disabled = false;
                document.getElementById('Clas_art').disabled = true;
                document.getElementById('Fami_art').disabled = true;
                document.getElementById('guardar').style.display = "flex";
                if($('#borrar').css('display') == 'flex')
                {
                    document.getElementById('borrar').style.display = "none";
                }
                if($('#descon').css('display') == 'flex')
                {
                    document.getElementById('descon').style.display = "none";
                }
                if($('#fecha').css('display') == 'flex')
                {
                    document.getElementById('fecha').style.display = "none";
                }
            }
        }
        });       
    }
    else
    {
        var out = '';
        var filtro = '1234567890.';//Caracteres validos
        //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
        for (var i=0; i<string.length; i++)
            if (filtro.indexOf(string.charAt(i)) != -1) 
            //Se añaden a la salida los caracteres validos
	        out += string.charAt(i);
    }
    return out;
}

function load_clase(Id_dept,clase)
{
    document.getElementById('Clas_art').disabled = false;
    var token = '{{csrf_token()}}';
    var data={_token:token,Id_dept:Id_dept,clase:clase};
    $.ajax({
        type: "get",
        url: "{{route('clases')}}",
        data: data,
        success: function (msg) 
        {
            $("#Clas_art").html(msg);
            }
        }); 
}
function load_familia(Clase,Familia)
{
    document.getElementById('Fami_art').disabled = false;
    var token = '{{csrf_token()}}';
    var data={_token:token,Clase:Clase,Familia:Familia};
    $.ajax({
        type: "get",
        url: "{{route('familias')}}",
        data: data,
        success: function (msg) 
        {
            $("#Fami_art").html(msg);
            }
        }); 
}
function obtienefamilia()
{

    document.getElementById('Fami_art').disabled = false;
	$('#Fami_art').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');		
	$("#Clas_art option:selected").each(function ()
	{
		var Clase = $(this).val();
        var Familia=0;
        var token = '{{csrf_token()}}';
        var data={_token:token,Clase:Clase,Familia:Familia};
        $.ajax({
                  type: "get",
                   url: "{{route('familias')}}",
                  data: data,
                success: function (msg) 
                {
                    $("#Fami_art").html(msg);
                     }
        });          
	});
 }
function rchecked()
{
    if(document.getElementById('Desc_art').checked)
    {
        var today = new Date();
        var day = today.getDate();
        var month = today.getMonth() + 1;
        var year = today.getFullYear();
        $('#Fecb_art').val(year+"-"+month+"-"+day);
    }
    else
    {
        $('#Fecb_art').val("1900-01-01");
    }
}
function envia()
{
    var token = '{{csrf_token()}}';
    var data={_token:token,Sku_art: $("#Sku_art").val(),
            Dart_art: $("#Dart_art").val(),
            Marc_art: $("#Marc_art").val(),
            Mode_art: $("#Mode_art").val(),
            Id_depto: $("#Id_depto").val(),
            Clas_art: $("#Clas_art").val(),
            Fami_art: $("#Fami_art").val(),
            Stok_art: $("#Stok_art").val(),
            Cant_art: $("#Cant_art").val()
        };
        $.ajax({
            type: "get",
                url: "{{route('addarticulos')}}",
                data: data,
                success: function (msg) 
                {
                    if(msg=="1")
                    {
                        toastr.success("Se agregó correctamente la información");
                        setTimeout(carga, 2000);
                    }
                    else
                    {
                        toastr.error("El articulo ya se encuentra registrado");
                        setTimeout(carga, 2000);
                    }
                }
            });
}
function actualiza()
{
    var token = '{{csrf_token()}}';
    var data={_token:token,Sku_art: $("#Sku_art").val(),
            Dart_art: $("#Dart_art").val(),
            Marc_art: $("#Marc_art").val(),
            Mode_art: $("#Mode_art").val(),
            Id_depto: $("#Id_depto").val(),
            Clas_art: $("#Clas_art").val(),
            Fami_art: $("#Fami_art").val(),
            Stok_art: $("#Stok_art").val(),
            Cant_art: $("#Cant_art").val(),
            Fecb_art: $("#Fecb_art").val()
        };
    $.ajax({
            type: "get",
                url: "{{route('updatearticulos')}}",
                data: data,
                success: function (msg) 
                {
                    toastr.success(msg);
                    setTimeout(carga, 2000);
                }
            });
    
}
function eliminar()
{
    if (confirm('Estás seguro de borrar el registro'))
	{
        var token = '{{csrf_token()}}';
        var data={_token:token,Sku_art: $("#Sku_art").val()}
        $.ajax({
            type: "get",
                url: "{{route('deletearticulos')}}",
                data: data,
                success: function (msg) 
                {
                    toastr.success(msg);
                    setTimeout(carga, 2000);
                     }
            });
	}    
}
</script>