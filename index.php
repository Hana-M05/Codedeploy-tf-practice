<?php
  $version = file_exists('version.txt') ? file_get_contents('version.txt') : '1.0';
  $color = ($version == '1.0') ? 'grey' : 'green';
?>
<html>
<body style="background-color: <?php echo $color; ?>; font-family: sans-serif; text-align: center; padding-top: 100px;">
    <h1>CTO Dashboard: Infrastructure Demo</h1>
    <div style="font-size: 50px; font-weight: bold;">
        VERSION: <?php echo $version; ?>
    </div>
    <p>Instance IP: <?php echo $_SERVER['SERVER_ADDR']; ?></p>
</body>
</html>