<!DOCTYPE html>
<html>
<head>
    <title>Credentials</title>
</head>
<body>
    <p>Hi,<?php echo $user->name; ?><br></p>
    <p>Your Username is :{{ $user->username }}</p>
    <p>Your email is :{{ $user->email }}</p>
    @if ($type == 0)
        <p>Your password is :teacher@123</p>
    @elseif($type == 1)
        <p>Your password is :student@123</p>
    @endif
    <p>Your contact is :{{ $user->contact }}</p>
    <strong>Thank you :)</strong>
</body>
</html>
