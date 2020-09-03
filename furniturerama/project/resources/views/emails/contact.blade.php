<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CONTACT FORM INQUIRY</title>
</head>
<body>
	<h3>NAME:</h3><p>{{ $details['name'] }}</p>
	<h3>EMAIL:</h3><p>{{ $details['email'] }}</p>
	<h3>SUBJECT:</h3><p>{{ $details['subject'] }}</p>
	<h3>MESSAGE:</h3><p>{{ $details['message'] }}</p>
</body>
</html>
