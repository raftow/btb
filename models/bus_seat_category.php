<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table bus_seat_category : bus_seat_category - تصنيفات مقاعد الباصات 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class BusSeatCategory extends BtbObject{

        public static $MY_ATABLE_ID=13790; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		bus_id => array(SHORTNAME => bus, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => bus,  ANSMODULE => btb,  AUTOCOMPLETE => false, INPUT_WIDE => true,  
				RELATION => OneToMany,  READONLY => true, ),

		seat_category_enum => array(SHORTNAME => category,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => ENUM,  ANSWER => "FUNCTION", READONLY => false, ),

		seat_list => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 96,  MAXLENGTH => 255,  "MIN-SIZE" => 2,  CHAR_TEMPLATE => "ALPHABETIC,COMMAS,NUMERIC",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

                
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                active => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                draft => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("bus_seat_category","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "bus_id, seat_category_enum";
                $this->horizontalTabs = true;
                 
                
                $this->UNIQUE_KEY = array('bus_id','seat_category_enum');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
        
        public static function loadById($id)
        {
           $obj = new BusSeatCategory();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($bus_id, $seat_category_enum,$create_obj_if_not_found=false)
        {
           $obj = new BusSeatCategory();
           if(!$bus_id) throw new AfwRuntimeException("loadByMainIndex : bus_id is mandatory field");
           if(!$seat_category_enum) throw new AfwRuntimeException("loadByMainIndex : seat_category_enum is mandatory field");


           $obj->select("bus_id",$bus_id);
           $obj->select("seat_category_enum",$seat_category_enum);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("bus_id",$bus_id);
                $obj->set("seat_category_enum",$seat_category_enum);

                $obj->insert();
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }


        public function getDisplay($lang="ar")
        {
               
               $data = array();
               $link = array();
               
               $bus = $this->hetBus();
               if($bus) $data[0] = $bus->getShortDisplay($lang);
               else $data[0] = "unknown-bus";
               
               list($data[1],$link[1]) = $this->displayAttribute("seat_category_enum",false, $lang);

               
               return implode(" - ",$data);
        }
        
        
        
        public function list_of_seat_category_enum() { 
            $list_of_items = array(); 
            $list_of_items[5] = "مقعد سرير";  //     code : BED 
            $list_of_items[7] = "بجانب الباب";  //     code : DOOR 
            $list_of_items[2] = "مقعد أمامي";  //     code : FRONT 
            $list_of_items[4] = "الدرجة الذهبية";  //     code : GOLDEN 
            $list_of_items[1] = "عادي";  //     code : NORMAL 
            $list_of_items[3] = "الدرجة الفضية";  //     code : SILVER 
            $list_of_items[6] = "بجانب النافذة";  //     code : WINDOW 
            $list_of_items[8] = "لم يتم انشاؤه بعد";  //     code : WINDOW 
           return  $list_of_items;
        }
        
        
        public static function code_of_seat_category($seat_category) { 
             
            $code = "unknown";
            if($seat_category==1) $code = "normal"; 
            if($seat_category==2) $code = "front"; 
            if($seat_category==3) $code = "silver"; 
            if($seat_category==4) $code = "golden"; 
            if($seat_category==5) $code = "bed"; 
            if($seat_category==6) $code = "window"; 
            if($seat_category==7) $code = "door"; 
            if($seat_category==8) $code = "togenerate";
           
           return  $code;
        } 
        
        
        public function getSeatCategoryCode()
        {
               $seat_category = intval($this->getVal("seat_category_enum"));
               return self::code_of_seat_category($seat_category);
        }

        public static function getAllActivatedCategories($activated_categs=array())
        {
            $obj = new BusSeatCategory();
            return $obj->getAllCategories($activated_categs);
        }
        
        public function getAllCategories($activated_categs=array())
        {
               $list_of_seat_category = $this->list_of_seat_category_enum();
               $all_arr = array();
               for($c=1;$c<=8;$c++)
               {
                   if((!$activated_categs) or (in_array($c,$activated_categs)))
                   {
                           $row_c = array();
                           $row_c["code"] = self::code_of_seat_category($c);
                           $row_c["title"] = $list_of_seat_category[$c];
                           $all_arr[] = $row_c;
                   }
               }
               
               return $all_arr;
        }



        
        protected function getPublicMethods()
        {
            
            $pbms = array();
            
            $color = "green";
            $title_ar = "xxxxxxxxxxxxxxxxxxxx"; 
            //$pbms["xc123B"] = array("METHOD"=>"methodName","COLOR"=>$color, "LABEL_AR"=>$title_ar, "ADMIN-ONLY"=>true, "BF-ID"=>"");
            
            
            
            return $pbms;
        }
        
        
        
        
        public function beforeDelete($id,$id_replace) 
        {
            global $server_db_prefix;
            
            if($id)
            {   
               if($id_replace==0)
               {
                   // FK part of me - not deletable 

                        
                   // FK part of me - deletable 

                   
                   // FK not part of me - replaceable 

                        
                   
                   // MFK

               }
               else
               {
                        // FK on me 

                        
                        // MFK

                   
               } 
               return true;
            }    
	}
             
}
?>