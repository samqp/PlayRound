<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="{{route('saveStudent')}}" enctype="multipart/form-data">
	{{csrf_field()}}
		<p>carrera: <input type="text" name="carrera" required></p>
		<p>matricula: <input type="text" name="matricula" required></p>
		<p>nickname: <input type="text" name="nickname" required></p>
		<button type="submit">Guardar</button>

	</form>

</body>
</html>