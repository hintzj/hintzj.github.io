<?php
    $command = escapeshellcmd('C:/Users/WSV_Server/Desktop/update.py');
    $output = shell_exec($command);
    echo $output;
?>