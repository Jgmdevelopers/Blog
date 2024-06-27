<?php if (!empty($posts)) : ?>
    <?php foreach ($posts as $post) : ?>
        <div class="post">

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
                        <a href="editar_post.php?id=<?php echo $post['id']; ?>">
                            <?php echo SVG_PUBLIC; ?>
                        </a>
                    <?php elseif ($post['visibility'] === 'private') : ?>
                        <?php echo SVG_PRIVATE; ?>
                    <?php elseif ($post['visibility'] === 'friends') : ?>
                        <?php echo SVG_FRIENDS; ?>
                    <?php else : ?>
                        Otro contenido
                    <?php endif; ?>
                </p>


               
            </div>

            <?php if ($post['user_id'] == $_SESSION['user_id'] || $post['is_friend']) : ?>

                <div class="footer-post">
                    <div class="actions">
                        <!-- boton me gusta -->
                        <a href="#" class="action-link">
                            <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 744.899 744.9" xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <path d="M623.3,714.15L623.3,714.15l-100.9-0.2c-0.5,0-53.899-1.7-93.199-22.3l-95.101-0.101c-0.899,0-1.7,0-2.6,0 c-25.9,0-45.8-8.1-59.2-24c-11.4-13.5-17.4-32.6-17.4-55.1l-1-297.9c-1.1-20.7,3.6-40.4,13.4-55.4c10.5-16.1,26-25.9,43.7-27.7 c17-1.7,42.8-2.6,54.8-3l49.6-124.2c2.5-27.2,11.301-47.3,26.2-59.8c13.5-11.3,28.601-13.7,39-13.7c5.601,0,10.3,0.7,13,1.4 c21.4,5,37.101,16.7,46.8,34.7c9.7,18.1,12.9,42.1,9.5,71.2c-2.5,21.4-8,40-10.8,47.5c-6.7,17.3-13.8,37.5-17,48.9l151.5,0.1 c20.9,0,39.7,9.6,52.9,26.9c11.8,15.6,18.399,36,18.399,57.6v0.7l-0.1,0.7l-42,315.399C696.899,684.849,667.2,714.15,623.3,714.15z M522.5,694.15l100.8,0.199c33.4,0,55.2-22.199,59.8-61v-0.1l41.9-314.8c-0.2-31.2-18.3-64.1-51.4-64.1l-162.2-0.1 c-3.5,0-6.699-1.7-8.699-4.6c-3.4-4.9-3.7-10.3,7.1-41.6c5.1-14.9,10.8-29.4,10.8-29.6c6.101-16.2,19.7-69.9,2.4-102.3 c-7-13-18.101-21.1-34-24.8l-0.4-0.1c-0.7-0.2-3.8-0.8-8-0.8c-18.7,0-41.8,9.9-45.6,56.8l-0.101,1.5l-55.6,139.1l-6.5,0.1 c-0.4,0-38.2,0.9-59.8,3.1c-24.8,2.5-41.3,28.8-39.4,62.6v0.5l1,298.2c0,17.801,4.4,32.4,12.7,42.4c9.8,11.7,25.4,17.4,46.3,16.9 h0.2l100.2,0.1l2.2,1.2C470.399,691.849,520.3,694.15,522.5,694.15z"></path>
                                        <path d="M148.9,697.25H50.3c-27.7,0-50.3-22.6-50.3-50.3v-383.6c0-27.7,22.6-50.3,50.3-50.3h98.5c27.7,0,50.3,22.6,50.3,50.3v383.7 C199.1,674.75,176.6,697.25,148.9,697.25z M50.3,232.85c-16.8,0-30.5,13.7-30.5,30.5v383.7c0,16.8,13.7,30.5,30.5,30.5h98.5 c16.8,0,30.5-13.7,30.5-30.5v-383.7c0-8.1-3.2-15.8-8.9-21.6c-5.8-5.8-13.4-8.9-21.5-8.9H50.3z"></path>
                                        <path d="M99.6,640.95c-25.4,0-46.1-20.7-46.1-46.101c0-25.399,20.7-46.1,46.1-46.1c25.4,0,46.1,20.7,46.1,46.1 C145.7,620.25,125,640.95,99.6,640.95z M99.6,568.549c-14.5,0-26.3,11.8-26.3,26.3s11.8,26.301,26.3,26.301 s26.3-11.801,26.3-26.301S114.1,568.549,99.6,568.549z"></path>
                                    </g>
                                </g>
                            </svg>
                            <span>(0)</span> <!-- Contador -->
                        </a>
                        <!-- boton comentarios -->
                        <a href="#" class="action-link">
                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <path fill="#231F20" d="M60,0H16c-2.211,0-4,1.789-4,4v6H4c-2.211,0-4,1.789-4,4v30c0,2.211,1.789,4,4,4h7c0.553,0,1,0.447,1,1v11 c0,1.617,0.973,3.078,2.469,3.695C14.965,63.902,15.484,64,16,64c1.039,0,2.062-0.406,2.828-1.172l14.156-14.156 c0,0,0.516-0.672,1.672-0.672S50,48,50,48c2.211,0,4-1.789,4-4v-8h6c2.211,0,4-1.789,4-4V4C64,1.789,62.211,0,60,0z M52,44 c0,1.105-0.895,2-2,2c0,0-14.687,0-15.344,0C32.709,46,32,47,32,47S20,59,18,61c-2.141,2.141-4,0.391-4-1c0-1,0-12,0-12 c0-1.105-0.895-2-2-2H4c-1.105,0-2-0.895-2-2V14c0-1.105,0.895-2,2-2h46c1.105,0,2,0.895,2,2V44z M62,32c0,1.105-0.895,2-2,2h-6V14 c0-2.211-1.789-4-4-4H14V4c0-1.105,0.895-2,2-2h44c1.105,0,2,0.895,2,2V32z"></path>
                                        <path fill="#231F20" d="M13,24h13c0.553,0,1-0.447,1-1s-0.447-1-1-1H13c-0.553,0-1,0.447-1,1S12.447,24,13,24z"></path>
                                        <path fill="#231F20" d="M41,28H13c-0.553,0-1,0.447-1,1s0.447,1,1,1h28c0.553,0,1-0.447,1-1S41.553,28,41,28z"></path>
                                        <path fill="#231F20" d="M34,34H13c-0.553,0-1,0.447-1,1s0.447,1,1,1h21c0.553,0,1-0.447,1-1S34.553,34,34,34z"></path>
                                    </g>
                                </g>
                            </svg>
                            <span>(0)</span> <!-- Contador -->
                        </a>
                        <!-- <a href="#" class="action-link">Enviar</a>
                            <a href="#" class="action-link">Compartir</a> -->
                    </div>
                </div>

            <?php endif; ?>

        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>No has realizado ninguna publicación aún.</p>
<?php endif; ?>