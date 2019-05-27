<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chatting</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php
        include_once 'application/views/staticfiles.php';
        ?>       
    </head>
    <body>
        <div class="container">
            <div class="col-md-2">
                <?php foreach ($getAllUserListData as $row): ?>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a tabindex="-1" href="#"><?php echo $row['name']; ?></a></li>
                    </ul>           
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>