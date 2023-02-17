@extends('layout.loadmin')
@section('main')
    <h5 style="text-align: center" class="card-header">Sản phẩm sắp ra mắt</h5>
    <a href="{{ route('slide.create') }}" class="btn btn-primary mb-3">Thêm</a>
    <div class="card">

        <div class="table">
            <table id="example1" class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th width="10%" scope="col">Ảnh chủ đề</th>
                        <th width="10%" scope="col">ID</th>
                        <th width="20%" scope="col">Tên sản phẩm</th>
                        <th width="10%" scope="col">Giá tiền</th>
                        <th width="10%" scope="col">Phiên bản</th>
                        <th width="10%" scope="col">Trạng thái</th>
                        <th width="10%" scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($slide as $item)
                        <tr>
                            <td><img style="width: 150px" src="{{ url('public/slide') }}/{{ $item->anh }}" alt=""></td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->tensp }}</td>
                            <td>{{ $item->giatien }}$</td>
                            <td>{{ $item->phienban }}</td>
                            @if ($item->status == 0)
                                <td>Ẩn</td>
                            @else
                                <td>Hiện</td>
                            @endif
                            <td> <a href="{{ route('slide.edit', $item->id) }}" class="btn btn-danger">Sửa</a> </td>
                            <td> <a href="{{ route('slide.destroy', $item->id) }}"
                                    class="btn btn-warning btndelete">Xóa</a>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form method="POST" action="" id="form-delete">
                @csrf @method('DELETE')
                <form>
        </div>
    </div>
    {{-- -------------------------------------------------------------- --}}
    <hr>
    <h5 style="text-align: center" class="card-header">Slide</h5>
    <a href="{{ route('bia.create') }}" class="btn btn-primary mb-3">Thêm</a>
    <div class="card">
        <div class="table">
            <table id="example1" class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th width="10%" scope="col">Ảnh chủ đề</th>
                        <th width="10%" scope="col">ID</th>
                        <th width="20%" scope="col">Tựa đề</th>
                        <th width="20%" scope="col">Tóm tắt</th>
                        <th width="10%" scope="col">Trạng thái</th>
                        <th width="10%" scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($bia as $item)
                        <tr>
                            <td><img style="width: 150px" src="{{ url('public/bia') }}/{{ $item->anh }}" alt=""></td>
                            <td>{{ $item->id }}</td>
                            <td>{!! $item->tuade !!}</td>
                            <td>{!! $item->tomtat !!}</td>
                            @if ($item->status == 0)
                                <td>Ẩn</td>
                            @else
                                <td>Hiện</td>
                            @endif
                            <td> <a href="{{ route('bia.edit', $item->id) }}" class="btn btn-danger">Sửa</a> </td>
                            <td> <a href="{{ route('bia.destroy', $item->id) }}"
                                    class="btn btn-warning btndelete">Xóa</a>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form method="POST" action="" id="form-delete">
                @csrf @method('DELETE')
                <form>
        </div>

    </div>

    {{-- -------------------------------------------------------------- --}}
    <hr>
    <h5 style="text-align: center" class="card-header">About</h5>
    <a href="{{ route('about.create') }}" class="btn btn-primary mb-3">Thêm</a>
    <div class="card">
        <div class="table">
            <table id="example1" class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th width="10%" scope="col">Ảnh chủ đề</th>
                        <th width="10%" scope="col">ID</th>
                        <th width="20%" scope="col">Tựa đề</th>
                        <th width="20%" scope="col">Nội dung</th>
                     
                        <th width="10%" scope="col"></th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><img style="width: 150px" src="{{ url('public/about') }}/{{ $about->anh }}" alt=""></td>
                        <td>{{ $about->id }}</td>
                        <td>{!! $about->tuade !!}</td>
                        <td>{!! $about->noidung !!}</td>
                   
                        <td> <a href="{{ route('about.edit', $about->id) }}" class="btn btn-danger">Sửa</a> </td>
                        </td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    {{-- -------------------------------------------------------------- --}}
    <hr>
    <h5 style="text-align: center" class="card-header">About 2</h5>
    <a href="{{ route('about2.create') }}" class="btn btn-primary mb-3">Thêm</a>
    <div class="card">
        <div class="table">
            <table id="example1" class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th width="10%" scope="col">Ảnh chủ đề</th>
                        <th width="10%" scope="col">ID</th>
                        <th width="20%" scope="col">Tựa đề</th>
                        <th width="20%" scope="col">Nội dung</th>
                     
                        <th width="10%" scope="col"></th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><img style="width: 150px" src="{{ url('public/about2') }}/{{ $about2->anh }}" alt=""></td>
                        <td>{{ $about2->id }}</td>
                        <td>{!! $about2->tuade !!}</td>
                        <td>{!! $about2->noidung !!}</td>
                        <td> <a href="{{ route('about2.edit', $about2->id) }}" class="btn btn-danger">Sửa</a> </td>
                        </td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

    {{-- -------------------------------------------------------------- --}}
    <hr>
    <h5 style="text-align: center" class="card-header">Footer</h5>
    <a href="{{ route('footer.create') }}" class="btn btn-primary mb-3">Thêm</a>
    <a href="{{ route('footer.edit', $footer->id) }}" class="btn btn-danger mb-3">Sửa</a>
    <div class="card">
        <table id="example1" class="table table-bordered mb-0">
            <thead>
                <tr>

                    <td width="10%" scope="col">{!! $footer->gioithieu !!}</td>

                </tr>
            </thead>
            <thead>

                <tr>
                    <td>{!! $footer->diachi !!}</td>
                </tr>

            </thead>
        </table>
        <table id="example1" class="table table-bordered mb-0">
            <thead>
                <tr>

                    <td width="10%" scope="col">{!! $footer->muahangtragop !!}</td>

                </tr>
            </thead>
            <thead>

                <tr>
                    <td>{!! $footer->thoigianlamviec !!}</td>

                </tr>

            </thead>
        </table>




    </div>
@endsection
@section('js')
    <script>
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action', _href);
            if (confirm('bạn có chắc muốn xóa nó không?')) {
                $('form#form-delete').submit();
            }

        })
    </script>
@endsection
