<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Letter</title>
    <link href="../img/email-2-icon.png" rel="shortcut icon" type="image/png"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-responsive.css')}}">
    <link rel="stylesheet" href="{{asset('/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
</head>
<body onload="LOGIN.cargarnombre();">
    @yield('content')
    	<script src="js/correo.js"></script>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>