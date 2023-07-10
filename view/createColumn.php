<html>
<head>
    <title>Create Column</title>
</head>
<body>
    <div class="container">
        <div class="dbLists">
            <form action="/createColumn" method="post">
                <select name="selectedDb">
                    <?php foreach($dbList as $name=>$lists): ?>
                        <option value="<?php echo $lists->Database ?>"><?php echo $lists->Database ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Select DB</button>
            </form>
        </div>
        <div class="tableLists">
            <form action="/createColumn" method="post">
                <select name="tableName">
                    <?php foreach($this->tablesList as $table=>$tabesList): ?>
                        <option value="<?php echo $tabesList->tablesNameList ?>"><?php echo $tabesList->tablesNameList ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
        <div class="columnLists">
            <form action="/createColumn" method="post">
                <input type="text" name="columnName[]">
                <select name="dataTypes[]">
                    <option value="int">Number</option>
                    <option value="varchar(255)">Text</option>
                    <option value="timestamp">Date Time</option>
                </select>
                <button>Insert Data</button>
            </form>
        </div>
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