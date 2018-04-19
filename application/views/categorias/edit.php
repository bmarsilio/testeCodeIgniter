<?php echo validation_errors(); ?>

<div class="row">
    <a href="/categoria/grid" class="btn btn-default">Voltar</a>
</div>

<br />

<?php echo form_open('categoria/update/'.$id); ?>

<div class="form-group">
    <label for="title">Descrição *</label>
    <input type="input" name="descricao" class="form-control" required value="<?php echo $descricao ?>"/><br />
</div>

<hr />

<div class="form-group">
    <input type="submit" name="submit" value="Enviar" class="btn btn-success"/>
</div>

</form>
