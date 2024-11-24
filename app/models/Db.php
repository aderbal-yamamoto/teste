<?php
namespace App\Models;

use PDO;
use PDOException;
/**
 * Classe responsável pela interação com banco de dados
 * de forma genérica para reutilização do código
 */
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
 
/**
 * 
 * Função responsável por pesquisar dados do banco
 * com ou sem parametros de condição ou ordenação 
 * e limite
 *
 * @param string $table  
 * @param array $condition opcional
 * @param string $orderby opcional
 * @param int $limit opcional  
 * @return type array
 * @throws conditon
 **/
public function findAll($table, $conditions = [], $orderBy = 'id', $limit = null) {
    $conn = self::getConnection();
    
    // Inicia a parte da consulta SQL
    $sql = "SELECT * FROM {$table}";
    
    // Adiciona condições à consulta, se fornecidas
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(' AND ', array_map(function($col) {
            return "{$col} = :{$col}";
        }, array_keys($conditions)));
    }
    
    // Adiciona a cláusula ORDER BY
    $sql .= " ORDER BY {$orderBy}"; 
    
    // Adiciona a cláusula LIMIT, se fornecido
    if ($limit) {
        $sql .= " LIMIT {$limit}";
    }

    try {
        // Prepara e executa a consulta
        $stmt = $conn->prepare($sql);

        // Faz o bind dos parâmetros, se houver
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (PDOException $e) {
        echo "Erro na consulta: " . $e->getMessage();
        return [];
    }
}


    // Função genérica para buscar um registro por id
    public function findById($table, $id) {
        $conn = self::getConnection();
        try {
            $stmt = $conn->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return null;
        }
    }

    // Função genérica para inserir dados em uma tabela
    public function create($table, $data) {
        $conn = self::getConnection();
        
        // Criação da consulta dinâmica com os dados a serem inseridos
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        try {
            $stmt = $conn->prepare("INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})");
            
            // Bind de cada parâmetro dinamicamente
            foreach ($data as $key => $value) {
                $stmt->bindParam(":{$key}", $data[$key]);
            }

            $stmt->execute();
            return "Registro inserido com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao inserir dados: " . $e->getMessage();
            return "Erro ao inserir dados!";
        }
    }

    // Função genérica para atualizar dados de uma tabela
    public function update($table, $data, $id) {
        $conn = self::getConnection();

        // Criação da consulta dinâmica para os campos a serem atualizados
        $setStatements = "";
        foreach ($data as $key => $value) {
            $setStatements .= "{$key} = :{$key}, ";
        }
        $setStatements = rtrim($setStatements, ", ");  // Remove a vírgula final

        try {
            $stmt = $conn->prepare("UPDATE {$table} SET {$setStatements} WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            // Bind de cada parâmetro dinamicamente
            foreach ($data as $key => $value) {
                $stmt->bindParam(":{$key}", $data[$key]);
            }

            $stmt->execute();
            return "Registro atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar dados: " . $e->getMessage();
            return "Erro ao atualizar dados!";
        }
    }

    // Função genérica para excluir um registro de uma tabela
    public function delete($table, $id) {
        $conn = self::getConnection();
        try {
            $stmt = $conn->prepare("DELETE FROM {$table} WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return "Registro excluído com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao excluir dados: " . $e->getMessage();
            return "Erro ao excluir dados!";
        }
    }

    public function maxId($table){
        $conn = self::getConnection();
        try {
            $stmt = $conn->prepare("SELECT MAX(id) as max_id FROM $table;");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao obter o max id" . $e->getMessage();
            return 'Erro ao retornar o max id';
        }
    }
}
