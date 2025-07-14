<?php
class Database {
    private static $host = 'mysql.railway.internal'; // 👉 MYSQLHOST
    private static $dbName = 'railway';               // 👉 MYSQLDATABASE
    private static $username = 'root';             // 👉 MYSQLUSER
    private static $password = 'ZjodAlDxngRCKLrgVzkXaUcslMamDmhV';               // 👉 MYSQLPASSWORD
    private static $port = 3306;                            // 👉 ou use MYSQLPORT

    public static function getConnection() {
        try {
            $conn = new PDO(
                "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbName . ";charset=utf8",
                self::$username,
                self::$password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }
}
?>
