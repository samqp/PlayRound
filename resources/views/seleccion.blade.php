<!DOCTYPE html>
<html>
<head>
	<title>Seleccion</title>
</head>
<body>
	 @if (isset($token))

		 {{$token}}
		 <a href="{{route('student',$token)}}" type="button">Estudiante</a>
	 	 <a href="{{route('profesor')}}" type="button">Profesor</a>
	 @endif
 
</body>
</html>