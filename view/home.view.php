<html>
<head>
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body class="bg-sky-200">
        <?php require 'view/style.php' ?>
        <form action="/createDabase" method="post">
            <button type="submit" class="bg-sky-500	 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Create Database
            </button>
        </form>
        <form action="/createTable" method="post">
            <button type="submit" class="bg-sky-500	 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Create Table
            </button>
        </form>
        <form action="/createColumn" method="post">
            <button type="submit" class="bg-sky-500 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Insert Data
            </button>
        </form>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</body>
</html>