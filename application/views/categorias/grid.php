<div class="row">
    <a href="/categoria/create" class="btn btn-default">Nova categoria</a>
</div>

<br />

<div class="table-responsive">
    <table class="table table-striped table-hover">

        <thead>
        <tr>
            <th>#</th>
            <th>Descrição</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($categorias as $categoria): ?>

            <tr>
                <td>
                    <?php echo $categoria['id'] ?>
                </td>

                <td>
                    <?php echo $categoria['descricao'] ?>
                </td>

                <td>
                    <a href="/categoria/edit/<?php echo $categoria['id'] ?>" class="btn btn-primary">Editar</a>
                    <a href="/categoria/delete/<?php echo $categoria['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>

    </table>
</div>
