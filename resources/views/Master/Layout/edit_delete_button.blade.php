<?php
$segment=Request::segment(1);
?>
<td id="td_action">

	@can($segment.'.show')
	<a href="{{url($segment.'/'.$id)}}"class="btn btn-info"> 
	<i class="feather icon-eye"></i>
	</a>
	&nbsp
	@endcan
	
	@can($segment.'.edit')
	<button type="button"  class="btn btn-warning  edit"   data-toggle="tooltip"  data-html="true"  data-original-title="Ubah <em><u>{{$tooltip}}</u></em>" data-tooltip="{{$tooltip}}"  data-id="{{$id}}">
		<i class="feather icon-edit"></i>
	</button>
	&nbsp 
	@endcan

	@can($segment.'.destroy')
	{!! Form::open(['method' => 'DELETE','route' => [$segment.'.destroy', $id],'style'=>'display:inline','id'=>'form_delete'.$id]) !!}
	{{ Form::button('<i class="feather icon-trash"></i>', [ 'class' => 'btn btn-danger delete',
	 'data-toggle'=>'tooltip',
	 'data-id'=>$id,
	 'data-tooltip'=> $tooltip,
	 'data-html'=>'true',
	 'data-original-title'=>'Hapus <em><u>'.$tooltip.'</u></em>',
	 'id'=>'btn_delete'
	 ]) }} 
	{!! Form::close() !!}
	@endcan 

</td>
