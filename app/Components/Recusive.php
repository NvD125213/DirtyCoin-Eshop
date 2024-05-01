<?php 
namespace App\Components;

use App\Models\tb_categories;

class Recusive {

    private $data;
    private $html = '';
    public function __construct($data) {
        $this->data=$data;
        
    }
    function categoriesRescusive($parent_id, $id = null, $text = '', $level = 0) 
    {
        foreach($this->data as $value) {
            if($value['parent_id'] == $id) {
                if(!empty($parent_id) && $value['id'] == $parent_id) {
                    $this->html .= "<option selected value = '" .$value['id']. "'>" . $text . '' . $value['name'] . "</option>";
                }
                else {
                    $this->html .= "<option value = '" .$value['id']. "'>" . $text . '' . $value['name'] . "</option>";
                }
    
                // Đảm bảo không vượt quá số lượng lặp cho phép
                if ($level < 10) {
                    $this->categoriesRescusive($parent_id, $value['id'], $text. '-', $level + 1);
                }
            }
        }
    
        return $this->html;
    }

}
   
?>