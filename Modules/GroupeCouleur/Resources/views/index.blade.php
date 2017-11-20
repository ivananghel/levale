@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading addNewItemHeading">
        <a href="#" ajax_target="groupecouleur/create" class="btn btn-info btn-lg  remote_modal">
            {{trans('groupecouleur::groupecouleur.create_button')}}
        </a>
    </div>
    <div class="panel-body">
        @include('groupecouleur::messages.flash')
    </div>
</div>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th colspan="2">{{trans('groupecouleur::groupecouleur.actions')}}</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($groupecouleurs as $couleur)
        <tr>
            <td>{{$couleur->id}}</td>
            <td>{{$couleur->title}}</td>
            <td>
                <a href="#" ajax_target="groupecouleur/edit/{{$couleur->id}}" class="btn btn-success pull-right remote_modal">
                    <i class="fa fa-edit"></i> 
                </a>
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

@endsection

@section('page_scripts')
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            columnDefs: [ 
            {
                targets: [ 0 ],
                orderData: [ 0, 1 ]
            },{
                targets: [ 1 ],
                orderData: [ 0, 1 ]
            }, {
                targets: [ 2 ],
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
        var clone = $(".groupcolor").first().clone().appendTo( "#color_update" );
        clone.find("input[type='text']").val("");
        $('.color-pick').colorpicker();
        $i = 0
        $(".countcolor").each(function(i_idx, i_elem) {
            var $elem = $(i_elem);
            $elem.find("input").each(function(idx, cont) {    
                var $input = $(cont);    
                $input.attr({
                    'id': function(_, id) {
                        return id + $i;
                    },
                    'name': function(_, id) {
                        return id.replace('[0]', '['+ $i +']');
                    }
                });
            });
            
            $i++;
        });
    });
    
    $(document).on('click', '.delete_color', function() {
        var n = $( "div.groupcolor" ).length;
        if(n - 1  >= 1 ){
            $(this).parents('.groupcolor').remove();
        }
        
    });
    
</script>
@endsection
