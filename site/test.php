<!DOCTYPE html>
<html lang="en">
    <head>  
    </head>
    <body>
        <h1>Test Page</h1>
        <p>This is a test page.</p>
        <p>Current PHP version: <?php echo phpversion(); ?></p>
        <p>Current Date and Time: <?php echo date('Y-m-d H:i:s'); ?></p>
        <p>Server Name: <?php echo $_SERVER['SERVER_NAME']; ?></p>
        <p>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
        <p>Document Root: <?php echo $_SERVER['DOCUMENT_ROOT']; ?></p>
        <p>Request Method: <?php echo $_SERVER['REQUEST_METHOD']; ?></p>
        <p>Request URI: <?php echo $_SERVER['REQUEST_URI']; ?></p>
        <p>Query String: <?php echo $_SERVER['QUERY_STRING']; ?></p>
        <p>Remote Address: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
        <p>Remote Port: <?php echo $_SERVER['REMOTE_PORT']; ?></p>
        <p>Server Protocol: <?php echo $_SERVER['SERVER_PROTOCOL']; ?></p>
        <p>Server Port: <?php echo $_SERVER['SERVER_PORT']; ?></p>
        <p>PHP SAPI: <?php echo php_sapi_name(); ?></p>
        <p>PHP Extensions: <?php echo implode(', ', get_loaded_extensions()); ?></p>
        <p>PHP Configuration File: <?php echo php_ini_loaded_file(); ?></p>
        <p>PHP Configuration Directory: <?php echo php_ini_scanned_files(); ?></p>
        <p>PHP Error Reporting Level: <?php echo error_reporting(); ?></p>
        <p>PHP Memory Limit: <?php echo ini_get('memory_limit'); ?></p>
    </body>
</html>