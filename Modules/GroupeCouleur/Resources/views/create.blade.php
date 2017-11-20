{{Form::open(['route' => 'groupecouleur.store'])}}

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
            {{Form::select('status',['0' => trans('units::units.disable'), '1' => trans('units::units.active')], '1',['class' => 'form-control'])}}
        </div>
    </div>
    <hr> </hr>
    <div class="row groupcolor" >
        <div class ="countcolor">
            <div class="form-group col-lg-5 " >
                <label for="title" >{{trans('groupecouleur::groupecouleur.name')}}</label>
                {{Form::text('group[0][name]',null,['class' => 'form-control','required'])}}
            </div>
            <div class="form-group  col-lg-5" >
                <label for="extension">{{trans('groupecouleur::groupecouleur.label_color')}}</label>
                {{Form::text('group[0][color]',null,['class' => 'form-control color-pick', 'required'])}}
                
            </div>
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
{{Form::close()}}

<script >
      $('.color-pick').colorpicker();

      
</script>

