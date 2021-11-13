@foreach($data as $row)
<tr>
<td>{{ $row->productid }}</td>
<td>{{ $row->proudctname }}</td>

<td>{{ $row->productbrand}}</td>
<td>{{ $row->productquantity }}</td>

<td>{{ $row->galleryimage}}</td>

<td>

<a href="{{ url('proudctlist_edit/'.$row->productid .'/edit') }}">Edit</a>  <button id="{{ $row->productid }}" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete </button>
</td>
</tr>
@endforeach
<tr>
<td colspan="5" align="center">
{!! $data->links() !!}
</td>
</tr>
