@extends('client.layouts.main')

@section('content')
<body>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script> new WOW().init(); </script>
<div id="app" data-user=@json($data) ref="div"></div>
</body>
@endsection
<script>
</script>