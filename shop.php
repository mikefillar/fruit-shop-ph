<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .body {
            overflow-x: hidden;
        }

        .active {
            color: #fb8047;
        }
    </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fruit Shop PH | About</title>
    <link rel="stylesheet" href="/src/output.css" />
    <link rel="icon" type="image/x-icon" href="src/img/box.png" />
</head>

<body class="bg-yellow-50">
    <!-- hero -->
    <section class="w-full h-auto hero bg-gray-700">
        <header class="flex justify-between px-32 py-10 bg-gray-700 w-full">
            <div class="flex">
                <a class="text-orange-400 font-bold text-2xl" href="index.html">FruitShop PH
                </a>
            </div>
            <nav>
                <ul class="flex gap-10 mt-1">
                    <li><a class="font-bold text-white hover:text-orange-600" href="index.html">Home</a></li>
                    <li><a class="active font-bold hover:text-orange-600" href="shop.php">Shop</a></li>
                    <li><a class="font-bold text-white hover:text-orange-600" href="about.html">About</a></li>
                    <li><a class="font-bold text-white hover:text-orange-600" href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <div class="mt-2">
                <a href="#" class="text-white px-4 py-2 border border-orange-600 rounded hover:bg-orange-600 transition-all duration-200 ease-linear">Sign up</a>
            </div>
        </header>
        <div class="flex mt-14 flex-col justify-center items-center gap-4 bg-gray-700">
            <h2 class="text-orange-600 font-bold text-xl">Fresh and Organic</h2>
            <h1 class="font-bold text-6xl leading-relaxed text-white">
                Shop
            </h1>
            <div class="mt-14"></div>
        </div>
    </section>
    <!-- footer -->
    <footer class="h-auto px-32 py-20 grid grid-cols-4 gap-10 bg-gray-800 text-white">
        <div class="flex flex-col gap-4">
            <h1 class="text-2xl text-orange-600">FruitShop PH</h1>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint
                consequatur ut accusantium facilis eos eaque iure, dolorum quam
                commodi nulla!
            </p>
        </div>
        <div class="flex flex-col gap-4">
            <h1 class="text-2xl text-orange-600">Get in touch</h1>
            <p>
                <span><ion-icon name="location-outline"></ion-icon></span> Malolos,
                Bulacan
            </p>
            <p>
                <span><ion-icon name="mail-outline"></ion-icon></span>
                fruitshopph@email.com
            </p>
            <p>
                <span><ion-icon name="call-outline"></ion-icon></span> (123) 456-789
            </p>
        </div>
        <div class="flex flex-col gap-4">
            <h1 class="text-2xl text-orange-600">Pages</h1>
            <ul>
                <li>
                    <a href=""><ion-icon name="caret-forward-outline"></ion-icon>Home</a>
                </li>
                <li>
                    <a href=""><ion-icon name="caret-forward-outline"></ion-icon>Shop</a>
                </li>
                <li>
                    <a href=""><ion-icon name="caret-forward-outline"></ion-icon>About us</a>
                </li>
                <li>
                    <a href=""><ion-icon name="caret-forward-outline"></ion-icon>Contact us</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col gap-4">
            <h1 class="text-2xl text-orange-600">Subscribe</h1>
            <p>Subscribe to our mailing list to get the latest updates.</p>
            <input class="px-4 py-2 rounded" type="email" name="email" id="email" placeholder="your@email.com" />
            <button class="font-bold rounded text-white py-2 bg-orange-600">
                Subscribe
            </button>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>