<?php
$id= $_POST["id"];
require_once __DIR__.'/../db/DbHelper.php';
$vDB = new \VAQUA\DbHelper($id);
$path= $vDB->getPostPath($id);
?>

<html>
<body>
<div id = "data"></div>
<script src="/../vaqua/vega-master/lib/jquery-3.1.1.min.js"></script>
<script >
    // notice the quotes around the ?php tag
    var htmlString="<?php echo $path; ?>";
    window.id = htmlString;
</script>
<script src="data.js"></script>
</body>
</html>