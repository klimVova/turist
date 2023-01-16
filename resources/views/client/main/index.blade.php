@extends('client.layouts.main')

@section('content')
<body>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script> new WOW().init(); </script>
<div id="app"></div>
</body>
@endsection