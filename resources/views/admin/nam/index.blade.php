@extends('layout.loadmin')
@section('main')

<h5 class="card-header">Năm: </h5>
@foreach($nam as $item)
<form action="{{ route('nam.update', $item->id) }}">
  @csrf @method('PUT')
  <select class="custom-select form-control" id="trangthai" name="trangthai">
    @if ($item->nam == 1)
    <option value="{{$item->nam}}">Tháng 1</option>
    <option value="2">không hiển thị</option>
    <option value="3">không hiển thị</option>
    <option value="4">không hiển thị</option>
    <option value="5">không hiển thị</option>
    <option value="6">không hiển thị</option>
    <option value="7">không hiển thị</option>
    <option value="8">không hiển thị</option>
    <option value="9">không hiển thị</option>
    <option value="10">không hiển thị</option>
    <option value="11">không hiển thị</option>
    <option value="12">không hiển thị</option>
@else
    <option value="{{$item->nam}}">tháng {{$item->nam}}</option>
    <option value="2">không hiển thị</option>
    <option value="3">không hiển thị</option>
    <option value="4">không hiển thị</option>
    <option value="5">không hiển thị</option>
    <option value="6">không hiển thị</option>
    <option value="7">không hiển thị</option>
    <option value="8">không hiển thị</option>
    <option value="9">không hiển thị</option>
    <option value="10">không hiển thị</option>
    <option value="11">không hiển thị</option>
    <option value="12">không hiển thị</option>
@endif
  </select>
  <button type="submit" style="background-color: purple; color: white;" class="btn btn-secondary">Cập nhật</button>
</form>
@endforeach
  @endsection