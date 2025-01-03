<script src="{{ getDynamicAsset('assets/libs/jquery/jquery.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ getDynamicAsset('assets/libs/bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ getDynamicAsset('assets/libs/swiper/swiper-bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ getDynamicAsset('assets/js/slider-init.js') }}" crossorigin="anonymous"></script>

<script>
    var notyf = new Notyf();

</script>

@if($errors->any())
    <script>
        @foreach($errors-> all() as $error)
        notyf.error("{{ $error }}");
        @endforeach
    </script>
@endif
