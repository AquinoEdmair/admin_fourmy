<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/bootstrap-multiselect.js') }}" type="text/javascript"></script>
  <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker.standalone.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-multiselect.css')}}" type="text/css"/>
    <link href="{{asset('/css/bootstrap-multiselect.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

    <script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        defaultViewDate: {
         year: "1980",
         month: "1",
         day: "0",
         },
        autoclose: true
    });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-multiple-selected').multiselect();
        });
    </script>
<!-- Optionally, you can add Slimscroll and FastClick plugins. 
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->