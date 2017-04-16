var path = window.id || 0;
if(path == 0)
    document.getElementById('data').innerHTML =
        '<h1> the link has been expired go to the source for new link</h1><a href="../../index.php">Vaqua.org</a> ';
else {
    // alert("there is no data available");
    path = '../../' + path;
    window.path = path
    console.log(path);
    $.getJSON(path, function (data) {
        // var obj  = json.parse(data);
        var table = document.getElementById('data');
        var tableData = '<table border="1" class="table">';
        for (var i in data) {
            var key = i;
            // console.log(i);
            var val = data[i];
            if (i == 0) {
                tableData += '<thead><tr>';
            } else {
                if (i == 1) {
                    tableData += '<tbody><tr>';
                }
                else {
                    tableData += '<tr>';
                }
            }
            // console.log(key);

            for (var j in val) {
                var sub_key = j;
                var sub_val = val[j];

                if (i == 0) {
                    tableData += '<th>' + sub_key + '</th>';

                } else {
                    tableData += '<td>' + sub_val + '</td>';
                }
                // console.log(sub_key);

            }
            if (i == 0) {
                tableData += '</tr></thead>';
            } else {
                tableData += '</tr>';
            }
        }
        tableData += '</tbody></table>';
        table.innerHTML = tableData;
    });
}
