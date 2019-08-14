<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('/images/sms.png') }}">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-theme.min.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('/css/bootstrap-datepicker.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery-confirm.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/maps/jquery-jvectormap-2.0.1.css') }}" />
    <link href="{{ asset('/css/icheck/flat/green.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/floatexamples.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="nav-md">

<div class="container body">
    <div class="main_container">
        @include('include.sidebar')
        @include('include.header')

        <div class="right_col" role="main">
        @yield('content')
            @include('include.footer')
        </div>
    </div>
</div>
<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<script src="{{ asset('/js/jquery-2.2.1.min.js') }}"></script>
{{--<script src="{{ asset('/js/nprogress.js') }}"></script>--}}
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.id.min.js') }}"></script>

<script src="{{ asset('/js/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('/js/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/custom.js') }}"></script>
<script src="{{ asset('/js/pace/pace.min.js') }}"></script>
<script src="{{ asset('/js/smsgateway.js') }}"></script>
{{--<script src="{{ asset('/js/validator/validator.js') }}"></script>--}}
<script src="{{ asset('/js/icheck/icheck.min.js') }}"></script>


{{--<script>--}}
    {{--validator.message['date'] = 'not a real date';--}}
    {{--$('form')--}}
        {{--.on('blur', 'input[required], input.optional, select.required', validator.checkField)--}}
        {{--.on('change', 'select.required', validator.checkField)--}}
        {{--.on('keypress', 'input[required][pattern]', validator.keypress);--}}

    {{--$('.multi.required')--}}
        {{--.on('keyup blur', 'input', function () {--}}
            {{--validator.checkField.apply($(this).siblings().last()[0]);--}}
        {{--});--}}

    {{--$('form').submit(function (e) {--}}
        {{--e.preventDefault();--}}
        {{--var submit = true;--}}
        {{--if (!validator.checkAll($(this))) {--}}
            {{--submit = false;--}}
        {{--}--}}

        {{--if (submit)--}}
            {{--this.submit();--}}
        {{--return false;--}}
    {{--});--}}

    {{--$('#vfields').change(function () {--}}
        {{--$('form').toggleClass('mode2');--}}
    {{--}).prop('checked', false);--}}

    {{--$('#alerts').change(function () {--}}
        {{--validator.defaults.alerts = (this.checked) ? false : true;--}}
        {{--if (this.checked)--}}
            {{--$('form .alert').remove();--}}
    {{--}).prop('checked', false);--}}
{{--</script>--}}
<script>
//    NProgress.done();
</script>

@stack('script')

</body>
</html>
