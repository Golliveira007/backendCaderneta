<?php
class Database {
class Database {
    private static $host = 'mysql.railway.internal'; // host público do Railway
    private static $port = 3306;                    // porta pública
    private static $dbName = 'railway';             // nome do banco
    private static $username = 'root';               // usuário
    private static $password = 'ZjodAlDxngRCKLrgVzkXaUcslMamDmhV'; // senha

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
}
?>


