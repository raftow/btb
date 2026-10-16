<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table room_booking : room_booking - حجوزات الغرف 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class RoomBooking extends BtbObject{

        public static $MY_ATABLE_ID=13781; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		hroom_id => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 40,  MAXLENGTH => 40,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => hroom,  ANSMODULE => btb,  
				RELATION => OneToMany,  READONLY => true, ),

		'booking_id' => array(SHORTNAME => booking,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => booking,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true, ),

		start_datetime => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 10,  MAXLENGTH => 10,  REQUIRED => true,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "GDAT",  READONLY => true, ),

		start_date => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  REQUIRED => true,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "DATE",  READONLY => true, ),

		start_time => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 8,  MAXLENGTH => 8,  REQUIRED => true,  UTF8 => false,  
				TYPE => "TIME",  READONLY => true, ),

		end_datetime => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => false,  QEDIT => false,  
				SIZE => 10,  MAXLENGTH => 10,  REQUIRED => true,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "GDAT",  READONLY => true, ),

		end_date => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  REQUIRED => true,  FORMAT => HIJRI_UNIT,  UTF8 => false,  
				TYPE => "DATE",  READONLY => true, ),

		end_time => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 8,  MAXLENGTH => 8,  REQUIRED => true,  UTF8 => false,  
				TYPE => "TIME",  READONLY => true, ),

		leave_time => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 8,  MAXLENGTH => 8,  REQUIRED => true,  UTF8 => false,  
				TYPE => "TIME",  READONLY => true, ),

                
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
		parent::__construct("room_booking","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "hroom_id, booking_id";
                $this->horizontalTabs = true;
                 
                
                $this->UNIQUE_KEY = array('hroom_id','booking_id');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
        
        public static function loadById($id)
        {
           $obj = new RoomBooking();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($hroom_id, $booking_id,$create_obj_if_not_found=false)
        {
           $obj = new RoomBooking();
           if(!$hroom_id) throw new AfwRuntimeException("loadByMainIndex : hroom_id is mandatory field");
           if(!$booking_id) throw new AfwRuntimeException("loadByMainIndex : booking_id is mandatory field");


           $obj->select("hroom_id",$hroom_id);
           $obj->select("booking_id",$booking_id);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("hroom_id",$hroom_id);
                $obj->set("booking_id",$booking_id);

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
               

               list($data[0],$link[0]) = $this->displayAttribute("hroom_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("booking_id",false, $lang);

               
               return implode(" - ",$data);
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