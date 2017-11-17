<!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
<!--script(src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js")-->
<!-- Include all compiled plugins (below), or include individual files as needed-->
<!--script(src="https://code.jquery.com/ui/1.12.1/jquery-ui.js")-->
<script src="{{asset('assets/plugins/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/plugins/jquery/jquery-ui.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/plugins/owlcarousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/plugins/formstyler/js/jquery.formstyler.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/responsivetabs/js/jquery.responsivetabs.js')}}"></script>
<script src="{{asset('assets/plugins/mmenu/jquery.mmenu.min.js')}}"></script>
<script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets/plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{asset('assets/plugins/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('assets/plugins/wnumb/wNumb.js')}}"></script>
<script src="{{asset('assets/plugins/jscrollpane/script/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/plugins/jscrollpane/script/mwheelIntent.js')}}"></script>
<script src="{{asset('assets/plugins/jscrollpane/script/jquery.jscrollpane.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
@yield('scripts')

<script>

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            beforeSend: function () {
                // Handle the complete event
                // alert('ajax before!');
            },
            complete: function () {
                // Handle the complete event
                // alert('ajax complete!');
            }
        });
    });

</script>