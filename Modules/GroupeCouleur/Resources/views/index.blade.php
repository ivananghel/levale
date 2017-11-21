@extends('layouts.app')
@section('content')
<style>
    .paginate_button {
        box-sizing: border-box;
        display: inline!important;
        min-width: 1.5em;
        padding: 0px!important;
        margin-left: 0px!important;;
        text-align: center;
        text-decoration: none !important;
        cursor: pointer;
        *cursor: hand;
        color: #333 !important;
        border: 1px solid transparent;
        border-radius: 2px;
        padding-right: 0px !important;
    }
    .pagination > li {
        display: inline !important;
    }
    .dataTables_info {
      
        padding-top: 30px!important;
        font-size: 14px;
        font-weight: 700;
        font-style: italic;
        color: #969696;
    }
    
   
</style>

</style>
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
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
    
    <table id="datatable_fixed_column" class="display"  width="100%" >
        <thead>
            <tr>
                <th class="hasinput" >
                    <input type="text" class="form-control"  style="width:100%!important" placeholder="{{ trans('groupecouleur::groupecouleur.filter_id') }}" />
                </th>
                <th class="hasinput" >
                    <input type="text" class="form-control"   style="width:100%!important" placeholder="{{ trans('groupecouleur::groupecouleur.filter_title') }}" />
                </th>
                <th class="hasinput"  >
                    <label class="select" style="width:100%!important">
                        <select >
                            <option value="">{{ trans('groupecouleur::groupecouleur.filter_status') }}</option>
                            <option value="0">{{trans('groupecouleur::groupecouleur.disable')}}</option>
                            <option value="1">{{trans('groupecouleur::groupecouleur.active')}}</option>
                            
                        </select>
                        <i></i>
                    </label>
                </th>
                
                <th style="max-width:13%">
                </th>
            </tr>
            <tr>
                <th  data-hide="phone"> {{trans('groupecouleur::groupecouleur.id')}}</th>
                <th   data-class="expand" >{{trans('groupecouleur::groupecouleur.title')}}</th>
                <th data-hide="phone,tablet">{{trans('groupecouleur::groupecouleur.status')}}</th>
                <th style="width:10%;">{{trans('groupecouleur::groupecouleur.action')}}</th>
            </tr>
        </thead>
    </table>
    
    
</article>
@endsection

@section('page_scripts')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.colVis.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.tableTools.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables/datatables.responsive.min.js')}}"></script>

<script>
    var otable;
    $(document).ready(function () {
        
        pagenumbner = (localStorage.getItem('List')) ? localStorage.getItem('List') : 0;
        /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;
        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };
        /* COLUMN FILTER  */
        
        otable = $('#datatable_fixed_column').DataTable({
            "ajax": {
                url: 'groupecouleur/table',
                type: 'POST',
                data: function (d) {
                    d.page = pagenumbner + 1;
                }
            },
            "pageLength": 15,
            'displayStart': pagenumbner * 15,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "order": [[2, 'desc']],
            "sDom": "" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_fixed_column) {
                    responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_datatable_fixed_column.respond();
                $("[rel=tooltip]").tooltip();
            }
        });
        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on('keyup', function (e) {
            if (e.keyCode == 13) {
                otable.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            }
        });
        $("#datatable_fixed_column thead th select").on('change', function (e) {
            otable.column($(this).parent().parent().index() + ':visible')
            .search(this.value)
            .draw();
        });
        $('.datepicker').on('change', function () {
            otable.column($(this).parent().index() + ':visible')
            .search(this.value)
            .draw();
        });
        $('#datatable_fixed_column').on('page.dt', function () {
            localStorage.setItem('List', otable.page.info().page);
        });
        
    });
    
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script>
    $(document).on('click','.delete-color',function(e){
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
