@foreach($data as $row)
<tr>
<td>{{ $row->id}}</td>
<td>{{ $row->pcode }}</td>

<td>{{ $row->pname}}</td>
<td>{{ $row->Description }}</td>

<td>{{ $row->xcolor}}</td>
<td>{{ $row->xsize }}</td>

<td>{{ $row->DPPrice}}</td>
<td>{{ $row->salesprice }}</td>

<td>{{ $row->Discount}}</td>
<td>{{ $row->vat }}</td>
<td>{{ $row->points }}</td>
<td>


 @if($row->Status=='1')
          Active
            @else
            Inactive
        @endif

</td>
<td>

<a href="{{ url('proudctlist_edit/'.$row->id.'/edit') }}">Edit</a>
</td>
<td>
  
  <button id="{{ $row->id}}" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete </button>
</td>
</tr>
@endforeach
<tr>
<td colspan="5" align="center">
{!! $data->links() !!}
</td>
</tr>
