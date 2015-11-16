<!-- Page specific style sheet -->
<link rel="stylesheet" href="<?=base_url()?>css/lib/fullcalendar/fullcalendar.css" />
<link href="<?=base_url()?>css/lib/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />


<div class="container-fluid container-padded dash-controls">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Vista Cronograma</a></li>
                <li class="active">Calendario</li>
            </ol>
        </div>
    </div>
</div>
<!-- Main content start -->
<div class="main-content">
<!-- Section start -->
<section>
<!-- title container start -->
<div class="container-fluid container-padded">
    <div class="row">
            <div class="col-md-12 page-title">
            <h2>Programas de Aplicación</h2>
            <hr>
        </div> <!-- col end -->
    </div> <!-- row end -->
</div>
<!-- title container end -->

<!-- section container start -->
<div class="container-fluid container-padded">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="calendar"></div>
                </div> <!-- panel body end -->
            </div> <!-- panel end -->
        </div> <!-- col end -->
    </div> <!-- row end -->
</div>
<!-- section container end -->
</section>
<!-- Section end -->
</div>


<script src="<?=base_url()?>js/lib/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
        
<!-- Bootstrap script -->
<script src="<?=base_url()?>js/lib/bootstrap/bootstrap.min.js" type="text/javascript"></script>

<!-- Slim Scroll script -->
<script src="<?=base_url()?>js/lib/slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

<!-- Date range picker script -->
<script src="<?=base_url()?>js/lib/momentjs/moment.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/daterangepicker/daterangepicker.js" type="text/javascript"></script>

<!-- Tab drop script -->
<script src="<?=base_url()?>js/lib/tabdrop/bootstrap-tabdrop.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/jquery/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/lib/fullcalendar/fullcalendar.js" type="text/javascript"></script>


<!-- Theme script -->
<script src="<?=base_url()?>js/scripts.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/randomColor.js" type="text/javascript"></script>

 <script>
$(document).ready(function () {
    
});
var BASE_URL = location.protocol + "//" + location.hostname + '/Dole/';
Date.prototype.addDays = function(days) {
    this.setDate(this.getDate() + parseInt(days));
    return this;
};
var eventos = [];
function cargarFechas(){
    $.ajax({ // ajax para consultar las cedulas del tratamiento seleccionado
        url: BASE_URL+'Calendar/obtenerCedulas/', // se manda solo con el id no ocupa mas datos
        async: false,
        type: "POST",
        dataType: 'json',
        success: function(listacedulas) {
             for (var i = 0; listacedulas.length - 1 >= i; i++) {
                var data=listacedulas[i];
                var color = randomColor({luminosity: 'dark', count: 27});
                for (var j= 0; data.length - 1 >= j; j++) {
                    var fecha = new Date(data[j][4]);
                    fecha.addDays(1); // evaluar por que hay q agregar uno  a la fuerza no agarra bien la fecha de la bd
                    var evento = {
                                "id": data[j][1],
                                "title": " Semana de Aplicación: " + data[j][3],
                                "description": "Proyecto: "+ data[j][1]+ ", Cedula tipo: " + data[j][5] + ", Descripcion de Aplicación: " + data[j][2],
                                "start": fecha,
                                "backgroundColor": color[1], //Primary (light-blue)
                                "borderColor":  color[1]//Primary (light-blue)
                             };
                    eventos.push(evento);
                 
                }  
            };           
        },
        error: function(data) {
            alert(JSON.stringify(data));
        }
    });   
}
cargarFechas();

$('#calendar').fullCalendar({
     header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
    buttonText: {//This is to add icons to the visible buttons
        prev: "<span class='fa fa-caret-left'></span>",
        next: "<span class='fa fa-caret-right'></span>",
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
    },
    events: eventos,
    eventRender: function (event, element) {
        $(element).find(".fc-event-time").remove();
        $(element).popover({
            title: '<div class="text-info" style="text-align:center"><strong>' + event.title + '</strong></div>',
            placement: 'auto',
            html: true,
            trigger: 'hover',
            animation: 'true',
            content: '<div class="text-info">Descripción de la cedula: </div>' + '<div>' + event.description + '</div>' +
                      '<div class="text-info">Fecha Programada: </div>' + event.start.getFullYear()+'-'+event.start.getMonth()+'-'+event.start.getDate() + '<div> </div>' +
                      '</div>',
            container: 'body'
        });
        $('.popover.in').remove();
    },
    editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },
        eventClick: function (calEvent, jsEvent, view) {
            
            document.location.href=BASE_URL+'Proyecto/index/'+calEvent.id;
        },
});

</script>