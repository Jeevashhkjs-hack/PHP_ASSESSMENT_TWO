<html>
<head>
    <title>Create Column</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body class="bg-sky-200">
    <?php require 'view/style.php' ?>
        <div class="dbLists">
            <form action="/createColumn" method="post">
                <select name="selectedDb" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <?php foreach($dbList as $name=>$lists): ?>
                        <option value="<?php echo $lists->Database ?>"><?php echo $lists->Database ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Select DB</button>
            </form>
        </div>
        <div class="tableLists">
            <form action="/createColumn" method="post">
                <select name="tableName" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500>
                    <?php foreach($this->tablesList as $table=>$tabesList): ?>
                        <option value="<?php echo $tabesList->tablesNameList ?>"><?php echo $tabesList->tablesNameList ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
        <div class="columnLists">
            <form action="/createColumn" method="post">
                <input type="text" name="columnName[]">
                <select name="dataTypes[]" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500>
                    <option value="int">Number</option>
                    <option value="varchar(255)">Text</option>
                    <option value="timestamp">Date Time</option>
                </select>
                <div class="content">

                </div>
                <button id="addDataa">Insert Data</button>
            </form>
        </div>
<script>
    let tableDiv = document.querySelector('.inputField');
    let tableBtn = document.querySelector('.createTableRow');

    let dataTypes = ['int','varchar(255)','timestamp'];
    let displayDataTypes = ['Number','Text','Date Time']

    tableBtn.addEventListener("click",()=>{
        let createRow = document.createElement('input');
        createRow.name = "columnName[]";
        tableDiv.append(createRow);

        let createSelect = document.createElement('select');
        createSelect.id = 'selectDatatype';
        createSelect.name = 'dataTypes[]';
        tableDiv.appendChild(createSelect)

        for(let i=0;i<dataTypes.length;i++){
            let createOption = document.createElement('option');
            createOption.value = dataTypes[i];
            createOption.text = displayDataTypes[i];
            createSelect.appendChild(createOption);
        }

</script>
</body>
</html>