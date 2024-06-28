<h2>Personas que quizás conozcas</h2>
<ul>
    <?php foreach ($availableUsers as $user) : ?>
        <?php if ($user['estado_amistad'] === 'disponible') : ?>
            <li>
                <div class="friend-pending">
                    <?= htmlspecialchars($user['username']) ?>
                </div>
                <div class="action-solicitud">
                    <a href="../Amigos/agregarAmigo?friend_id=<?= htmlspecialchars($user['id']) ?>">
                        <button>Enviar solicitud</button>
                    </a>
                </div>
            </li>
        <?php elseif ($user['estado_amistad'] === 'pendiente') : ?>
            <div class="friend-pending">
                <li><?= htmlspecialchars($user['username']) ?> - Pendiente</li>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
