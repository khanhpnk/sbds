<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no" /> <!-- disable auto telephone linking in iOS -->
<title>house360.vn</title>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
	<center>
		<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">
			<tr>
				<td align="left" valign="top" id="bodyCell">
				<div>Cảm ơn bạn đã đăng ký thành viên tại house360.vn</div>
				<div>Bạn hãy bấm vào đường link dưới đây để hoàn tất việc đăng ký:</div>
				<a href="{{ url('verified/code/' . $code) }}">{{ url('verified/code/' . $code) }}</a>
				<div>Email đăng nhập: {{ $email }}</div>
				<div>Mật khẩu: ******</div>
				<div>Chúc bạn thành công</div>
				<div>Lưu ý: Đây là email tự động, vui lòng không gửi email trả lời</div>
				<div>Cảm ơn bạn đã sử dụng house360.vn</div>
				<div>Phòng dịch vụ khách hàng</div>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>
