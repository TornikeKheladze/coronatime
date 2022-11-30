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
    <div class="w-screen h-screen flex flex-col items-center justify-center gap-4">

        <img src="{{ asset('images/email.png') }}" />
        <h1 class="font-black text-2xl mt-10">Confirmation email</h1>
        <p>click this button to verify your email</p>
        <a href="{{ route('user.verify', ['token' => $token, 'lang' => app()->getLocale()]) }}"
            class="mt-8 w-96 flex justify-center items-center bg-green-500 rounded-lg h-14 font-black text-white text-lg">Verify
            Email</a>
    </div>
</body>

</html>
