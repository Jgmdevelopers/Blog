<h2>Personas que quizás conozcas</h2>
<ul>
    <?php foreach ($availableUsers as $user) : ?>
        <?php if ($user['estado_amistad'] === 'disponible' || $user['estado_amistad'] === 'rechazado') : ?>
            <li>
                <div class="friend-pending">
                    <?= htmlspecialchars($user['username']) ?>
                </div>
                <div class="action-solicitud">
                    <a href="<?php echo PUBLIC_PATH; ?>Amigos/agregarAmigo?friend_id=<?= htmlspecialchars($user['id']) ?>">
                        <button>Enviar solicitud</button>
                    </a>
                </div>
            </li>
        <?php elseif ($user['estado_amistad'] === 'pendiente') : ?>
            <li>
                <div class="friend-pending">
                    <?= htmlspecialchars($user['username']) ?> - Pendiente
                </div>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
