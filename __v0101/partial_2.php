       /* $this->meallist = array();

        $qr = $this->db->get('Meals');
        
        $i = 0;
        foreach($qr->result_array() as $row){
            //print_r($row);
            $this->meallist[$i] = new Meal();
            $this->meallist[$i]->load_meal($row);
            $i++;
            
        }
        //$this->text_print();*/