//creamos un variable
var tabla;
//creamos una funcion init(){}
function init(){
  //cuando enviamos los datos por el formulario con submit
$("#producto_form").on("submit",function(e){
  //ejecutamos el metodo para guardar que esta en este acrchivo
  guardaryeditar(e);
});
}
//creamos un document ready
//cuando el docmento este cargado,llamos a nuestro elemento data tabla
$(document).ready(function(){
    tabla=$('#producto_data').dataTable({
"aProcessing": true,//activamos el procesamiento del datatables
"aServerSide": true,//Paginación y filtrado realizado por el servidor
dom:'Bfrtip',
buttons:[
'copyHtml5', 
'excelHtml5',
'csvHtml5',
'pdf'
],

    "ajax":{
        url:'../../controller/producto.php?op=listar',
        type:"get",
        dataType:"json",
        error:function(e){
            console.log(e.responseText);
        }

    },
    "bDestroy":true,
    "responsive":true,
    "bInfo":true,
    "iDisplayLength":10,//por cada 10 registros hace una paginacion
    "order":[[0,"asc"]],//Ordenar (columna,orden)
    "language":{
        "sProcessing": "Procesando...",
        "sLengthMenu": "Motrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands":"Cargando...",
        "oPaginate":{
            "sFirst":"Primero",
            "sLast":"Último",
            "sNext":"Siguiente",
            "sPrevious":"Anterior"
        },
        "oAria":{
            "sSortAscending":": Activar para ordenar la columna  de manera ascendente",
            "sSortDescending":": Activar para ordenar la columna  de manera descendente"
        }
    }
    }).dataTable();
});

function guardaryeditar(e){
  //con esto prevenimos que no guarde 2 veces 
  e.preventDefault();
  //luego declaramos una variable 
  var formData=new FormData($("#producto_form")[0]);
  //llamamos a un ajax

  $.ajax({
    url:"../../controller/producto.php?op=guardaryeditar",
    type:"POST",
    data:formData,
    contentType:false,
    processData:false,
    success:function(datos){
      //leugo de gurdar reseteamos el formulario
      $('#producto_form')[0].reset();
      //escondemos la ventana modal
      $("#modalmantenimiento").modal('hide');
      //es para que recargue la tabla
      $('#producto_data').DataTable().ajax.reload();

      swal.fire(
        'Registro!',
        'Se registro correctamente!',
        'success'
      )
    }
  });

}


function editar(prod_id){
    console.log(prod_id);
}


function eliminar(prod_id){
swal.fire({
    title: 'CRUD',
    text: "Estas seguro de eliminar el registro?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, Eliminar!',
    cancelButtonText: 'No, Cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
       $.post("../../controller/producto.php?op=eliminar",{prod_id:prod_id},function(data){

       });
        //una vez que se elimina queremos que se actualice con ajax
        $('#producto_data').DataTable().ajax.reload();
        
      swal.fire(
        'Eliminado!',
        'El registro se elimino correctamente.',
        'success'
      )
      
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swal.fire(
        'cancelado',
        'Tu producto  está a salvo :)',
        'error'
      )
    }
  })


}

//ahora utlizamos los datos de la documentacion
$(document).on("click","#btnnuevo",function(){
    $('#mdltitulo').html("Nuevo Registro");   
$('#modalmantenimiento').modal("show");
});

init();