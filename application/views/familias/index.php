<div class="content" style="min-height: 500px;">
    <div class="" style="width: 420px;float: left;">
    <h1>Asignar Familias</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <!--<form method="post" action="<?php echo URL;?>pastores/create">
        <label>Nombre del Pastor: </label>
        <input type="text" name="name" />
        <label>Ciudad: </label>
        <input type="text" name="city" />
         <label>Correo: </label>
        <input type="text" name="mail" />
        <input type="submit" value='Agregar Pastor' autocomplete="off" />

    </form> -->
    </div>
     <div class="">
    <h2 style="margin-top: 100px;">Lista de Jovenes</h2>

    <table border='1'>
        <thead>
        <th style="font-weight:bold;">Nombre</th>
        <th style="font-weight:bold;">Ciudad</th>
        <th style="font-weight:bold;">Email</th>
        </thead>
        <tbody>
    <?php
        if ($this->familias) {
            foreach($this->familias as $key => $value) {
                echo '<tr>';
                echo '<td>' . htmlentities($value->nombre_joven) . '</td>';
                echo '<td>' . htmlentities($value->ciudad) . '</td>';
                echo '<td>' . htmlentities($value->email) . '</td>';
                echo '<td><a href="'. URL . 'familias/edit/' . $value->pkUsuario.'">Edit</a></td>';
                echo '<td><a href="'. URL . 'familias/delete/' . $value->pkUsuario.'">Delete</a></td>';
                echo '</tr>';
            }
        } else {
            echo 'No pastores yet. Create some !';
        }
        
    ?></tbody>
    </table>
    </div>
</div>
