@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading addNewItemHeading">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">{{trans('taskstype.create_unit')}}</button>
        </div>
        <div class="panel-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('info'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
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
        </div>
    </div>
    <table id="tasksTable" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th colspan="2">Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{$task->title}}</td>
                <td>{{$task->status == '0' ? trans('taskstype.disable') : trans('taskstype.active')}}</td>
                <td>
                    <span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#editUnit_{{$task->id}}"></span></a>

                    <!-- Modal -->
                    <div id="editUnit_{{$task->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                        {{Form::open(['route' => ['tasks.update',$task->id]])}}
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title" >{{trans('taskstype.modal_title')}}</label>
                                        {{Form::text('title',$task->title,['class' => 'form-control'])}}
                                    </div>


                                    <div class="form-group">
                                        <label for="extension">{{trans('taskstype.modal_status')}}</label>
                                        {{Form::select('status',['0' => trans('taskstype.disable'), '1' => trans('taskstype.active')], '0'),$task->status}}

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">{{trans('taskstype.save')}}</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>

                </td>
                <td>
                    {{Form::open([ 'method'  => 'DELETE', 'route' => [ 'tasks.destroy', $task->id ] ])}}
                    {{Form::button('<span class="fa fa-close"></span>', array('type' => 'submit', 'class' => 'btn btn-clear deleteUser'))}}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        {{Form::open(['route' => 'tasks.store'])}}
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" >{{trans('taskstype.modal_title')}}</label>
                        {{Form::text('title',null,['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label for="extension">{{trans('taskstype.modal_status')}}</label>
                        {{Form::select('status',['0' => trans('units::units.disable'), '1' => trans('units::units.active')], '0')}}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">{{trans('taskstype.save')}}</button>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>



    {{--Edit modal--}}


@endsection

@section('page_scripts')
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#tasksTable').DataTable( {
                columnDefs: [ {
                    targets: [ 0 ],
                    orderData: [ 0, 1 ]
                }, {
                    targets: [ 1 ],
                    orderData: [ 1, 0 ]
                }, {
                    targets: [ 3 ],
                    orderData: [ 3, 0 ]
                } ]
            } );
        } );
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script>
        $(".deleteUser").click(function (e) {
            e.preventDefault();
            $this = $(this);
            $.confirm({
                title: '',
                content: '<p style="text-align:center;font-size:20px;">{{ trans('units::units.are_you_sure') }}</p>',
                buttons: {
                    yes: {
                        text: '{{trans('units::units.confirmation_yes')}}',
                        btnClass: 'btn-danger',
                        action: function () {
                            $this.parent().submit();
                        }
                    },
                    no: {
                        text: '{{trans('units::units.confirmation_no')}}',
                        btnClass: 'btn-blue',
                        action: function () {

                        }
                    }
                }
            });
        });
    </script>
@endsection
