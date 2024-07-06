<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop PH | Add Fruit</title>
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

        .active {
            border-left: 15px solid white;
            background-color: gray;
        }

        nav ul li a:hover {
            border-left: 15px solid white;
            background-color: gray;
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
                <li><a class="active transition-all duration-200 ease-linear" href="addfruit.php"><ion-icon name="add-circle-outline"></ion-icon><span>Add Fruit</span></a></li>
                <li><a class=" transition-all duration-200 ease-linear" href=""><ion-icon name="settings-outline"></ion-icon><span>Account</span></a></li>
                <li><a class=" transition-all duration-200 ease-linear" href=""><ion-icon name="chatbox-outline"></ion-icon><span>Report Bug</span></a></li>
            </ul>
        </nav>
        <!-- content -->
        <div class="col-span-10 px-10 ">
            <div class="flex justify-between py-5">
                <h1>Admin</h1>
                <a href="#">Logout</a>
            </div>
            <hr>
            <h1 class="py-5">Add Fruit</h1>
            <div class="grid grid-cols-4">
                <form class="col-span-3 grid grid-cols-2 gap-5">
                    <div class="flex flex-col">
                        <label for="fruit_name">Fruit Name</label>
                        <input class="border rounded px-4 py-2" type="text" name="fruit_name" id="fruit_name" placeholder="Enter fruit name">
                    </div>
                    <div class="flex flex-col">
                        <label for="price">Price</label>
                        <input class="border rounded px-4 py-2" type="number" name="price" id="price" placeholder="Enter price">
                    </div>
                    <div class="flex flex-col">
                        <label for="quantity">Quantity(kg)</label>
                        <input class="border rounded px-4 py-2" type="number" name="quantity" id="quantity" placeholder="Enter quantity">
                    </div>
                    <div class="flex flex-col">
                        <label for="price">Upload Image <span class="font-sm text-gray-600"> ("This part is under construction")</span></label>
                        <input class="border rounded px-4 py-2" type="file" name="upload_image" id="upload_image">
                    </div>
                    <button type="submit" class="bg-blue-400 py-2 rounded font-bold text-white">Add Fruit</button>
                </form>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>