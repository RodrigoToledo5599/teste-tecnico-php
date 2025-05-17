<?php

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
    <br>
    <a href="btn btn-primary"></a>
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
            <?php if (count($produtos) === null): ?>
                <tr><td colspan="7" class="text-center">Nenhum produto encontrado.</td></tr>
            <?php else: ?>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= htmlspecialchars($produto->id) ?></td>
                        <td><?= htmlspecialchars($produto->codigo) ?></td>
                        <td><?= htmlspecialchars($produto->nome) ?></td>
                        <td><?= htmlspecialchars($produto->descricao) ?></td>
                        <td>R$ <?= number_format($produto->valor, 2, ',', '.') ?></td>
                        <td><?= htmlspecialchars($produto->quantidade) ?></td>
                        <td><?= htmlspecialchars($produto->status_do_produto == TRUE ? 'ativo': 'inativo'  ) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="logout.php" class="btn btn-primary">Ativos</a>
    <a href="logout.php" class="btn btn-secondary">Inativos</a>
    <a href="logout.php" class="btn btn-primary">A</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>