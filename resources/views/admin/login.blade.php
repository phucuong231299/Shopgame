
<!DOCTYPE html>
<html>

<head>
<title>Admin Login</title>
<link rel="shortcut icon" type="image/x-icon" href="{{url('public/user/html')}}/images/console_logo.jpg" />


<meta name="keywords" content="Gaming Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>

<link href="{{url('public/loginadmin')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
{{-- <style>
	video {
	   width: 100vw;
	   height: 100vh;
	   position: fixed;
	   top: 0;
	   left: 0;
	   object-fit: cover;
	 }
	 .noi_dung {
	   position: relative;
	   height: 100vh;
	   /* text-align: center; */
	   display: flex;
	   align-items: center;
	   justify-content: center;
	 }
	 h1 {
	   color: CornflowerBlue;
	   text-transform: uppercase;
	   letter-spacing: 1vw;
	   line-height: 1.2;
	   font-size: 3vw;
	   /* text-align: center; */
	 }
	
	</style> --}}
<body>
	{{-- <video playsinline autoplay muted loop>
		<source src="{{url('public/loginadmin')}}/images/ori.mp4" type="video/mp4">
		</video> --}}
	<div class="padding-all">
		<div class="header">
			<h1><img src="{{url('public/loginadmin')}}/images/5.png" alt=" "> Login Admin </h1>
		</div>
		<div class="design-w3l">
			<div class="mail-form-agile">
				<form action="{{route('admin.postlogin')}}" method="post">
         			 @csrf
					<input type="text" name="tendangnhap" placeholder="User Name..." required=""/>
					<input type="password"  name="password" class="padding" placeholder="Password" required=""/>
					<input type="submit" value="submit">
				</form>
			</div>
		  <div class="clear"> </div>
		</div>
		
		<div class="footer">
		<p>© 2021 Admin Login. All Rights Reserved | Design by  <a href="https://w3layouts.com/" >  w3layouts </a></p>
		</div>
	</div>
</header>
</body>
</html>