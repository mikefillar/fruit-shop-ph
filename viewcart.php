<?php
include 'connection.php';
//cart
$sql = 'SELECT * FROM cart';
$result = mysqli_query($connection, $sql) or trigger_error("Failed SQL" . mysqli_error($connection, E_USER_ERROR));
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result) - 1;

//
$grand_total = 0;

//delete fruit
if (isset($_GET['remove'])) {
    $cart_id = $_GET['remove'];
    $sql = "DELETE FROM cart WHERE cart_id = $cart_id";
    mysqli_query($connection, $sql);
    echo "<script> alert('Cart item deleted.')</script>";
    header('Location: viewcart.php');
}
//delete all
if (isset($_GET['delete'])) {
    $cart_id = $_GET['delete'];
    $sql = "DELETE FROM cart WHERE cart_id != $cart_id";
    mysqli_query($connection, $sql);
    echo "<script> alert('Cart deleted.')</script>";
    header('Location: viewcart.php');
}
//checkout
if (isset($_GET['checkout'])) {
    $checkout_id = $_GET['checkout'];
    $sql = "UPDATE orders SET order_status = 'Pending' WHERE order_id != $checkout_id";
    mysqli_query($connection, $sql);
    //delete cart
    mysqli_query($connection, "DELETE FROM cart WHERE cart_id != $checkout_id");
    echo "<script> alert('Order placed successfully.')</script>";
    echo "<script>window.location.href = 'viewcart.php'</script>";
}

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
    <title>Fruit Shop PH | Cart</title>
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
                <a href="" class="text-white text-xl"><ion-icon name="cart"></ion-icon><sup><?php echo $count ?></sup></a>
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
    <!-- cart -->
    <section class="h-auto px-32 py-20 flex flex-col justify-center items-center text-center gap-4 bg-white" id="product">
        <h1 class="font-bold text-5xl text-orange-600 leading-normal">
            My <span class="text-gray-800">Cart</span>
        </h1>
        <div class=" flex flex-col justify-center items-center w-full gap-10 mt-14">
            <?php if ($row = mysqli_num_rows($result) - 1 > 0) {
                echo "<div class='flex w-full items-start justify-between px-10'>
                    <div></div>
                    <a onclick='return confirm('Are you sure you want to delete all fruits?')' href='viewcart.php?delete=1' class=' text-gray-800 font-semibold border border-orange-600 text-md px-4 py-3 rounded hover:text-orange-600 hover:bg-gray-800 transition-all ease-linear duration-200' href='shop.php'>Delete Cart</a>
                </div>";
                echo "<table class='w-full'>
                <thead class='py-2 text-lg'>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity(kg)</th>
                    <th>Total</th>
                    <th>Action</th>
                </thead>
                <tbody>";
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <tr class="text-center">
                        <td><?php echo $row['fruit_name'] ?></td>
                        <td class="flex justify-center items-center"><img width="100px" src="src/img/<?php echo $row['imageurl'] ?>" alt=""></td>
                        <td>&#x20B1;<?php echo $row['price'] ?></td>
                        <td><span id="lblQuantity<?php echo $row['cart_id'] ?>" class=""><?php echo $row['quantity'] ?></span>
                            <div id="divUpdate<?php echo $row['cart_id'] ?>" class="hidden">
                                <form method="post" action="updatecart.php">
                                    <input type="hidden" name="cart_id" id="cart_id" value="<?php echo $row['cart_id'] ?>">
                                    <input class="text-center border" type="number" name="quantity" id="quantity" value="<?php echo  $row['quantity'] ?>">
                                    <button type="submit" name="update" class="text-green-400">Update</button>
                                </form>
                            </div>
                        </td>
                        <td>&#x20B1;<?php echo $row['price'] * $row['quantity'] ?></td>
                        <td class=""><button onclick="editQuantity(<?php echo $row['cart_id'] ?>)" class="text-xl"><ion-icon name="create-outline"></ion-icon></button><a onclick="return confirm('Are you sure you want to remove this fruit?')" href="viewcart.php?remove=<?php echo $row['cart_id'] ?>" class="text-xl"><ion-icon name="trash-bin-outline"></ion-icon></a></td>
                    </tr>
                <?php
                    $grand_total = $grand_total + ($row['price'] * $row['quantity']);
                }
                ?>
                <tr class="border-t">
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>Grand Total</th>
                    <th>&#x20B1;<?php echo $grand_total ?></th>
                    <td></td>
                </tr>
                </tbody>
                </table>
                <div class='flex w-full items-start justify-between px-10'>
                    <div></div>
                    <a onclick="return confirm('Place order now?')" href="viewcart.php?checkout=1" class="mt-4 bg-orange-600 font-semibold text-white text-md px-4 py-3 rounded hover:text-orange-600 hover:bg-gray-700 transition-all ease-linear duration-200">Check out</a>
                </div>
            <?php } else {
                echo "<h1 class='text-xl text-gray-800' >No fruits available in cart.</h1>";
                echo "<a class='bg-orange-600 font-semibold text-white text-md px-4 py-3 rounded hover:text-orange-600 hover:bg-gray-700 transition-all ease-linear duration-200' href='shop.php'>Shop now</a>";
            } ?>
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
    <script>
        function editQuantity(num) {
            document.getElementById(`lblQuantity${num}`).classList.add('hidden');
            document.getElementById(`divUpdate${num}`).classList.remove('hidden');
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>