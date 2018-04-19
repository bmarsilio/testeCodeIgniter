<div class="row">
    <a href="/produto/create" class="btn btn-default">Novo produto</a>
</div>

<br />

<div class="table-responsive">
    <table class="table table-striped table-hover">

        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Valor</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($produtos as $produto): ?>

            <tr>
                <td>
                    <?php echo $produto['id'] ?>
                </td>

                <td>
                    <?php echo $produto['nome'] ?>
                </td>

                <td>
                    R$ <?php echo number_format($produto['valor'], 2, ',', '.') ?>
                </td>

                <td>
                    <a href="/produto/edit/<?php echo $produto['id'] ?>" class="btn btn-primary">Editar</a>
                    <a href="/produto/delete/<?php echo $produto['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>

    </table>
</div>
