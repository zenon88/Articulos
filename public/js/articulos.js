function actualizaguarda(accion)
{
    var cant=Number($('#Cant_art').val());
    var stok=Number($('#Stok_art').val());
    var  ban=1;
    if($('#Sku_art').val()=="")
    {
        ban=0;
        toastr.error("Capture el SKU");
        $("#Sku_art").focus();
    }
    else
    if($('#Dart_art').val()=="")
    {
        ban=0;
        toastr.error("Capture el articulo");
        $("#Dart_art").focus();
    }
    else
    if($('#Marc_art').val()=="")
    {
        ban=0;
        toastr.error("Capture la marca");
        $("#Marc_art").focus();
    }
    else
    if($('#Mode_art').val()=="")
    {
        ban=0;
        toastr.error("Capture el modelo");
        $("#Mode_art").focus();
    }
    else
    if($('#Sku_art').val()=="")
    {
        ban=0;
        toastr.error("Capture el SKU");
        $("#Sku_art").focus();
    }
    else
    if($('#Id_depto').val()==0)
    {
        ban=0;
        toastr.error("Seleccione el departamento");
        $("#Id_depto").focus();
    }
    else
    if($('#Clas_art').val()==0)
    {
        ban=0;
        toastr.error("Seleccione la clase");
        $("#Clas_art").focus();
    }
    else
    if($('#Fami_art').val()==0)
    {
        ban=0;
        toastr.error("Seleccione la familia");
        $("#Fami_art").focus();
    }
    else
    if($('#Stok_art').val()==0  || $('#Stok_art').val()=="")
    {
        ban=0;
        toastr.error("Capture el stock");
        $("#Stok_art").focus();
    }
    else
    if($('#Cant_art').val()==0  || $('#Cant_art').val()=="")
    {
        ban=0;
        toastr.error("Capture la cantidad");
        $("#Cant_art").focus();
    }
   else
   if(cant>stok)
   {
        ban=0;
        toastr.error("La cantidad no debe ser mayor al stock");
        $("#Cant_art").focus();
   }
      //Guardar
    if(ban==1)
    {
        if(accion==0)
        {
            //Guardar
            envia();
            
        }
        else
        {
            //Actualizar
            actualiza();
        }
    }

}
//Refresca la pagina
function carga()
{
	location.reload();
}