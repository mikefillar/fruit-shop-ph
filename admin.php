<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop PH | Admin</title>
    <link rel="icon" type="image/x-icon" href="src/img/box.png" />
    <link rel="stylesheet" href="src/output.css">
</head>

<body>
    <div class="grid grid-cols-2 px-32 py-10 w-screen h-screen">
        <div><img class="" src="src/img/signin.png" alt="sign-in"></div>
        <div class="rounded border flex flex-col justify-center items-center gap-6">
            <h1 class="font-bold text-gray-800 text-4xl">Login</h1>
            <h2 class="font-bold text-orange-600 text-2xl">Welcome back!</h2>
            <p>Demo Account :</p>
            <p></p>
            <form action="" class="flex flex-col gap-4 w-full px-6 mt-10">
                <input class="w-full px-4 py-2 border rounded" type="email" name="email" id="email" placeholder="your@email.com">
                <input class="w-full px-4 py-2 border rounded" type="password" name="password" id="password" placeholder="Password">
                <button class="px-4 py-2 rounded bg-orange-600 text-xl text-white font-bold">Login</button>
                <div class="flex justify-between">
                    <div><input class="" type="checkbox" name="check" id="check"> <span class="text-gray-600">Remember me</span></div>
                    <a href="#" class=" text-blue-500">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>