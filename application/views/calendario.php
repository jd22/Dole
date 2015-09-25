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
            <h2>Cronograma de Eventos</h2>
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
<script src="<?=base_url()?>js/pages/ui_calendar.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/pages/lang-all.js" type="text/javascript"></script>

<!-- Theme script -->
<script src="<?=base_url()?>js/scripts.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/Dole/dole.js" type="text/javascript"></script>

 <script>
$(document).ready(function () {
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
$('#calendar').fullCalendar('renderEvent', {
       title: 'All Day Event',
        start: new Date(y, m, 1),
        backgroundColor: "#f56954", //red 
        borderColor: "#f56954" //red
    }, true);
});
</script>