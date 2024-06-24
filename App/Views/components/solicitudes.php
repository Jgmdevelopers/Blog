<!-- profile.php -->
<?php if (isset($pendingRequests) && !empty($pendingRequests)) : ?>
    <ul>
        <?php foreach ($pendingRequests as $request) : ?>
            <li>
                <?= htmlspecialchars($request['username']) ?>
                <?php if ($request['status'] === 'pending') : ?>
                    <?php if ($request['user_id'] == $_SESSION['user_id']) : ?>
                        <a href="../Amigos/cancelarSolicitud?friend_id=<?= htmlspecialchars($request['friend_id']) ?>&user_id=<?= htmlspecialchars($request['user_id']) ?>"><button>Cancelar</button></a>

                    <?php else : ?>
                        <a href="../Amigos/aceptarAmigo?friend_id=<?= htmlspecialchars($request['user_id']) ?>"><button>Aceptar</button></a>
                        <a href="../Amigos/cancelarSolicitud?friend_id=<?= htmlspecialchars($request['user_id']) ?>&user_id=<?= htmlspecialchars($request['friend_id']) ?>"><button>Rechazar</button></a>


                    <?php endif; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>

    </ul>
<?php else : ?>
    <p>No tienes solicitudes de amistad pendientes.</p>
<?php endif; ?>
<style>
    /* Estilos para la lista de solicitudes de amistad pendientes */
    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        margin-bottom: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        background-color: #fff;
        border-radius: 5px;
    }

    /* Estilos para el nombre de usuario */
    li span.username {
        font-weight: bold;
        color: #333;
    }

    /* Estilos para los botones de aceptar y rechazar */
    li a.button {
        display: inline-block;
        margin-right: 5px;
        padding: 5px 10px;
        background-color: #4CAF50;
        /* Color verde para el botón de aceptar */
        color: white;
        text-decoration: none;
        border-radius: 3px;
    }

    li a.button.reject {
        background-color: #f44336;
        /* Color rojo para el botón de rechazar */
    }

    /* Estilos para el mensaje de solicitud enviada */
    li span.sent-message {
        color: #999;
    }
</style>