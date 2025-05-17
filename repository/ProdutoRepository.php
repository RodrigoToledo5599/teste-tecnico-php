<?php
require_once __DIR__ . '/../models/Produto.php';

class ProdutoRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function procurarTodos(): array
    {
        $rows = $this->db->query("SELECT * FROM produtos")->fetchAll();
        return array_map([$this, 'mapRowToEntity'], $rows);
        // return $rows;
    }

    public function procurarPorCodigo(string $codigo): ?Produto
    {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE codigo = ?");
        $stmt->execute([$codigo]);
        $row = $stmt->fetch();
        return $row ? $this->mapRowToEntity($row) : null;
    }

    public function procurarPorNome(string $nome): ?Produto
    {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE nome = ?");
        $stmt->execute([$nome]);
        $row = $stmt->fetch();
        return $row ? $this->mapRowToEntity($row) : null;
    }

    public function procurarPorAtivos(): ?Produto
    {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE status_do_produto = 5");
        $stmt->execute();
        $row = $stmt->fetch();
        return $row ? $this->mapRowToEntity($row) : null;
    }

    public function procurarPorInativos(): ?Produto
    {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE status_do_produto= 0 ");
        $stmt->execute();
        $row = $stmt->fetch();
        return $row ? $this->mapRowToEntity($row) : null;
    }


    public function adicionarProduto(Produto $produto){
        $sql = "INSERT INTO produtos (codigo, nome, descricao, valor, quantidade, status_do_produto)
                VALUES (:codigo, :nome, :descricao, :valor, :quantidade, :status_do_produto)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':codigo' => $produto->codigo,
            ':nome' => $produto->nome,
            ':descricao' => $produto->descricao,
            ':valor' => $produto->valor,
            ':quantidade' => $produto->quantidade,
            ':status' => $produto->status
        ]);
    }

    public function atualizarProduto(Produto $p): bool
    {
        if ($p->id) {
            $sql = "UPDATE produtos
                    SET codigo=?, nome=?, descricao=?, valor=?, quantidade=?, status_do_produto=?
                    WHERE id=?";
            $data = [$p->codigo, $p->nome, $p->descricao, $p->valor,
                     $p->quantidade, $p->status, $p->id];
        } else {
            $sql = "INSERT INTO produtos
                      (codigo, nome, descricao, valor, quantidade, status_do_produto)
                    VALUES (?,?,?,?,?,?)";
            $data = [$p->codigo, $p->nome, $p->descricao, $p->valor,
                     $p->quantidade, $p->status];
        }
        $ok = $this->db->prepare($sql)->execute($data);

        if ($ok && !$p->id) {
            $p->id = (int) $this->db->lastInsertId();
        }
        return $ok;
    }

    public function delete(int $id): bool
    {
        return $this->db
            ->prepare("DELETE FROM produtos WHERE id=?")
            ->execute([$id]);
    }

    /* ---------- private helpers ---------- */

    private function mapRowToEntity(array $row): Produto
    {
        return new Produto(
            $row['codigo'],
            $row['nome'],
            $row['descricao'],
            (float) $row['valor'],
            (int)   $row['quantidade'],
            $row['status_do_produto'],
            (int)   $row['id']
        );
    }
}