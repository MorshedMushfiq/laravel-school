<script src="{{URL::to('dashboard/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::to('dashboard/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
</body>

</html>