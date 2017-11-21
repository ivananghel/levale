{{Form::open([ 'method'  => 'DELETE', 'route' => [ 'groupecouleur.destroy', $id ] ])}}
{{Form::button('<span class="fa fa-trash-o"></span>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs pull-right delete-color ', 'style'=>'padding:4px  !important;margin-left:3px;'))}}
{{ Form::close() }}


<a href="#" ajax_target="{{ $resource }}/edit/{{ $id }}" class="btn btn-success pull-right  remote_modal" style="padding:4px  !important;margin-left:3px;">
    <i class="fa fa-edit"> </i>
</a>

