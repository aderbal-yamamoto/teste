<?php
namespace App\Models;

use PDO;
use PDOException;
use PSpell\Config;

class Db {
    private static $conn;  // Conexão estática com o banco de dados

    // Função para estabelecer a conexão com o banco de dados
    public static function getConnection() {
        if (empty(self::$conn)) {
            try {
                $conexao = parse_ini_file(__DIR__ . "/../config/config.ini");
                $host   = $conexao['host'];
                $dbname = $conexao['dbname'];
                $port   = $conexao['port'];
                $user   = $conexao['user'];
                $pass   = $conexao['pass'];
                // Conexão PDO com MySQL
                self::$conn = new PDO("mysql:host={$host};dbname={$dbname};port={$port}", $user, $pass);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Definir o modo de erro do PDO
            } catch (PDOException $e) {
                // Se houver erro na conexão, exibe uma mensagem
                echo "Erro de conexão: " . $e->getMessage();
                exit;
            }
        }
        return self::$conn;
    }

    // Função para buscar todos os registros da tabela "pessoa"
    public function findAll() {
        $conn = self::getConnection();  // Obtém a conexão
        try {
            $result = $conn->query("SELECT * FROM users ORDER BY id");  // Executa a consulta
            $data = $result->fetchAll(PDO::FETCH_ASSOC);  // Retorna os resultados como um array associativo
            /*
            if (empty($data)) {
                echo "Nenhum registro encontrado.";
            } else {
                echo "Registros encontrados: " . count($data);
            }
            */    
            return $data;
        } catch (PDOException $e) {
            // Em caso de erro na consulta, exibe a mensagem
            echo "Erro na consulta: " . $e->getMessage();
            return [];
        }
    }

    public function create($data){
       
        $conn = self::getConnection();
        $userName = $data['username'];
        $hashedPassword = $data['hashedpassword'];
        try{
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $userName);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();
            echo 'Usuário cadastrado com sucesso!';
        } catch(PDOException $e){
            
            echo "Erro ao cadastrar usuario!";
        }

    }
}
