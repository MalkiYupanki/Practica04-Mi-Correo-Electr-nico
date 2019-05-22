<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>

</head>

<body>
    <section>
        <header>
            <?php
            $cone = $_GET["cone"];
         //   echo $cone;
            $tm = strlen ( $cone );
         //   echo "mensaje- --- --";
            $ref = substr($cone,1, $tm - 2);
         //   echo $ref;
            ?>
            <table style="width:50%" border>
                <tr>
                    <th><a href="../../../config/cerra_sesion.php" >Inicio</a></th>
                    <th><a href="../../../public/vista/nuevo_mensaje.php?cone=<?php echo $ref;?>">Nuevo Mensaje</a></th>
                    <th><a href="../../../public/vista/mensajes_enviados.php?cone=<?php echo $ref;?>">Mensajes Enviados</a></th>
                    <th><a href="../../../public/vista/mi_cuenta.php?cone=<?php echo $ref;?>">Mi Cuenta</a></th>
                </tr>

            </table>
            <div>
                <input type="text" name="correobus" id="correobus" value="@">
            </div>

            <a href='../../../public/vista/login.html'>Cerrar cesion</a>

        </header>
    </section>
    <div>
        <table style="width:100%" border>
            <tr>
                <th>FECHA</th>
                <th>REMITENTE</th>
                <th>ASUNTO</th>
                <th>.</th>

            </tr>
            <?php
            include '../../../config/conexionBD.php';
            $vr = "NO";
            $sql = "SELECT * FROM mensaje WHERE men_destinatario ='$ref' AND men_eliminado = '$vr' ORDER BY men_fecha DESC;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "   <td>" . $row["men_fecha"] . "</td>";
                    echo "   <td>" . $row['men_remitente'] . "</td>";
                    echo "   <td>" . $row['men_asunto'] . "</td>";
                    echo "   <td>" . "<a href='../../../public/vista/leer_mensaje.php?cone=".$ref."&codigo=". $row['men_codigo'] ."'>Leer</a>" . "</td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo " <td colspan='4'> No existe Usuarios </td>";
                echo "</tr>";
            }

            $conn->close();

            ?>
        </table>
    </div>
</body>

</html>