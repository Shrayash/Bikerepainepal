Hello {{$user->email}},
<br><br>
Welcome to SMF Health Portal!<br>
To Verify <a href="{{route('sendEmail',['email'=>$user->email,'verifyToken'=>$user->verifyToken])}}">Click Here</a>
<br><br>
Best Regards,
SMF Hospital
