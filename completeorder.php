<?php
include 'session.php';
include 'connection.php';
$sql = "SELECT * FROM orders WHERE order_status = 'Complete'";
$result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop PH | Create Order</title>
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
            display: block;
        }

        #buy {
            width: 80px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="grid grid-cols-12 w-screen h-screen">
        <!-- navbar -->
        <nav class="col-span-2 bg-gray-700 flex flex-col justify-start items-center gap-10">
            <h1 class=" text-2xl font-bold text-white mt-10">Fruit Shop PH</h1>
            <ul>
                <li><a class=" transition-all duration-200 ease-linear" href="dashboard.php"><ion-icon name="cube-outline"></ion-icon><span>Dashboard</span></a></li>
                <li><a class=" transition-all duration-200 ease-linear" href="addfruit.php"><ion-icon name="add-circle-outline"></ion-icon><span>Add Fruit</span></a></li>
                <li><button onclick="showLink()" class=" transition-all duration-200 ease-linear"><ion-icon name="bag-outline"></ion-icon><span>Order <ion-icon name="chevron-down-outline"></ion-icon></span></button></li>
                <div class=" transition-all duration-200 ease-linear" id="dropdown-container">
                    <ul>
                        <li><a class=" transition-all duration-200 ease-linear" href="createorder.php"><ion-icon name="bag-add-outline"></ion-icon><span>Create </span></a></li></a></li>
                        <li><a class=" transition-all duration-200 ease-linear" href="pendingorder.php"><ion-icon name="bag-handle-outline"></ion-icon><span>Pending </span></a></li></a></li>
                        <li><a class="active transition-all duration-200 ease-linear" href="completeorder.php"><ion-icon name="bag-check-outline"></ion-icon><span>Complete </span></a></li></a></li>
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
            <div class="grid grid-cols-2 gap-4">
                <h1 class="py-5 font-bold text-2xl text-gray-800">Complete Order</h1>
            </div>
            <div class="grid">
                <div>
                    <?php if (mysqli_num_rows($result) < 0) {
                        echo "<h1 class='text-xl text-gray-800' >No completed order/s available.</h1>";
                    } else { ?>
                        <table class="w-full text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Date/Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['fruit_name'] ?></td>
                                        <td class="flex justify-center items-center"><img width="100px" src="src/img/<?php echo $row['imageurl'] ?>" alt="<?php echo $row['imageurl'] ?>"></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td><?php echo $row['quantity'] ?></td>
                                        <td><?php echo $row['total'] ?></td>
                                        <td><?php echo $row['order_status'] ?></td>
                                        <td><?php echo $row['date_updated'] ?></td>
                                        <td><a onclick="return confirm('Complete this order?')" class="text-xl" href="pendingorder.php?complete=<?php echo $row['order_id'] ?>"><ion-icon name="checkmark-outline"></ion-icon></a><a class="text-xl" href="#"><ion-icon name="close-outline"></ion-icon></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="/src/js/createorder.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>