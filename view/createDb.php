<html>
<head>
    <title>Create Database</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        form{
            margin-top: 180px;
        }
        .alert {
            position: absolute;
            top: 174px
        }
    </style>
</head>
<body class="bg-sky-200">
        <?php require 'view/style.php' ?>
        <div class="w-full max-w-xs" style="margin: auto">
            <?php if($_SESSION['alreadyExit']): ?>
            <div class="alert bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Already Exits</strong>
                <span class="block sm:inline">Database Name Already Exits</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              </span>
            </div>
            <?php endif; ?>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/createDabase" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Data Base Name
                    </label>
                    <input name="dbName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Database Name">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Create Database
                    </button>
                </div>
            </form>
        </div>
</body>
</html>