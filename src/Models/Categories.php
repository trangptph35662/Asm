<?php
namespace Admin\Asm\Models ;
use Admin\Asm\Commons\Model;

class Categories extends Model{

    public function getForMenu() {
        try {    
            $sql = "SELECT id, name FROM categories";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();
        
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    

    public function getPostsByCategory($category_id){
        try{
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
            INNER JOIN categories c    ON p.category_id = c.id  WHERE c.id = :category_id
        ";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':category_id', $category_id);

            $stmt->execute();
            
            return  $stmt->fetchAll();
        }catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }


    public function getAll() {
        try {    
            $sql = "SELECT * FROM categories";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();
        
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getByID($id) {
        try {    
            $sql = "SELECT * FROM categories WHERE id = :id";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function insert($name) {
        try {    
            $sql = "
                INSERT INTO categories(name) 
                VALUES (:name)
            ";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->bindParam(':name', $name);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function update($id, $name) {
        try {    
            $sql = "
                UPDATE categories 
                SET name = :name
                WHERE id = :id
            ";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id) {
        try {    
            $sql = "DELETE FROM categories WHERE id = :id";
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}