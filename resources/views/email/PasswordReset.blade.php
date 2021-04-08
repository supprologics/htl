Hello {{ $details['name']}}

<!--
<a href="http://htl.prohr.live/verify-student?code={{ $details['verification_code']}}">Click here for verify</a>b-->
<a href="http://127.0.0.1:8000/password-reset?code={{ $details['verification_code']}}">Click here to change password</a>
