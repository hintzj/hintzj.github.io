<?php
    function error_logfile($error, $message = "No message given"){
        echo "<script>console.log('{$error}');</script>";
        $error_date = date('Y-m-d H:i:s');
        $key = array_search(__FUNCTION__, array_column(debug_backtrace(), 'function'));
        $trace = var_dump(debug_backtrace()[$key]['file']);

        $message = "{$error_date} | {$error} | {$message}\n";
        file_put_contents(errorLog, $message, FILE_APPEND);
    };
?>