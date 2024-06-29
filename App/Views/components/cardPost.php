<?php if (!empty($posts)) : ?>
    <?php foreach ($posts as $post) : ?>
        <div class="post">
            <div style="display: flex;flex-direction: row-reverse; justify-content: end; text-align: end; position: relative;">
                <?php if ($post['user_id'] === $_SESSION['user_id']) : ?>
                    <a href="#" class="dropdown-toggle" id="dropdownToggle_<?php echo $post['id']; ?>" onclick="toggleDropdown(<?php echo $post['id']; ?>)">
                        <?php echo SVG_SETTING; ?>
                    </a>
                <?php endif; ?>

                <div class="dropdown-menu" id="dropdownMenu_<?php echo $post['id']; ?>" style="display: none;">
                    <a href="<?php echo PUBLIC_PATH; ?>post/edit?post_id=<?php echo $post['id']; ?>" class="dropdown-link">
                        <?php echo SVG_EDIT; ?>
                    </a>
                    <a href="#" class="dropdown-link" onclick="deletePost(<?php echo $post['id']; ?>)">
                        <?php echo SVG_DELETE; ?>
                    </a>
                </div>


            </div>

            <?php if (!isset($isProfile)) : ?>
                <h3>Publicado por:
                    <a href="">
                        <?php
                        if ($post['user_id'] === $user_id) {
                            echo "Tú";
                        } else {
                            echo htmlspecialchars($post['username']);
                        }
                        ?> <!-- Nombre de usuario -->
                    </a>
                </h3>
            <?php endif; ?>
            <h4><?php echo htmlspecialchars($post['title']); ?></h4>

            <?php if ($post['image_path']) : ?>
                <?php
                // Obtener el nombre del archivo de la imagen
                $image_filename = basename($post['image_path']);

                // Agregar el prefijo al nombre del archivo para la miniatura
                $thumbnail_filename = 'thumb_' . $image_filename;

                // Ruta completa de la miniatura
                $thumbnail_path = '../../Public/thumb/' . $thumbnail_filename;
                // Ruta completa de la original
                $thumbnail_path_original = '../../Public/uploads/' . $image_filename;
                ?>
                <img src="<?php echo htmlspecialchars($thumbnail_path_original); ?>" alt="Miniatura del post">
            <?php endif; ?>

            <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>

            <div class="post-info" style="display: flex; flex-direction: column;">
                <p>Publicado el <?php echo htmlspecialchars($post['created_at']); ?></p>
                <p>
                    <?php if ($post['visibility'] === 'public') : ?>
                        <?php if ($post['user_id'] === $_SESSION['user_id']) : ?>
                            <a href="#" class="visibility-link" data-post-id="<?php echo $post['id']; ?>" data-visibility="public">
                                <?php echo SVG_PUBLIC; ?>
                            </a>
                        <?php else : ?>
                            <?php echo SVG_PUBLIC; ?>
                        <?php endif; ?>
                    <?php elseif ($post['visibility'] === 'private') : ?>
                        <?php if ($post['user_id'] === $_SESSION['user_id']) : ?>
                            <a href="#" class="visibility-link" data-post-id="<?php echo $post['id']; ?>" data-visibility="private">
                                <?php echo SVG_PRIVATE; ?>
                            </a>
                        <?php else : ?>
                            <?php echo SVG_PRIVATE; ?>
                        <?php endif; ?>
                    <?php elseif ($post['visibility'] === 'friends') : ?>
                        <?php if ($post['user_id'] === $_SESSION['user_id']) : ?>
                            <a href="#" class="visibility-link" data-post-id="<?php echo $post['id']; ?>" data-visibility="friends">
                                <?php echo SVG_FRIENDS; ?>
                            </a>
                        <?php else : ?>
                            <?php echo SVG_FRIENDS; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        Otro contenido
                    <?php endif; ?>
                </p>

                <!-- Formulario oculto para cambiar la visibilidad -->
                <?php if ($post['user_id'] === $_SESSION['user_id']) : ?>
                    <div class="form-group visibility" style="display: none;">
                        <form method="POST" action="<?php echo PUBLIC_PATH; ?>post/changeVisibility" style="display: flex; flex-direction: column; align-items: center;">
                            <input type="hidden" name="post_id" id="post_id" value="<?php echo $post['id']; ?>">
                            <select name="visibility" id="visibility">
                                <option value="public" <?php echo ($post['visibility'] === 'public') ? 'selected' : ''; ?>>Público</option>
                                <option value="friends" <?php echo ($post['visibility'] === 'friends') ? 'selected' : ''; ?>>Solo amigos</option>
                                <option value="private" <?php echo ($post['visibility'] === 'private') ? 'selected' : ''; ?>>Solo yo</option>
                            </select>
                            <button type="submit" style="margin-top: 10px;">Guardar</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-post">
                <div class="actions">
                    <!-- botón me gusta -->
                    <a href="<?php echo PUBLIC_PATH; ?>like/toggleLike?post_id=<?php echo $post['id']; ?>" class="action-link like-link">
                        <?php echo SVG_LIKE; ?>
                        <span class="like-count">(<?php echo $post['likes_count']; ?>)</span>
                    </a>

                    <!-- botón comentarios -->
                    <a href="#" class="action-link comment-link">
                        <?php echo SVG_COMMENT; ?>
                        <span class="comment-count">(<?php echo $post['comments_count']; ?>)</span>
                    </a>
                </div>
            </div>

            <div class="comments-section">
                <form class="comment-form" method="POST" action="<?php echo PUBLIC_PATH; ?>comment/addComment">
                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                    <textarea name="content" rows="4" placeholder="Agregar un comentario..."></textarea>
                    <button type="submit">Comentar</button>
                </form>

                <div class="comments-list">
                    <?php foreach ($commentModel->getComments($post['id']) as $comment) : ?>
                        <div class="comment">
                            <p><?php echo htmlspecialchars($comment['content']); ?></p>
                            <small>Publicado por <?php echo htmlspecialchars($comment['user_id']); ?> el <?php echo htmlspecialchars($comment['created_at']); ?></small>
                            <?php if ($comment['user_id'] == $_SESSION['user_id']) : ?>
                                <a href="<?php echo PUBLIC_PATH; ?>comment/deleteComment?comment_id=<?php echo $comment['id']; ?>" class="delete-comment-link">Eliminar</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>No has realizado ninguna publicación aún.</p>
<?php endif; ?>
<script>
    function toggleDropdown(postId) {
        var dropdownMenu = document.getElementById('dropdownMenu_' + postId);
        if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
            dropdownMenu.style.display = 'block';
        } else {
            dropdownMenu.style.display = 'none';
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const visibilityLinks = document.querySelectorAll('.visibility-link');
        visibilityLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // Obtener los datos del post y la visibilidad actual
                const postId = this.getAttribute('data-post-id');
                const currentVisibility = this.getAttribute('data-visibility');

                // Encontrar el formulario oculto
                const visibilityForm = this.closest('.post-info').querySelector('.visibility');

                // Alternar la visibilidad del formulario
                if (visibilityForm.style.display === 'block') {
                    visibilityForm.style.display = 'none';
                } else {
                    // Ocultar cualquier otro formulario visible
                    document.querySelectorAll('.visibility').forEach(form => {
                        form.style.display = 'none';
                    });

                    // Mostrar el formulario correspondiente
                    visibilityForm.style.display = 'block';
                    visibilityForm.querySelector('#post_id').value = postId;
                    visibilityForm.querySelector('#visibility').value = currentVisibility;
                }
            });
        });
    });
</script>
<script>
    function deletePost(postId) {
        if (confirm('¿Estás seguro de que deseas eliminar este post?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?php echo PUBLIC_PATH; ?>post/delete';

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'post_id';
            input.value = postId;

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
