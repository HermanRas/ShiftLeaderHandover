<?php
    $host = 'FQDN_SERVER_NAME';
    $db   = 'DB';
    $user = 'USER';
    $pass = 'PASS#';

    $dsn = "sqlsrv:Server=$host;Database=$db";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::SQLSRV_ATTR_ENCODING    => PDO::SQLSRV_ENCODING_UTF8,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
        echo 'DB_CONNECTION ERROR !';
    }
?>