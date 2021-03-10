<?php

include 'connection/lock.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STI CAT</title>
</head>
<body>
    

<style>
.cache{
    text-align:center;
    position:absolute;
        top:0;
        left:0;
        bottom:0;
        right:0;
        height: max-content; 
        width: max-content;
        margin:auto;
}

</style>

<div class = "cache">
<img src="img/cache.gif">
<p><?php echo $lang["upload_file_not_leave"];?></p>
</div>


</body>
</html>