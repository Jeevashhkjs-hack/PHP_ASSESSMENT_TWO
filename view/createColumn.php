<html>
<head>
    <title>Create Column</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        .Body {
            border: solid 1px #6ac6c1;
            box-shadow: 0px 0px 6px 0px #0a7c6e;
            padding: 20px;
            border-radius: 15px;
            background-color: #f2fbff;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#dbname").change(function () {
                var domEle =$("#dbname").val();
                $.ajax({
                    url:'index.php',
                    method:'post',
                    data:'domEle='+domEle
                }).done(function (tables) {
                    // console.log(tables)
                    tables=JSON.parse(tables)
                    $('#tableName').empty()
                    $('#tableName').append(`<option>select</option>`);
                    tables.forEach(function (table) {
                        $('#tableName').append(`<option>${table.tablesname}</option>`);
                        $('#tableName').addClass(`${table.TABLE_SCHEMA}`);
                    })
                })
            })

        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#tableName").change(function () {
                var table =$("#tableName").val();
                console.log(table)
                var dbname =$("#tableName").attr("class");
                console.log(dbname)
                $.ajax({
                    url:'index.php',
                    method:'post',
                    data:{ table: table, dbname: dbname },
                }).done(function (column) {
                    console.log( column)// column=JSON.parse(column);
                    // column.forEach(function (columns) {
                    //     $('#columnDiv').append(`<label>${columns.column_name}</label>`+`<input class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name=${columns.column_name} type="text">`)
                    // })             // column=JSON.parse(column)
                    var total = JSON.parse(column);
                    console.log(total)

                })
            })

        })
    </script>
</head>
<body class="bg-sky-200">
    <?php require 'view/style.php' ?>
    <div class="Body">
        <div class="dbLists">
            <form action="/createColumn" method="post">
                <div class="database">
                    <label>Select DataBase</label>
                    <select name="selectedDb" id="dbname" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php foreach($dbList as $name=>$lists): ?>
                            <option value="<?php echo $lists->Database ?>"><?php echo $lists->Database ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="tables">
                    <label>Table List</label>
                    <select name="tableName" id="tableName" >
                    </select>
                </div>
                <div class="columnDiv" id="columnDiv">

                </div>
            </form>

        </div>
    </div>
</body>
</html>