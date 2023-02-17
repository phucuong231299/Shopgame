@extends('layout.loadmin')
@section('main')

<h5 class="card-header">Tháng: </h5>
@foreach($thang as $item)
<td>
  <form action="{{ route('thang.update', $item->id) }}">
      @csrf @method('PUT')
      <select class="custom-select form-control" id="trangthai" name="trangthai">
        @if ($item->thang == 1)
        <option value="{{$item->thang}}">Tháng 1</option>
        @endif
        @if ($item->thang == 2)
        <option value="{{$item->thang}}">Tháng 2</option>
        @endif 
        @if ($item->thang == 3)
        <option value="{{$item->thang}}">Tháng 3</option>
        @endif 
        @if ($item->thang == 8)
        <option value="{{$item->thang}}">Tháng 8</option>
        @endif 
      </select>
      <button type="submit" style="background-color: purple; color: white;" class="btn btn-secondary">Cập nhật</button>
  </form>
</td>
@endforeach
  @endsection