<div class="mx-auto">   
    <h2>Password Reset</h2>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <a href="{{ route('password.reset', $token) }}">Reset Your Password</a>
    <p>
        If you did not request a password reset, no further action is required.
    </p>
    <p class="text-left"> 
    Regards,<br>
    BookInfo
    </p>
</div>