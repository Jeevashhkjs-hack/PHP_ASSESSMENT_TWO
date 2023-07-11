<html>
<head>
    <title>Create Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        .input-fileds{

        }
        select{
            width: 190px;
        }
        #labl{
            color: #0e4f8e;
            font-size: 18px;
        }
        form{
            margin: auto;
            width: 480px;
            border: solid 1px #6ac6c1;
            box-shadow: 0px 0px 6px 0px #0a7c6e;
            padding: 35px;
            border-radius: 15px;
            margin-top: 110px;
        }
        .AddRow{
            position: relative;
        }
        .createTableRow {
            position: absolute;
            left: 800px;
            bottom: 37px;
            font-size: 15px;
            padding: 8px;
            font-weight: 400;
        }
        .alert{
            width: 480px;
            position: absolute;
            left: 443px;
            top: 70px;
        }
    </style>
</head>
<body class="bg-sky-200">
    <?php require 'view/style.php' ?>
    <?php if($_SESSION['tableExists']): ?>
    <div role="alert" class="alert">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Danger
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>Something not ideal might be happening.</p>
        </div>
    </div>
    <?php endif; ?>
        <form action="/createTable"  method="post">
            <label for="default" id="labl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Database</label>
            <select name="selectedDb" id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php foreach($dbList as $name=>$lists): ?>
                    <option value="<?php echo $lists->Database ?>"><?php echo $lists->Database ?></option>
                <?php endforeach; ?>
            </select>
            <div class="tableList">
                <div class="mb-6">
                    <label for="default-input" id="labl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Table Name</label>
                    <input name="tableName" type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="input-fileds">
                    <div class="mb-6">
                        <label for="default-input" id="labl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Column Name</label>
                        <input name="columnName[]" type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="inputField">
                        <select name="dataTypes[]" id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="int">Number</option>
                            <option value="varchar(255)">Text</option>
                            <option value="timestamp">Date Time</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create Table
            </button>
        </form>
        <div class="AddRow">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline createTableRow" type="button">
                Add Row
            </button>
        </div>
<script>
    let tableDiv = document.querySelector('.inputField');
    let tableBtn = document.querySelector('.createTableRow');

    let dataTypes = ['int','varchar(255)','timestamp'];
    let displayDataTypes = ['Number','Text','Date Time']

    tableBtn.addEventListener("click",()=>{

        let createLabel = document.createElement('label');
        createLabel.innerText = 'Column name';
        createLabel.id = "labl";
        tableDiv.append(createLabel);

        let createRow = document.createElement('input');
        createRow.name = "columnName[]";
        createRow.className = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
        tableDiv.append(createRow);

        let createSelect = document.createElement('select');
        createSelect.id = 'selectDatatype';
        createSelect.className = 'bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
        createSelect.name = 'dataTypes[]';
        tableDiv.appendChild(createSelect)

        for(let i=0;i<dataTypes.length;i++){
            let createOption = document.createElement('option');
            createOption.value = dataTypes[i];
            createOption.text = displayDataTypes[i];
            createSelect.appendChild(createOption);
        }
    })
</script>
</body>
</html>
