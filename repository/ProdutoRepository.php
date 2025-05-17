<?php
require_once __DIR__ . '/../models/Produto.php';

class ProdutoRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /** @return Produto[] */
    public function all(): array
    {
        $rows = $this->db->query("SELECT * FROM produtos")->fetchAll();
        return array_map([$this, 'mapRowToEntity'], $rows);
    }

    public function findByCodigo(string $codigo): ?Produto
    {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE codigo = ?");
        $stmt->execute([$codigo]);
        $row = $stmt->fetch();
        return $row ? $this->mapRowToEntity($row) : null;
    }

    public function save(Produto $p): bool
    {
        if ($p->id) {
            $sql = "UPDATE produtos
                    SET codigo=?, nome=?, descricao=?, valor=?, quantidade=?, status=?
                    WHERE id=?";
            $data = [$p->codigo, $p->nome, $p->descricao, $p->valor,
                     $p->quantidade, $p->status, $p->id];
        } else {
            $sql = "INSERT INTO produtos
                      (codigo, nome, descricao, valor, quantidade, status)
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
            $row['status'],
            (int)   $row['id']
        );
    }
}