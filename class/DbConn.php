<?php

class DbConn
{
    private static PDO $dbh;
    public static function get(): PDO
    {
        if (!isset(self::$dbh)) {
            /* Connect to a MySQL database using driver invocation */
            try {
                self::$dbh = new PDO(DB_DSN, DB_USER, DB_PASS); // $dbh - database handle
                // set timezone
                $timezone = DB_TIMEZONE;
                $stmt = self::$dbh->prepare("SET time_zone = :timezone");
                $stmt->bindParam(':timezone', $timezone);
                $stmt->execute();
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
        return self::$dbh;
    }
}