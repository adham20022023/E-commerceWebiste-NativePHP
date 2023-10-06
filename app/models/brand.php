<?php 
include_once __DIR__.'\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class brand extends config implements operations{
    private $id;
    private $name_en;
    private $name_ar;
    private $status;
    private $image;
    private $category_id;
    private $created_at;
    private $updated_at;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getName_en() {
		return $this->name_en;
	}
	
	/**
	 * @param mixed $name_en 
	 * @return self
	 */
	public function setName_en($name_en): self {
		$this->name_en = $name_en;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getName_ar() {
		return $this->name_ar;
	}
	
	/**
	 * @param mixed $name_ar 
	 * @return self
	 */
	public function setName_ar($name_ar): self {
		$this->name_ar = $name_ar;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * @param mixed $status 
	 * @return self
	 */
	public function setStatus($status): self {
		$this->status = $status;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getImage() {
		return $this->image;
	}
	
	/**
	 * @param mixed $image 
	 * @return self
	 */
	public function setImage($image): self {
		$this->image = $image;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCreated_at() {
		return $this->created_at;
	}
	
	/**
	 * @param mixed $created_at 
	 * @return self
	 */
	public function setCreated_at($created_at): self {
		$this->created_at = $created_at;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getUpdated_at() {
		return $this->updated_at;
	}
	
	/**
	 * @param mixed $updated_at 
	 * @return self
	 */
	public function setUpdated_at($updated_at): self {
		$this->updated_at = $updated_at;
		return $this;
	}
	public function getCategory_id() {
		return $this->category_id;
	}
	
	/**
	 * @param mixed $category_id 
	 * @return self
	 */
	public function setCategory_id($category_id): self {
		$this->category_id = $category_id;
		return $this;
	}
    public function create(){

    }
    public function read(){

    }
    public function update(){

    }
    public function delete(){

    }
    
}
