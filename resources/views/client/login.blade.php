@extends('layout.louser')
@section('main')
	<div class="padding-all">
		<div class="header">
			<h1><img src="{{url('public/loginadmin')}}/images/5.png" alt=" "> Client Login </h1>
		</div>
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="{{url('public/loginadmin')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<div class="design-w3l">
			<div class="mail-form-agile">
				<form action="{{route('client.postlogin')}}" method="post">
         			 @csrf
					<input type="text" name="tendangnhap" placeholder="User Name..." required=""/>
					<input type="password"  name="password" class="padding" placeholder="Password" required=""/>
					<input type="submit" value="submit">
				</form>
			</div>
		  <div class="clear"> </div>
		</div>
		
		<div class="footer">
		<p>© 2021 Client Login. All Rights Reserved | Design by  <a href="https://w3layouts.com/" >  DH19PM </a></p>
		</div>
	</div>

    @endsection