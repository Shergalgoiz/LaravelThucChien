<?php 
    namespace App\Components;
    class Recusive {

        private $data;
        private $htmlSelect = '';
        
        public function __construct($data) {
            $this->data = $data;
        }

        public function categoryRecusive($partenID, $id = 0 ,  $text ='') {
            foreach ($this->data as $value) {
                if ($value['parten_id']==$id) {
                    if (!empty($partenID) && $partenID==$value['id']) {
                        $this -> htmlSelect .= "<option selected value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                    } else {
                        $this -> htmlSelect .= "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                    }
                    
                    $this -> categoryRecusive($partenID, $value['id'], $text . '-');
                }
            }
            return $this -> htmlSelect;
        }
    }
?>