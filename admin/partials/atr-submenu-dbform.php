<div class="wrap">
    <h3>Data Base Contactme</h3>
    <p>Aqui se guarda una copia de los correos de contacto desde el formulario contactme</p>
    <table class="wp-list-table widefat striped">
        <thead>
            <tr>
                <th class="manage-column">ID</th>
                <th class="manage-column">Nombre</th>
                <th class="manage-column">Correo</th>
                <th class="manage-column">Mensaje</th>
                <th class="manage-column">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                global $wpdb;

                $tabla = $wpdb->prefix . 'contactme';
                $registros = $wpdb->get_results("SELECT * FROM $tabla", ARRAY_A);

                foreach ( $registros as $registro ) :
            ?>

                <tr>
                    <td><?php echo $registro['id']; ?></td>
                    <td><?php echo $registro['nombre']; ?></td>
                    <td><?php echo $registro['correo']; ?></td>
                    <td><?php echo $registro['mensaje']; ?></td>
                    <td>
                        <a href="#" class="borrar-registro" data-dbform="<?php echo $registro['id']; ?>">Eliminar</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>