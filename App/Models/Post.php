<?php
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Método para obtener todas las publicaciones del usuario autenticado
    public function getAllPostsPrivate($user_id)
    {
        $query = 'SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC';
        $this->db->query($query);
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }
    

    // Método para obtener todas las publicaciones al muro público
    public function getAllPublicPosts()
    {
        $this->db->query('
            SELECT * FROM posts 
            WHERE visibility = "public"
            ORDER BY created_at DESC
        ');
        return $this->db->resultSet();
    }

    // Método para obtener publicaciones globales considerando la visibilidad y la amistad
    public function getPostGlobal($user_id)
    {
        $this->db->query('
            SELECT p.*, u.username 
            FROM posts p
            LEFT JOIN friendships f ON p.user_id = f.friend_id AND f.user_id = :user_id
            LEFT JOIN users u ON p.user_id = u.id
            WHERE p.visibility = "public"
                OR (p.visibility = "friends" AND p.user_id IN (SELECT friend_id FROM friendships WHERE user_id = :user_id))
                OR (p.visibility = "friends" AND p.user_id IN (SELECT user_id FROM friendships WHERE friend_id = :user_id))
                OR (p.visibility = "private" AND p.user_id = :user_id)
            ORDER BY p.created_at DESC
        ');

        $this->db->bind(':user_id', $user_id);

        return $this->db->resultSet();
    }

    // Método para obtener una publicación por su ID
    public function getPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Método para agregar una nueva publicación
    public function addPost($title, $content, $user_id, $original_image_path, $thumbnail_path, $visibility)
    {
        $this->db->query('
            INSERT INTO posts (title, content, user_id, image_path, thumbnail_path, visibility) 
            VALUES (:title, :content, :user_id, :image_path, :thumbnail_path, :visibility)
        ');
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':image_path', $original_image_path);
        $this->db->bind(':thumbnail_path', $thumbnail_path);
        $this->db->bind(':visibility', $visibility);

        return $this->db->execute();
    }

    // Método para obtener el número de Me gusta de un post
    public function obtenerNumeroDeLikes($postId)
    {
        $this->db->query('SELECT COUNT(*) AS num_likes FROM likes WHERE post_id = :post_id');
        $this->db->bind(':post_id', $postId);
        $result = $this->db->single();

        return $result['num_likes']; // Devolver el número de Me gusta
    }

    // Método para obtener el número de comentarios de un post
    public function obtenerNumeroDeComentarios($postId)
    {
        $this->db->query('SELECT COUNT(*) AS num_comments FROM comments WHERE post_id = :post_id');
        $this->db->bind(':post_id', $postId);
        $result = $this->db->single();

        return $result['num_comments']; // Devolver el número de comentarios
    }

   // Método para obtener información adicional de amigo sobre los posts
public function getPostsWithFriendInfo($user_id)
{
    $this->db->query('
        SELECT p.*, u.username,
        CASE 
            WHEN p.user_id = :user_id THEN true 
            WHEN f.friend_id IS NOT NULL THEN true 
            ELSE false 
        END as is_friend
        FROM posts p
        LEFT JOIN friendships f ON (p.user_id = f.friend_id AND f.user_id = :user_id AND f.status = "accepted")
        LEFT JOIN users u ON p.user_id = u.id
        WHERE p.visibility = "public"
            OR (p.visibility = "friends" AND p.user_id IN (SELECT friend_id FROM friendships WHERE user_id = :user_id AND status = "accepted"))
            OR (p.visibility = "friends" AND p.user_id IN (SELECT user_id FROM friendships WHERE friend_id = :user_id AND status = "accepted"))
            OR (p.visibility = "private" AND p.user_id = :user_id)
        ORDER BY p.created_at DESC
    ');

    $this->db->bind(':user_id', $user_id);

    return $this->db->resultSet();
}

}
