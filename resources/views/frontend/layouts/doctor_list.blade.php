<option value="" selected disabled>--Select Doctors--</option>
@foreach ($doctors as $item)
<option value="{{$item->id}}">{{$item->name}}</option>
@endforeach