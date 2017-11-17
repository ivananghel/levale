@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading addNewItemHeading">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#createTagModal">{{trans('tags::tags.create_tag_button')}}</button>
        </div>
        <div class="panel-body">
            @include('tags::messages.flash')
        </div>
    </div>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Title</th>
            <th colspan="2">{{trans('tags::tags.actions')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td><span class="tagTitle" style="background: {{$tag->color}}">{{$tag->title}}</span></td>

                <td>
                    <span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#editTag_{{$tag->id}}"></span></a>

                    <!-- Modal -->
                    <div id="editTag_{{$tag->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                        {{Form::open(['route' => ['tags.update',$tag->id]])}}
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title" >{{trans('tags::tags.label_title')}}</label>
                                        {{Form::text('title',$tag->title,['class' => 'form-control', 'required'])}}
                                    </div>

                                    <div class="form-group">
                                    <label for="extension">{{trans('tags::tags.label_color')}}</label>
                                    {{Form::text('color',$tag->color,['class' => 'form-control color-pick', 'required'])}}

                                </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">{{trans('units::units.save')}}</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>

                </td>
                <td>
                    {{Form::open([ 'method'  => 'DELETE', 'route' => [ 'tags.destroy', $tag->id ] ])}}
                    {{Form::button('<span class="fa fa-close"></span>', array('type' => 'submit', 'class' => 'btn btn-clear deleteUser'))}}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <!-- Modal -->
    <div id="createTagModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        {{Form::open(['route' => 'tags.store'])}}
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" >{{trans('tags::tags.label_title')}}</label>
                        {{Form::text('title',null,['class' => 'form-control','required'])}}
                    </div>
                    <div class="form-group">
                        <label for="extension">{{trans('tags::tags.label_color')}}</label>
                        {{Form::text('color',null,['class' => 'form-control color-pick', 'required'])}}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">{{trans('units::units.save')}}</button>
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
            $('#example').DataTable( {
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
