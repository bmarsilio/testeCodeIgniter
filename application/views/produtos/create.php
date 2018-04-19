<?php echo validation_errors(); ?>

<div class="row">
    <a href="/produto/grid" class="btn btn-default">Voltar</a>
</div>

<br />

<?php echo form_open('produto/store'); ?>

<div class="form-group">
    <label for="categoria_id">Categoria *</label>
    <select class="form-control" name="categoria_id" required>
        <?php foreach ($categorias as $categoria): ?>
        <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['descricao'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="nome">Nome *</label>
    <input type="input" name="nome" class="form-control" required/>
</div>

<div class="form-group">
    <label for="descricao">Descrição *</label>
    <textarea name="descricao" class="form-control" required></textarea>
</div>

<div class="form-group">
    <label for="valor">Valor *</label>
    <input type="number" name="valor" class="form-control" step="any" required/>
</div>

<hr />

<div class="form-group">
    <input type="submit" name="submit" value="Enviar" class="btn btn-success"/>
</div>

</form>
