@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading addNewItemHeading">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#createGroupeCouleur">{{trans('groupecouleur::groupecouleur.create_button')}}</button>
        </div>
        <div class="panel-body">
            @include('groupecouleur::messages.flash')
        </div>
    </div>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Title</th>
            <th colspan="2">{{trans('groupecouleur::groupecouleur.actions')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($groupecouleurs as $couleur)
            <tr>
                <td><span class="tagTitle" style="background: {{$couleur->color}}">{{$couleur->title}}</span></td>

                <td>
                    <span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#coulerGroupe_{{$couleur->id}}"></span></a>

                    <!-- Modal -->
                    <div id="coulerGroupe_{{$couleur->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                        {{Form::open(['route' => ['groupecouleur.update',$couleur->id]])}}
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                <div class="row" >
                                <div class="form-group col-lg-8">
                                    <label for="title" >{{trans('groupecouleur::groupecouleur.label_title')}}</label>
                                    {{Form::text('title',$couleur->title,['class' => 'form-control','required'])}}
                                </div>
                                <div class="form-group col-lg-4" >
                                    <label for="extension">{{trans('groupecouleur::groupecouleur.status')}}</label>
                                    {{Form::select('status',['0' => trans('taskstype.disable'), '1' => trans('taskstype.active')], '0'),$couleur->status}}
            
                                </div>
                                
                            </div>
                                <hr> </hr>
                            <div class="row groupcolor" >

                          @foreach($couleur->group_color as $col) 
                          
                        {{dd($co)}}
                                <div class="form-group col-lg-5">
                                    <label for="title" >{{trans('groupecouleur::groupecouleur.name')}}</label>
                                    {{Form::text('group["name"]',$col->name,['class' => 'form-control','required'])}}
                                </div>
                                <div class="form-group  col-lg-5" >
                                    <label for="extension">{{trans('groupecouleur::groupecouleur.label_color')}}</label>
                                    {{Form::text('group["color"]',$col->color,['class' => 'form-control color-pick', 'required'])}}
            
                                </div>
                                <div class="col-lg-2" >
                                {{Form::button('<span class="fa fa-plus"></span>', array('type' => 'button', 'class' => 'btn btn-primary new_color','style'=>"margin-top:20px;"))}}
                                {{Form::button('<span class="fa fa-close"></span>', array('type' => 'button', 'class' => 'btn btn-danger delete_color','style'=>"margin-top:20px;"))}}
                               
                                </div>
                                <!-- @endforeach -->
                            </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">{{trans('groupecouleur::groupecouleur.save')}}</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>

                </td>
                <td>
                    {{Form::open([ 'method'  => 'DELETE', 'route' => [ 'groupecouleur.destroy', $couleur->id ] ])}}
                    {{Form::button('<span class="fa fa-close"></span>', array('type' => 'submit', 'class' => 'btn btn-clear deleteUser'))}}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <!-- Modal -->
    <div id="createGroupeCouleur" class="modal fade" role="dialog">
        <div class="modal-dialog">
        {{Form::open(['route' => 'groupecouleur.store'])}}
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" id="color_update">
                <div class="row" >
                    <div class="form-group col-lg-8">
                        <label for="title" >{{trans('groupecouleur::groupecouleur.label_title')}}</label>
                        {{Form::text('title',null,['class' => 'form-control','required'])}}
                    </div>
                    <div class="form-group col-lg-4" >
                        <label for="extension">{{trans('groupecouleur::groupecouleur.status')}}</label>
                        {{Form::select('status',['0' => trans('units::units.disable'), '1' => trans('units::units.active')], '1')}}

                    </div>
                    
                </div>
                    <hr> </hr>
                <div class="row groupcolor" >
                    <div class="form-group col-lg-5">
                        <label for="title" >{{trans('groupecouleur::groupecouleur.name')}}</label>
                        {{Form::text('group[1][name]',null,['class' => 'form-control','required'])}}
                    </div>
                    <div class="form-group  col-lg-5" >
                        <label for="extension">{{trans('groupecouleur::groupecouleur.label_color')}}</label>
                        {{Form::text('group[1][color]',null,['class' => 'form-control color-pick', 'required'])}}

                    </div>
                    <div class="col-lg-2" >
                    {{Form::button('<span class="fa fa-plus"></span>', array('type' => 'button', 'class' => 'btn btn-primary new_color','style'=>"margin-top:20px;"))}}
                    {{Form::button('<span class="fa fa-close"></span>', array('type' => 'button', 'class' => 'btn btn-danger delete_color','style'=>"margin-top:20px;"))}}
                   
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">{{trans('groupecouleur::groupecouleur.save')}}</button>
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
                content: '<p style="text-align:center;font-size:20px;">{{ trans('groupecouleur::groupecouleur.are_you_sure') }}</p>',
                buttons: {
                    yes: {
                        text: '{{trans('groupecouleur::groupecouleur.confirmation_yes')}}',
                        btnClass: 'btn-danger',
                        action: function () {
                            $this.parent().submit();
                        }
                    },
                    no: {
                        text: '{{trans('groupecouleur::groupecouleur.confirmation_no')}}',
                        btnClass: 'btn-blue',
                        action: function () {

                        }
                    }
                }
            });
        });


        $(document).on('click','.new_color',function(){
            console.log('aa');
            var clone = $( ".groupcolor:first" ).clone().appendTo( "#color_update" );
	            clone.find("input[type='text']").val("");
                $('.color-pick').colorpicker();

        })

        $(document).on('click', '.delete_color', function() {
            var n = $( "div.groupcolor" ).length;
            if(n - 1  >= 1 ){
                $(this).parents('.groupcolor').remove();
            }
            
});
    </script>
@endsection
