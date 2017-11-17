@if ($message = Session::get('success'))
    {{--<div class="alert alert-success alert-block">--}}
    {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
    {{--<strong>{{ $message }}</strong>--}}
    {{--</div>--}}
    <script>
        notif({
            msg: "{{ $message }}",
            type: "success",
            animation: 'slide',
            timeout: 3000

        });
    </script>
@endif

@if ($message = Session::get('error'))
    {{--<div class="alert alert-danger alert-block">--}}
    {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
    {{--<strong>{{ $message }}</strong>--}}
    {{--</div>--}}

    <script>
        notif({
            msg: "{{ $message }}",
            type: "error",
            animation: 'slide',
            timeout: 3000

        });
    </script>
@endif

@if ($message = Session::get('warning'))
    {{--<div class="alert alert-warning alert-block">--}}
    {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
    {{--<strong>{{ $message }}</strong>--}}
    {{--</div>--}}
    <script>
        notif({
            msg: "{{ $message }}",
            type: "warning",
            animation: 'slide',
            timeout: 3000

        });
    </script>
@endif

@if ($message = Session::get('info'))
    {{--<div class="alert alert-info alert-block">--}}
    {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
    {{--<strong>{{ $message }}</strong>--}}
    {{--</div>--}}

    <script>
        notif({
            msg: "{{ $message }}",
            type: "info",
            animation: 'slide',
            timeout: 3000

        });
    </script>
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif