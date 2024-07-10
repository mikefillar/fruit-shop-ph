<?php
include 'connection.php';
$sql = 'SELECT * FROM fruits';
$result = mysqli_query($connection, $sql) or trigger_error("Failed SQL" . mysqli_error($connection, E_USER_ERROR));
$row = mysqli_fetch_array($result);
//cart
$sql2 = 'SELECT * FROM cart';
$result2 = mysqli_query($connection, $sql2) or trigger_error("Failed SQL" . mysqli_error($connection, E_USER_ERROR));
$count = mysqli_num_rows($result2) - 1;

?>
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

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #quantity {
            width: 50px;
        }
    </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fruit Shop PH | Shop</title>
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
                <a href="viewcart.php" class="text-white text-xl"><ion-icon name="cart"></ion-icon><sup><?php echo $count ?></sup></a>
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
    <!-- products -->
    <section class="h-auto px-32 py-20 flex flex-col justify-center items-center text-center gap-4 bg-yellow-50" id="product">
        <h1 class="font-bold text-5xl text-orange-600 leading-normal">
            Our <span class="text-gray-800">Products</span>
        </h1>
        <p class="text-lg text-gray-600 w-3/5">
            Remember to savor these seasonal delights and explore our product for
            the freshest picks.
        </p>
        <div class="grid grid-cols-3 gap-10 mt-14">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <form class="" method="post" action="cart.php">
                    <div class="rounded-md shadow-xl bg-white flex flex-col">
                        <img src="/src/img/<?php echo $row['imageurl'] ?>" alt="<?php echo $row['imageurl'] ?>" />
                        <div class="flex flex-col gap-2 px-5 pb-5 mt-5">
                            <h1 class="font-bold text-xl text-gray-800"><?php echo $row['fruit_name'] ?></h1>
                            <div class="grid grid-cols-2">
                                <div>
                                    <p class="text-sm text-gray-600"><?php echo $row['quantity'] ?> kg available</p>
                                    <h1 class="text-xl font-bold text-gray-800">&#x20B1; <?php echo $row['price'] ?>/kg</h1>
                                </div>
                                <div>
                                    <p class="text-md text-gray-600">Quantity</p>
                                    <input class="border border-gray-600 rounded text-center" type="number" name="quantity" id="quantity" min="1" value="1">
                                </div>
                            </div>
                            <input type="hidden" name="fruit_name" id="fruit_name" value="<?php echo $row['fruit_name'] ?>">
                            <input type="hidden" name="price" id="price" value="<?php echo $row['price'] ?>">
                            <input type="hidden" name="imageurl" id="imageurl" value="<?php echo $row['imageurl'] ?>">
                            <button onclick="return confirm('Add this fruit to cart?.')" name="cart" type="submit" class="bg-orange-600 font-semibold text-white text-md px-4 py-3 rounded-xl hover:text-orange-600 hover:bg-gray-700 transition-all ease-linear duration-200">Add to cart</button>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
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