<!-- profile.php -->
<?php if (isset($pendingRequests) && !empty($pendingRequests)) : ?>
    <ul>
        <?php foreach ($pendingRequests as $request) : ?>
            <li>
                <div class="friend-pending">
                    <?= htmlspecialchars($request['username']) ?>
                </div>
                <?php if ($request['status'] === 'pending') : ?>
                    <?php if ($request['user_id'] == $_SESSION['user_id']) : ?>
                        <div class="action-solicitud">
                            <a href="../Amigos/cancelarSolicitud?friend_id=<?= htmlspecialchars($request['friend_id']) ?>&user_id=<?= htmlspecialchars($request['user_id']) ?>"><button>Cancelar</button></a>
                        </div>
                    <?php else : ?>
                        <div class="action-solicitud">
                            <a href="../Amigos/aceptarAmigo?friend_id=<?= htmlspecialchars($request['user_id']) ?>"><button>Aceptar</button></a>
                            <a href="../Amigos/cancelarSolicitud?friend_id=<?= htmlspecialchars($request['user_id']) ?>&user_id=<?= htmlspecialchars($request['friend_id']) ?>"><button>Rechazar</button></a>
                        </div>


                    <?php endif; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>

    </ul>
<?php else : ?>
    <p>No tienes solicitudes de amistad pendientes.</p>
<?php endif; ?>
