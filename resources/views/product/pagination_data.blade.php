<?php $i=0; ?>
@foreach($data as $row)
{{$i++}}
<tr>
<td>{{ $i}}</td>
<td>{{ $row->PoductGroupName }}</td>
<td>


 @if($row->Status=='1')
          Active
            @else
            Inactive
        @endif

</td>
<td>
<button id="{{ $row->ID}}" class="btn btn-info btn-xs update"><i class="fa fa-pencil"></i> Edit </button>

</td>
<td>
  
  <button id="{{ $row->ID}}" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete </button>
</td>
</tr>
@endforeach
<tr>
<td colspan="5" align="center">
{!! $data->links() !!}
</td>
</tr>
