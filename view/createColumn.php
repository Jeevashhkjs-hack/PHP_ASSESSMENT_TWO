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
                let domEle =$("#dbname").val();
                $.ajax({
                    url:'index.php',
                    method:'post',
                    data:'domEle='+domEle
                }).done(function (tables) {
                    tables=JSON.parse(tables)
                    $('#tableName').empty();
                    tables.forEach(function (table) {
                        $('#tableName').append('<option>'+ table.tablesname + '</option>')
                    })
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
                <div class="columns">
                    <label>Table List</label>
                    <select name="tableName" id="tableName" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </select>
                </div>
            </form>

        </div>
    </div>
<!--<script>-->
<!--    let tableDiv = document.querySelector('.inputField');-->
<!--    let tableBtn = document.querySelector('.createTableRow');-->
<!---->
<!--    let dataTypes = ['int','varchar(255)','timestamp'];-->
<!--    let displayDataTypes = ['Number','Text','Date Time']-->
<!---->
<!--    tableBtn.addEventListener("click",()=>{-->
<!--        let createRow = document.createElement('input');-->
<!--        createRow.name = "columnName[]";-->
<!--        tableDiv.append(createRow);-->
<!---->
<!--        let createSelect = document.createElement('select');-->
<!--        createSelect.id = 'selectDatatype';-->
<!--        createSelect.name = 'dataTypes[]';-->
<!--        tableDiv.appendChild(createSelect)-->
<!---->
<!--        for(let i=0;i<dataTypes.length;i++){-->
<!--            let createOption = document.createElement('option');-->
<!--            createOption.value = dataTypes[i];-->
<!--            createOption.text = displayDataTypes[i];-->
<!--            createSelect.appendChild(createOption);-->
<!--        }-->
<!---->
<!--</script>-->
</body>
</html>