<?php

namespace Admin\Asm\Models;

use Admin\Asm\Commons\Model;

class Post extends Model
{

    public function getTop6()
    {
        try {
            $sql = "
                SELECT 
                    c.name          c_name,
                    p.id            p_id,
                    p.title         p_title,
                    p.excerpt       p_excerpt,
                    p.image         p_image
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
                ORDER BY p.id DESC
                LIMIT 6
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }


    public function getFirstLatest()
    {
        try {
            $sql = "
                SELECT 
                    c.name          c_name,
                    p.id            p_id,
                    p.title         p_title,
                    p.excerpt       p_excerpt,
                    p.image         p_image
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
                ORDER BY p.id DESC
                LIMIT 1
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getLastes(){

        try {
            $sql = "
                SELECT 
                    c.name          c_name,
                    p.id            p_id,
                    p.title         p_title,
                    p.excerpt       p_excerpt,
                    p.post_time        
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
                ORDER BY p.post_time DESC
                LIMIT 3
            ";
    
            $stmt = $this->conn->prepare($sql);
    
            $stmt->execute();
    
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
       }

    public function getAll()
    {
        try {
            $sql = "
                SELECT 
                    c.name      c_name,
                    p.id        p_id,
                    p.title     p_title,
                    p.excerpt   p_excerpt,
                    p.image     p_image,
                    p.content   p_content,
                    p.post_time  p_posttime
                    
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getByID($id)
    {
        try {
            $sql = "
                SELECT 
                    c.name          c_name,
                    p.id            p_id,
                    p.title         p_title,
                    p.excerpt       p_excerpt,
                    p.image         p_image,
                    p.content       p_content,
                    p.post_time     p_posttime,
                    p.category_id 
                FROM posts p
                INNER JOIN categories c
                    ON p.category_id = c.id
                WHERE p.id = :id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function insert($category_id, $title, $content, $post_time, $excerpt = null, $image = null)
    {
        try {
            $sql = "
                INSERT INTO posts(category_id, title, excerpt,post_time, content, image) 
                VALUES (:category_id, :title, :excerpt, :post_time, :content, :image) 
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':post_time', $post_time);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }


    public function update($id, $category_id, $title, $content, $post_time, $excerpt = null, $image = null)
    {
        try {
            $sql = "
                UPDATE posts 
                SET category_id     = :category_id, 
                    title           = :title, 
                    excerpt         = :excerpt, 
                    content         = :content, 
                    post_time       = :post_time,
                    image           = :image
                WHERE id = :id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':post_time', $post_time);
            $stmt->bindParam(':image', $image);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM posts WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
