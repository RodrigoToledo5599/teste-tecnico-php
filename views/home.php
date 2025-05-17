<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../repository/ProductRepository.php';

$repo = new ProductRepository();
$products = $repo->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Home - Lista de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Produtos</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($products) === 0): ?>
                <tr><td colspan="7" class="text-center">Nenhum produto encontrado.</td></tr>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['id']) ?></td>
                        <td><?= htmlspecialchars($product['codigo']) ?></td>
                        <td><?= htmlspecialchars($product['nome']) ?></td>
                        <td><?= htmlspecialchars($product['descricao']) ?></td>
                        <td>R$ <?= number_format($product['valor'], 2, ',', '.') ?></td>
                        <td><?= htmlspecialchars($product['quantidade']) ?></td>
                        <td><?= htmlspecialchars($product['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="logout.php" class="btn btn-danger">Sair</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>