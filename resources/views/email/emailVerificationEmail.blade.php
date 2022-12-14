<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div>

        <img style="display: block; text-align: center; " src="{{ asset('images/email.png') }}" />
        <h1 style="display: block; text-align: center; 
                    color: #010414;
                    font-size: 25px;" 
                >Confirmation email</h1>
        <p style="display: block; text-align: center; 
                font-size: 18px;
                line-height: 22px;
                color: #010414;" >
        click this button to verify your email
        </p>
        <a style="display: block;
                text-align: center;
                background-color: rgb(34,197,94);
                width: 24rem;
                margin: auto;
                padding-top: 19px;
                padding-bottom: 19px;
                color: rgb(255,255,255);
                text-decoration: none;
                font-weight: 900;
                border-radius: 8px;
                font-size: 16px;
            " 
            href="{{ route('user.verify', ['token' => $token, 'lang' => app()->getLocale()]) }}"
            >VERIFY EMAIL
        </a>
    </div>
</body>

</html>
