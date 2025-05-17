<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Cadastro de Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm p-4" style="width: 450px;">
        <h3 class="card-title mb-4 text-center">Cadastrar Produto</h3>
        <form action="/produtos/create" method="post">
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código único" required maxlength="20">
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do produto" required maxlength="100">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição do produto" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor (R$)</label>
                <input type="number" step="0.01" min="0" name="valor" id="valor" class="form-control" placeholder="0,00" required>
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" min="0" name="quantidade" id="quantidade" class="form-control" placeholder="0" required>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="status_do_produto" id="status_do_produto" class="form-check-input" checked>
                <label class="form-check-label" for="status_do_produto">Produto ativo</label>
            </div>
            <button type="submit" class="btn btn-success w-100">Cadastrar Produto</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
