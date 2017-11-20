
{{Form::open(['route' => ['groupecouleur.update',$couleur->id]])}}
<!-- Modal content-->

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
</div>
<div class="modal-body" id="color_update">
    <div class="row" >
        <div class="form-group col-lg-8">
            <label for="title" >{{trans('groupecouleur::groupecouleur.label_title')}}</label>
            {{Form::text('title',$couleur->title,['class' => 'form-control','required'])}}
        </div>
        <div class="form-group col-lg-4" >
            <label for="extension">{{trans('groupecouleur::groupecouleur.status')}}</label>
            {{Form::select('status',['0' => trans('taskstype.disable'), '1' => trans('taskstype.active')], $couleur->status,['class' => 'form-control'])}}
            
        </div>
        
    </div>
    <hr> </hr>
    @foreach(json_decode($couleur->group_color) as $k => $col )
    <div class="row groupcolor" >
        <div class ="countcolor">
            <div class="form-group col-lg-5">
                <label for="title" >{{trans('groupecouleur::groupecouleur.name')}}</label>
                {{Form::text("group[$k][name]",$col->name,['class' => 'form-control','required'])}}
            </div>
            <div class="form-group  col-lg-5" >
                <label for="extension">{{trans('groupecouleur::groupecouleur.label_color')}}</label>
                {{Form::text("group[$k][color]",$col->color,['class' => 'form-control color-pick', 'required'])}}
                
            </div>
        </div>
        <div class="col-lg-2" >
            {{Form::button('<span class="fa fa-plus"></span>', array('type' => 'button', 'class' => 'btn btn-primary new_color','style'=>"margin-top:20px;"))}}
            {{Form::button('<span class="fa fa-close"></span>', array('type' => 'button', 'class' => 'btn btn-danger delete_color','style'=>"margin-top:20px;"))}}
        </div>
    </div>
    @endforeach 
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-default">{{trans('groupecouleur::groupecouleur.save')}}</button>
</div>

{{Form::close()}}

<script >
      $('.color-pick').colorpicker();
</script>