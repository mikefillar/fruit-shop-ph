<?php
include 'session.php';
include 'connection.php';
if (isset($_POST['edit'])) {
    $fruit_id = $_POST['fruit_id'];
    $sql = "SELECT * FROM fruits WHERE fruit_id = $fruit_id";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
    $fruit_name = $_POST['fruit_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $fruit_id = $_POST['fruit_id'];
    $imageurl = $_FILES['imageurl']['name'];
    //temporary image name
    $imageurltemp = $_FILES['imageurl']['tmp_name'];
    //imagefolder
    $imagefolder = 'src/img/' . $imageurl;
    echo $fruit_name;
    echo $price;
    echo $quantity;
    $sql = "UPDATE fruits SET fruit_name = '$fruit_name', price = $price, quantity = $quantity, imageurl = '$imageurl' WHERE fruit_id = $fruit_id";
    move_uploaded_file($imageurltemp, $imagefolder);
    mysqli_query($connection, $sql);
    echo "<script>alert('Fruit updated successfully.');</script>";
    echo "<script>window.location.href= 'dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop PH | Update Fruit</title>
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
            <h1 class="py-5 font-bold text-2xl text-gray-800">Fruit Details</h1>
            <div class="grid grid-cols-4">
                <div class="col-span-4 flex justify-center items-center">
                    <img src="src/img/<?php echo $row['imageurl'] ?>" alt="<?php echo $row['imageurl'] ?>">
                </div>
                <form class="col-span-3 grid grid-cols-2 gap-5" action="update.php" method="post" enctype="multipart/form-data">
                    <div class="flex flex-col">
                        <label for="fruit_name">Fruit Name</label>
                        <input class="border rounded px-4 py-2" type="text" name="fruit_name" id="fruit_name" value="<?php echo $row['fruit_name'] ?>">
                    </div>
                    <div class="flex flex-col">
                        <label for="price">Price</label>
                        <input class="border rounded px-4 py-2" type="number" name="price" id="price" value="<?php echo $row['price'] ?>">
                    </div>
                    <div class="flex flex-col">
                        <label for="quantity">Quantity(kg)</label>
                        <input class="border rounded px-4 py-2" type="number" name="quantity" id="quantity" value="<?php echo $row['quantity'] ?>">
                    </div>
                    <div class="flex flex-col">
                        <label for="imageurl">Upload Image</label>
                        <input class="border rounded px-4 py-2" type="file" name="imageurl" id="imageurl" accept="image/png, image/jpg, image/jpeg" value="<?php echo $row['imageurl'] ?>">
                    </div>
                    <button type="submit" name="update" class="bg-blue-400 py-2 rounded font-bold text-white">Update Fruit</button>
                    <input type="hidden" name="fruit_id" id="fruit_id" value="<?php echo $row['fruit_id'] ?>">
                </form>
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