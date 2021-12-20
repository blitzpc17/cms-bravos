@extends('layouts.body')
@section('title', 'Procesos')

@section('seccion', 'Cátalogo de procesos')

@section('bread')
 <a class="breadcrumb-item" href="">Cátalogos</a>
  <span class="breadcrumb-item active">Procesos</span>

@endsection

@push('css')
<!-- dataTables CSS -->
<link type="text/css" rel="stylesheet" href="{{asset('assets/plugins/dataTable/datatables.min.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('assets/plugins/dataTable/extensions/dataTables.jqueryui.min.css')}}">
<style>
    table thead th{
        text-align:center;        
    }
</style>
@endpush

@section('contenido')

<div class="row row-xs clearfix">
     <!--================================-->
     <!-- Basic Form Start -->
     <!--================================-->
     <div class="col-md-12 col-lg-12">
        <div class="card mg-b-30">
           <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                 <div>
                    <h6 class="card-header-title tx-13 mb-0">Cátalogo de estados</h6>
                 </div>                 
              </div>
           </div>
           <div class="card-body">
                <div class="header-right pull-right">
                    <ul class="list-inline justify-content-end">  
                         <li>
                             <button id="btn-add" class="btn btn-primary">Agregar nuevo registro</button>
                         </li>  
                    </ul>
                </div>

                <div class="table-responsive">
                    <table id="table-registros" class="table" style="width:100%">
                        <thead>
                            <th >#</th>
                            <th >Nombre</th>
                            <th >Acciones</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
           </div>
        </div>
      </div>  
 </div>




<!-- modals-->

<!-- Modal -->
<div class="modal fade" id="mod-registro" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <form id="frm-submit" class="">
                    @csrf
                    <div class="form-group">
                      <label for="">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId">                      
                      <div id="nombre_err"></div>
                    </div>
                    <input type="hidden" name="op" id="op">
                    <input type="hidden" name="id" id ="id">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btn-save" class="btn btn-primary">Guardar</button>
                </form>
            </div>                
        </div>
    </div>
</div>

@endsection

@push('js')
<!-- dataTables Script -->
    <script src="{{asset('assets/plugins/dataTable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/dataTable/responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('assets/plugins/dataTable/extensions/dataTables.jqueryui.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            ListarRegistros();
            
            $('#btn-add').on('click', function(){
                $('.modal-title').text('Agregar registro');
                $('#op').val('I');
                $('#mod-registro').modal('toggle');
            });

            $('#frm-submit').on('submit', function(e){
                 e.preventDefault();
                var form  = new FormData(this);
                 $.ajax({                     
                     url: "{{route('procesos.save')}}",
                     method: "POST",
                     data: new FormData(this),
                     contentType:false,
                     cache:false,
                     processData:false,
                     dataType: "json",                     
                 }).done(function(res){
                    AjaxDoneResponses(res);
                 }).fail(function(res){
                     alert('Error interno. Intente nuevamente o levante ticket de soporte.');
                    $('#btn-save').prop("disabled", true);
                 });
            });

            $('#mod-registro').on('hidden.bs.modal', function () {
                LimpiarFormulario();
            });






        });



        function ListarRegistros(){
            $.get("{{route('procesos.listar')}}", function (data) {
                var html = '';
                $.each(data, function (index, value) { 
                    var numeral = index+1;
                     html += '<tr>'+
                             '<td style="text-align:center; width:5%;">'+numeral+'</td>'+ 
                             '<td style="width:65%;">'+value.nombre+'</td>'+
                             '<td style="text-align:center; width:30%;">'+
                                '<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Modificar" onclick="Modificar('+value.id+')"><i class="fa fa-edit"></i></button>'+
                                '<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="Eliminar('+value.id+')"><i class="fa fa-trash"></i></button>'+
                             '</td>'+                             
                             '</tr>';
                });
                $('#table-registros').DataTable().destroy();
                $('#table-registros tbody').empty();       
                $('#table-registros tbody').append(html);
                $('#table-registros').DataTable({
                    "language": {
                        "url": "{{asset('assets/json/DataTables-Spanish.json')}}"
                    },
                    "bDestroy": true,
                    scrollY:550,
                    autoWidth: true
                    
                });
                 $('[data-toggle="tooltip"]').tooltip()

            });
        }

        function AjaxDoneResponses(data){
            var titulo = "";
            var tipo="";
            switch(data.code){
                case 200:
                    titulo =  "Realizado";
                    tipo="success";
                break;
                case 400:
                    titulo = "Advertencia";
                    tipo="warning";
                break;
                case 500:
                    titulo = "Error";
                    tipo="danger";
                break;
            }
            Swal.fire({
                        title: titulo,
                        text: data.msj,
                        type: tipo,

                    }).then(function(){
                        if(data.code==200){
                            ListarRegistros();
                            $('#mod-registro').modal('hide');
                        }else if(data.code==400){
                            MostrarValdiaciones(data.validations);
                        }
                        $('#btn-save').prop("disabled", false);
                    });
        }

        function LimpiarFormulario(){
            $('#frm-submit')[0].reset(); 
            BorrarValidaciones();          
        }
        function BorrarValidaciones(){
            $('input').removeClass("is-invalid");
            $('textarea').removeClass("is-invalid");
            $('select').removeClass("is-invalid");
            $('.text-muted').text('');
        }

        function MostrarValdiaciones(msg){
            BorrarValidaciones();
            $.each( msg, function( key, value ) {
              $('#'+key+'_err').text(value);
              $('#'+key+'_err').addClass('invalid-feedback');
              $('#'+key).addClass('is-invalid');

            });
        }

        function Eliminar(id){
          
            Swal.fire({
                title:"Advertencia",
                text:"¿Desea confirmar la eliminación?",
                type:"warning",
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: 'No'
            }).then(function (result) {
                if (result.value) {
                    $.get("{{url('procesos/eliminar')}}/"+id,function (data) {
                        AjaxDoneResponses(data);  
                    });
                }else{
                    Swal.fire('Aviso', 'Se ha cancelado la operación', 'info');
                }
            });
            
        }

        function Modificar(id){
            $.get("{{url('procesos/get')}}/"+id,function (data) {
                LimpiarFormulario();
                $('#nombre').val(data.nombre);
                $('#id').val(data.id);
                $('#op').val('M');
                $('.modal-title').text('Modificar registro');
                $('#mod-registro').modal('show');
            });
        }

    </script>

@endpush