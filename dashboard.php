<?php
include 'session.php';
include 'connection.php';
//fruits data
$sql = 'SELECT * FROM fruits';
$result = mysqli_query($connection, $sql) or trigger_error("Failed SQL" . mysqli_error($connection, E_USER_ERROR));
$row = mysqli_fetch_assoc($result);
//count fruits data
$sql2 = 'SELECT COUNT(*) FROM fruits';
$result2 = mysqli_query($connection, $sql2);
$count = mysqli_fetch_array($result2);
//sum price of fruits
$sql3 = 'SELECT SUM(price) FROM fruits';
$result3 = mysqli_query($connection, $sql3);
$price = mysqli_fetch_array($result3);
//quantity of all fruits/kg
$sql4 = 'SELECT SUM(quantity) FROM fruits';
$result4 = mysqli_query($connection, $sql4);
$quantity = mysqli_fetch_array($result4);
//total value of fruits
$total = $price[0] * $quantity[0];
//low stocks
$sql5 = 'SELECT COUNT(quantity) FROM fruits WHERE quantity <= 10';
$result5 = mysqli_query($connection, $sql5);
$stock = mysqli_fetch_array($result5);
//pending request
$sqlPending = "SELECT * FROM orders WHERE order_status = 'Pending' ORDER BY date_created DESC";
$order_result = mysqli_query($connection, $sqlPending);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop PH | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="src/img/box.png" />
    <link rel="stylesheet" href="src/output.css">
    <style>
        nav ul {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        nav ul li {
            width: 100%;
        }

        nav ul li a {
            display: flex;
            width: 100%;
            justify-content: start;
            align-items: center;
            padding: 10px 0;
            color: white;
        }

        nav ul li a ion-icon {
            width: 30%;
            font-size: 1.5rem;
        }

        nav ul li a span {
            width: 70%;
            font-size: 1.2rem;
        }

        nav ul li button {
            display: flex;
            width: 100%;
            justify-content: start;
            align-items: center;
            padding: 10px 0;
            color: white;
        }

        nav ul li button ion-icon {
            width: 30%;
            font-size: 1.5rem;
        }

        nav ul li button span {
            width: 70%;
            font-size: 1.2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .active {
            border-left: 15px solid white;
            background-color: gray;
        }

        nav ul li a:hover {
            border-left: 15px solid white;
            background-color: gray;
        }

        nav ul li button:hover {
            border-left: 15px solid white;
            background-color: gray;
        }

        #dropdown-container {
            background-color: #52524C;
            display: none;
        }
    </style>
</head>

<body>
    <div class="grid grid-cols-12 w-screen h-screen">
        <!-- navbar -->
        <nav class="col-span-2 bg-gray-700 flex flex-col justify-start items-center gap-10">
            <h1 class=" text-2xl font-bold text-white mt-10">Fruit Shop PH</h1>
            <ul>
                <li><a class="active transition-all duration-200 ease-linear" href="dashboard.php"><ion-icon name="cube-outline"></ion-icon><span>Dashboard</span></a></li>
                <li><a class=" transition-all duration-200 ease-linear" href="addfruit.php"><ion-icon name="add-circle-outline"></ion-icon><span>Add Fruit</span></a></li>
                <li><button onclick="showLink()" class=" transition-all duration-200 ease-linear"><ion-icon name="bag-outline"></ion-icon><span>Order <ion-icon name="chevron-down-outline"></ion-icon></span></button></li>
                <div class=" transition-all duration-200 ease-linear" id="dropdown-container">
                    <ul>
                        <li><a class=" transition-all duration-200 ease-linear" href="createorder.php"><ion-icon name="bag-add-outline"></ion-icon><span>Create </span></a></li></a></li>
                        <li><a class=" transition-all duration-200 ease-linear" href="pendingorder.php"><ion-icon name="bag-handle-outline"></ion-icon><span>Pending </span></a></li></a></li>
                        <li><a class=" transition-all duration-200 ease-linear" href="completeorder.php"><ion-icon name="bag-check-outline"></ion-icon><span>Complete </span></a></li></a></li>
                    </ul>
                </div>
                <li><a class=" transition-all duration-200 ease-linear" href="account.php"><ion-icon name="settings-outline"></ion-icon><span>Account</span></a></li>
                <li><a class=" transition-all duration-200 ease-linear" href="report.php"><ion-icon name="chatbox-outline"></ion-icon><span>Report Bug</span></a></li>
            </ul>
        </nav>
        <!-- content -->
        <div class="col-span-10 px-10 ">
            <div class="flex justify-between py-5">
                <h1 class="text-2xl font-semibold text-gray-800">Admin <b class="text-orange-600"><?php echo $_SESSION['first_name'] ?></b></h1>
                <form method="post" action="logout.php">
                    <button type="submit" class="px-4 py-2 bg-red-400 text-white font-semibold rounded">Logout</button>
                </form>
            </div>
            <hr>
            <h1 class="py-5 text-2xl font-bold  text-gray-800">Fruit status</h1>
            <!-- status -->
            <div class="grid grid-cols-4 gap-10">
                <div class="col-span-3 grid grid-cols-3 gap-10">
                    <div class="cursor-pointer border rounded flex justify-center items-center gap-10 py-2 bg-blue-400 text-white">
                        <span class="font-bold text-2xl"><ion-icon name="cart-outline"></ion-icon></span>
                        <div>
                            <p class="text-lg">Total Fruits</p>
                            <p> <?php print_r($count[0] - 1) ?> </p>
                        </div>
                    </div>
                    <div class="cursor-pointer border rounded flex justify-center items-center gap-10 py-2 bg-green-400 text-white">
                        <span class="font-bold text-2xl"><ion-icon name="cash-outline"></ion-icon></span>
                        <div>
                            <p class="text-lg">Total Store Value</p>
                            <p><?php echo $total ?>&#x20B1;</p>
                        </div>
                    </div>
                    <div class="cursor-pointer border rounded flex justify-center items-center gap-10 py-2 bg-red-500 text-white">
                        <span class="font-bold text-2xl"><ion-icon name="alert-circle-outline"></ion-icon></span>
                        <div>
                            <p class="text-lg">Low Stocks</p>
                            <p><?php echo $stock[0] - 1 ?></p>
                        </div>
                    </div>
                    <table class="table-auto text-center col-span-3 overflow-y-scroll">
                        <thead>
                            <tr class="bg-gray-800 text-white">
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity(kg)</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 1;
                            while ($row = mysqli_fetch_array($result)) {

                            ?>
                                <tr class="border-b <?php $style = $row['quantity'] <= 10 ? 'bg-red-500 text-white' : '';
                                                    echo $style; ?>">
                                    <td> <?php echo $id ?> </td>
                                    <td> <?php echo $row['fruit_name'] ?> </td>
                                    <td> <?php echo $row['price'] ?> </td>
                                    <td> <?php echo $row['quantity'] ?> </td>
                                    <td> <?php echo $row['price'] * $row['quantity'] ?> </td>
                                    <td class="flex justify-center gap-2">
                                        <form action="update.php" method="post">
                                            <input type="hidden" name="fruit_id" id="fruit_id" value="<?php echo $row['fruit_id'] ?>">
                                            <button type="submit" name="edit" class="text-2xl "><ion-icon name="create-outline"></ion-icon></button>
                                        </form>
                                        <form action="deletefruit.php" method="post" onsubmit="return confirm('Are you sure you want to delete this fruit?')">
                                            <input type="hidden" name="fruit_id" id="fruit_id" value="<?php echo $row['fruit_id'] ?>">
                                            <button type="submit" name="delete" class="text-2xl text-red-500"><ion-icon name="trash-bin-outline"></ion-icon></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $id++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- request -->
                <div>
                    <?php if (mysqli_num_rows($order_result) < 1) {
                        echo "<div class='border border-blue-400 rounded flex gap-4 justify-center items-center py-2'>
                        <div class='mt-1'>
                            <span class='text-xl'><ion-icon name='alert-circle-outline'></ion-icon></span>
                        </div>
                        <div class='col-span-2'>
                            <p>No pending request</p>
                        </div>
                        </div>";
                    } else {
                    ?>
                        <h1 class="text-xl font-bold">Incoming order</h1>
                        <div class='border border-blue-400 rounded grid grid-cols-2 py-2'>
                            <?php while ($pending_order = mysqli_fetch_assoc($order_result)) {
                            ?>
                                <p><span><?php echo $pending_order['quantity'] ?>kg </span><b><?php echo $pending_order['fruit_name'] ?></b></p>
                                <p><?php echo $pending_order['date_created'] ?></p>
                            <?php
                            } ?>
                        </div>
                    <?php
                    } ?>


                </div>
            </div>
        </div>
    </div>
    <script>
        function showLink() {
            let dropdown = document.getElementById('dropdown-container');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            } else {
                dropdown.style.display = 'block';
            }
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>