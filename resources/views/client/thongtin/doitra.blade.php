@extends('layout.louser')
@section('main')
<h1>Ch&iacute;nh S&aacute;ch Đổi / Trả H&agrave;ng</h1>

<p>D&Agrave;NH CHO C&Aacute;C SẢN PHẨM L&Agrave; M&Aacute;Y MUA MỚI 100%</p>

<table>
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Điều kiện</th>
			<th>Đổi m&aacute;y ( Đổi sản phẩm kh&aacute;c trị gi&aacute; cao hơn hoặc thấp hơn )</th>
			<th>Kh&aacute;ch Thanh To&aacute;n Tiền Mặt Khi Mua, Trả Lại M&aacute;y Y&ecirc;u Cầu Ho&agrave;n Tiền Mặt Hoặc Chuyển Khoản</th>
			<th>Kh&aacute;ch Thanh To&aacute;n: Bằng Thẻ T&iacute;n Dụng hoặc Trả G&oacute;p Khi Mua Trả Lại M&aacute;y Y&ecirc;u Cầu Ho&agrave;n Tiền</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th rowspan="5">Trường Hợp 1: Sản phẩm kh&ocirc;ng bị lỗi</th>
			<td>Trong 3 ng&agrave;y đầu: M&aacute;y mới 100%<br />
			- Chưa qua sử dụng<br />
			- Nguy&ecirc;n Hộp.<br />
			- Chưa Activated</td>
			<td>Kh&ocirc;ng Mất Ph&iacute; ( B&ugrave; Trừ Ch&ecirc;nh Lệch Gi&aacute; Nếu C&oacute; )</td>
			<td>-5%</td>
			<td>-10%</td>
		</tr>
		<tr>
			<td>Trong 3 ng&agrave;y đầu:<br />
			- M&aacute;y đ&atilde; qua sử dụng<br />
			- Đ&atilde; Mở Hộp.<br />
			- Đ&atilde; Activated</td>
			<td>-12%</td>
			<td>-15%</td>
			<td>-20%</td>
		</tr>
		<tr>
			<td>Đ&atilde; Sử Dụng Tr&ecirc;n 3 ng&agrave;y v&agrave; dưới 30 Ng&agrave;y</td>
			<td>Trừ 20% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 25% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 30% Gi&aacute; Đang Ni&ecirc;m Yết</td>
		</tr>
		<tr>
			<td>Đ&atilde; Sử Dụng Tr&ecirc;n 30 Ng&agrave;y</td>
			<td>Mua theo gi&aacute; thị trường</td>
			<td>Mua theo gi&aacute; thị trường</td>
			<td>Mua theo gi&aacute; thị trường</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5">Lưu &Yacute;:<br />
			- Tất cả sản phẩm đổi trả phải đầy đủ phụ kiện, hộp, s&aacute;ch catalog như l&uacute;c mua. Nếu kh&ocirc;ng c&oacute; th&igrave; sẽ bị trừ gi&aacute; trị tương đương sản phẩm mới.<br />
			- Phụ kiện đ&atilde; qua sử dụng sẽ mua lại theo gi&aacute; thỏa thuận.</td>
		</tr>
	</tfoot>
</table>

<p>&nbsp;</p>

<table>
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Điều kiện</th>
			<th>Đổi m&aacute;y ( Đổi sản phẩm kh&aacute;c trị gi&aacute; cao hơn hoặc thấp hơn )</th>
			<th>Kh&aacute;ch Thanh To&aacute;n Tiền Mặt Khi Mua, Trả Lại M&aacute;y Y&ecirc;u Cầu Ho&agrave;n Tiền Mặt Hoặc Chuyển Khoản</th>
			<th>Kh&aacute;ch Thanh To&aacute;n: Bằng Thẻ T&iacute;n Dụng hoặc Trả G&oacute;p Khi Mua Trả Lại M&aacute;y Y&ecirc;u Cầu Ho&agrave;n Tiền</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th rowspan="5">Trường Hợp 2: Sản phẩm bị lỗi của nh&agrave; sản xuất</th>
			<td>Đổi trong 3 ng&agrave;y đầu</td>
			<td>Miễn ph&iacute; đổi sản phẩm mới 100%</td>
			<td>-3%</td>
			<td>-8%</td>
		</tr>
		<tr>
			<td>Đổi trong 4 ng&agrave;y tiếp theo</td>
			<td>Miễn ph&iacute; đổi sản phẩm mới 100%</td>
			<td>-3%</td>
			<td>-8%</td>
		</tr>
		<tr>
			<td>Đ&atilde; Sử Dụng Tr&ecirc;n 7 ng&agrave;y v&agrave; dưới 30 Ng&agrave;y</td>
			<td>Trừ 10% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 20% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 25% Gi&aacute; Đang Ni&ecirc;m Yết</td>
		</tr>
		<tr>
			<td>Đ&atilde; Sử Dụng Tr&ecirc;n 30 Ng&agrave;y</td>
			<td>Mua theo gi&aacute; thị trường</td>
			<td>Mua theo gi&aacute; thị trường</td>
			<td>Mua theo gi&aacute; thị trường</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5">Lưu &Yacute;:<br />
			- Tất cả sản phẩm đổi trả phải đầy đủ phụ kiện, hộp, s&aacute;ch catalog như l&uacute;c mua. Nếu kh&ocirc;ng c&oacute; th&igrave; sẽ bị trừ gi&aacute; trị tương đương sản phẩm mới.<br />
			- Phụ kiện đ&atilde; qua sử dụng sẽ mua lại theo gi&aacute; thỏa thuận.</td>
		</tr>
	</tfoot>
</table>

<p>&nbsp;</p>

<table>
	<thead>
		<tr>
			<th>Trường Hợp 3: Sản phẩm bị lỗi do người sử dụng</th>
			<td>SẢN PHẨM KH&Ocirc;NG C&Ograve;N TEM BẢO H&Agrave;NH, BỊ RƠI, VA CHẠM, ĐỂ M&Aacute;Y NƠI ẨM ƯỚT... THEO QUI ĐỊNH TỪ CHỐI BẢO H&Agrave;NH CỦA NH&Agrave; SẢN XUẤT ==&gt; KH&Ocirc;NG &Aacute;P DỤNG ĐỔI TRẢ, KH&Aacute;CH H&Agrave;NG CHỊU CHI PH&Iacute; SỬA CHỮA.</td>
		</tr>
	</thead>
</table>

<p>&nbsp;</p>

<p>D&Agrave;NH CHO C&Aacute;C SẢN PHẨM L&Agrave; M&Aacute;Y Đ&Atilde; QUA SỬ DỤNG</p>

<table>
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Điều kiện</th>
			<th>Đổi m&aacute;y ( Đổi sản phẩm kh&aacute;c trị gi&aacute; cao hơn hoặc thấp hơn )</th>
			<th>Kh&aacute;ch Thanh To&aacute;n Tiền Mặt Khi Mua, Trả Lại M&aacute;y Y&ecirc;u Cầu Ho&agrave;n Tiền Mặt Hoặc Chuyển Khoản</th>
			<th>Kh&aacute;ch Thanh To&aacute;n: Bằng Thẻ T&iacute;n Dụng hoặc Trả G&oacute;p Khi Mua Trả Lại M&aacute;y Y&ecirc;u Cầu Ho&agrave;n Tiền</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th rowspan="5">Trường Hợp 1: Sản phẩm kh&ocirc;ng bị lỗi</th>
			<td>Đổi trong 3 ng&agrave;y đầu</td>
			<td>Miễn Ph&iacute; Đổi Sản Phẩm Kh&aacute;c</td>
			<td>-0%</td>
			<td>-5% Cộng th&ecirc;m ph&iacute; trả g&oacute;p</td>
		</tr>
		<tr>
			<td>Đ&atilde; Sử Dụng Tr&ecirc;n 3 ng&agrave;y v&agrave; dưới 15 Ng&agrave;y</td>
			<td>Trừ 10% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 15% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 20% Gi&aacute; Đang Ni&ecirc;m Yết</td>
		</tr>
		<tr>
			<td>Đ&atilde; Sử Dụng Tr&ecirc;n 15 ng&agrave;y v&agrave; dưới 30 Ng&agrave;y</td>
			<td>Trừ 15% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 20% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 25% Gi&aacute; Đang Ni&ecirc;m Yết</td>
		</tr>
		<tr>
			<td>Đ&atilde; Sử Dụng Tr&ecirc;n 30 Ng&agrave;y</td>
			<td>Mua theo gi&aacute; thị trường</td>
			<td>Mua theo gi&aacute; thị trường</td>
			<td>Mua theo gi&aacute; thị trường</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5">Lưu &Yacute;:<br />
			- Tất cả sản phẩm đổi trả phải đầy đủ phụ kiện, hộp, s&aacute;ch catalog như l&uacute;c mua.<br />
			- Phụ kiện đ&atilde; qua sử dụng sẽ mua lại theo gi&aacute; thỏa thuận.</td>
		</tr>
	</tfoot>
</table>

<p>&nbsp;</p>

<table>
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Điều kiện</th>
			<th>Đổi m&aacute;y ( Đổi sản phẩm kh&aacute;c trị gi&aacute; cao hơn hoặc thấp hơn )</th>
			<th>Kh&aacute;ch Thanh To&aacute;n Tiền Mặt Khi Mua, Trả Lại M&aacute;y Y&ecirc;u Cầu Ho&agrave;n Tiền Mặt Hoặc Chuyển Khoản</th>
			<th>Kh&aacute;ch Thanh To&aacute;n: Bằng Thẻ T&iacute;n Dụng hoặc Trả G&oacute;p Khi Mua Trả Lại M&aacute;y Y&ecirc;u Cầu Ho&agrave;n Tiền</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th rowspan="5">Trường Hợp 2: Sản phẩm bị lỗi của nh&agrave; sản xuất</th>
			<td>Đổi trong 3 ng&agrave;y đầu</td>
			<td>Kh&ocirc;ng mất ph&iacute; đổi sản phẩm kh&aacute;c</td>
			<td>-0%</td>
			<td>-5% Cộng th&ecirc;m ph&iacute; trả g&oacute;p</td>
		</tr>
		<tr>
			<td>Đ&atilde; sử dụng tr&ecirc;n 3 ng&agrave;y v&agrave; dưới 15 ng&agrave;y</td>
			<td>-5% Gi&aacute; đang ni&ecirc;m yết</td>
			<td>-10% Gi&aacute; đang ni&ecirc;m yết</td>
			<td>-15% Gi&aacute; đang ni&ecirc;m yết</td>
		</tr>
		<tr>
			<td>Đ&atilde; Sử Dụng Tr&ecirc;n 15 ng&agrave;y v&agrave; dưới 30 Ng&agrave;y</td>
			<td>Trừ 10% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 15% Gi&aacute; Đang Ni&ecirc;m Yết</td>
			<td>Trừ 20% Gi&aacute; Đang Ni&ecirc;m Yết</td>
		</tr>
		<tr>
			<td>Đ&atilde; Sử Dụng Tr&ecirc;n 30 Ng&agrave;y</td>
			<td>Mua theo gi&aacute; thị trường</td>
			<td>Mua theo gi&aacute; thị trường</td>
			<td>Mua theo gi&aacute; thị trường</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5">Lưu &Yacute;:<br />
			- Tất cả sản phẩm đổi trả phải đầy đủ phụ kiện, hộp, s&aacute;ch catalog như l&uacute;c mua.<br />
			- Phụ kiện đ&atilde; qua sử dụng sẽ mua lại theo gi&aacute; thỏa thuận.</td>
		</tr>
	</tfoot>
</table>

<p>&nbsp;</p>

<table>
	<thead>
		<tr>
			<th>Trường Hợp 3: Sản phẩm bị lỗi do người sử dụng</th>
			<td>SẢN PHẨM KH&Ocirc;NG C&Ograve;N TEM BẢO H&Agrave;NH, BỊ RƠI, VA CHẠM, ĐỂ M&Aacute;Y NƠI ẨM ƯỚT... THEO QUI ĐỊNH TỪ CHỐI BẢO H&Agrave;NH CỦA NH&Agrave; SẢN XUẤT ==&gt; KH&Ocirc;NG &Aacute;P DỤNG ĐỔI TRẢ, KH&Aacute;CH H&Agrave;NG CHỊU CHI PH&Iacute; SỬA CHỮA.</td>
		</tr>
	</thead>
</table>
@endsection