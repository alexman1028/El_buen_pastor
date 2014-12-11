<div class="content">
    <h1>Asignando familia</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <?php if ($this->familia) { ?>
        <form method="post" action="<?php echo URL; ?>familias/editSave/<?php echo $this->familia->pkUsuario; ?>">
            <label>Nombre: </label>
            <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
            <input type="text" name="nombre_joven" value="<?php echo htmlentities($this->familia->nombre_joven); ?>" />
            <label>Ciudad de origen: </label>
            <input type="text" name="ciudad" value="<?php echo htmlentities($this->familia->ciudad); ?>" />
            <label>Familia: </label>
            <input type="text" name="familia" value="<?php echo htmlentities($this->familia->familia); ?>" />
            <input type="submit" value='Change' />
        </form>
    <?php } else { ?>
        <p>This Pastor does not exist.</p>
    <?php } ?>
</div>
