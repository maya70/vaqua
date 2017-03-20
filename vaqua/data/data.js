var path = window.id||0;
path = '/vaqua/'+path;
console.log(path);
$.getJSON(path,function (data) {
     // var obj  = json.parse(data);
    document.writeln('<table border="1">')
    for(var i in data) {
        var key = i;
        var val = data[i];
        document.writeln('<tr>')
        // console.log(key);

        for (var j in val) {
            var sub_key = j;
            var sub_val = val[j];
            document.writeln('<td>'+sub_key+'</td><td>'+sub_val+'</td>');
            // console.log(sub_key);

        }
        document.writeln('</tr>')
    }
    document.writeln('<table>')
});
