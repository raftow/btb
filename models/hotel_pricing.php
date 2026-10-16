<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table hotel_pricing : hotel_pricing - أسعار الباصات 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class HotelPricing extends BtbObject{

        public static $MY_ATABLE_ID=13785; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		hotel_id => array(SHORTNAME => hotel, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => hotel,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true,  DNA => true, ),
                
		roombed_enum => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => false,  UTF8 => false,  
				TYPE => ENUM,  ANSWER => "FUNCTION",  READONLY => true,  "EDIT-SHORT-LIST" => true, ),

		week_period_enum => array(SHORTNAME => period,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => false,  UTF8 => false,  
				TYPE => ENUM,  ANSWER => "FUNCTION",  READONLY => true,  "EDIT-SHORT-LIST" => true, ),
                  
		period_type_enum => array(SHORTNAME => type,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => false,  UTF8 => false,  
				TYPE => ENUM,  ANSWER => "FUNCTION",  READONLY => true,  "EDIT-SHORT-LIST" => true, ),

		yperiod_id => array(SHORTNAME => yperiod,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  UTF8 => false,  
				TYPE => FK,  ANSWER => yperiod,  ANSMODULE => btb,  
				RELATION => ManyToOne,  READONLY => true, ),
                
                period_title  => array(SHOW => true, EDIT => true,  QEDIT => true,  READONLY => true, MANDATORY => true, CATEGORY => FORMULA,  TYPE => TEXT),

		price => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  AUDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => "FLOAT",  UNIT => "ريال",  UNIT_EN => "SAR", FORMAT=>"*.2" ,  READONLY => false, ),

                
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
		parent::__construct("hotel_pricing","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "hotel_id, roombed_enum, week_period_enum, period_type_enum, yperiod_id";
                $this->horizontalTabs = true;
                $this->AUDIT_DATA = true; 
                
                $this->UNIQUE_KEY = array('hotel_id','roombed_enum','week_period_enum','period_type_enum','yperiod_id');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
	}
        
        public function list_of_roombed_enum() { 
            $list_of_items = array(); 
            $list_of_items[1] = "سرير عزابي";
            $list_of_items[2] = "غرفة سريرين";
            $list_of_items[3] = "غرفة 3 أسرّة";
            $list_of_items[4] = "غرفة 4 أسرّة";
            $list_of_items[5] = "غرفة 5 أسرّة";
            $list_of_items[6] = "غرفة 6 أسرّة";
             
           return  $list_of_items;
        }
        
        public function list_of_week_period_enum() { 
            $list_of_items = array(); 
            $list_of_items[1] = "ويكاند";
            $list_of_items[2] = "وسط الأسبوع";
             
           return  $list_of_items;
        }
        
        public function list_of_period_type_enum() { 
            $list_of_items = array(); 
            $list_of_items[1] = "فترة عادية";
            $list_of_items[2] = "فترة موسمية";
             
           return  $list_of_items;
        }
        
        public static function loadById($id)
        {
           $obj = new HotelPricing();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($hotel_id, $roombed_enum, $week_period_enum, $period_type_enum, $yperiod_id,$create_obj_if_not_found=false)
        {
           $obj = new HotelPricing();
           if(!$hotel_id) throw new AfwRuntimeException("loadByMainIndex : hotel_id is mandatory field");
           if(!$roombed_enum) throw new AfwRuntimeException("loadByMainIndex : travel_program_id is mandatory field");
           
           //if(!$week_period_enum) throw new AfwRuntimeException("loadByMainIndex : week_period_enum is mandatory field");
           //if(!$period_type_enum) throw new AfwRuntimeException("loadByMainIndex : period_type_enum is mandatory field");


           $obj->select("hotel_id",$hotel_id);
           $obj->select("roombed_enum",$roombed_enum);
           $obj->select("week_period_enum",$week_period_enum);
           $obj->select("period_type_enum",$period_type_enum);
           $obj->select("yperiod_id",$yperiod_id);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("hotel_id",$hotel_id);
                $obj->set("roombed_enum",$roombed_enum);
                $obj->set("week_period_enum",$week_period_enum);
                $obj->set("period_type_enum",$period_type_enum);
                $obj->set("yperiod_id",$yperiod_id);

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
               

               list($data[0],$link[0]) = $this->displayAttribute("hotel_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("roombed_enum",false, $lang);
               list($data[3],$link[3]) = $this->displayAttribute("week_period_enum",false, $lang);
               list($data[4],$link[4]) = $this->displayAttribute("period_type_enum",false, $lang);
               list($data[5],$link[5]) = $this->displayAttribute("yperiod_id",false, $lang);

               
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
        
  
               
               
               
        public function calcPeriod_title()
        {
            $lang = AfwLanguageHelper::getGlobalLanguage();
            
              $data = [];
              $link = [];
              
              list($data[],$link[]) = $this->displayAttribute("week_period_enum",false, $lang);
              list($data[],$link[]) = $this->displayAttribute("period_type_enum",false, $lang);
              //list($data[],$link[]) = $this->displayAttribute("yperiod_id",false, $lang);
              return implode("-",$data);
        }
        
        public function attributeIsApplicable($attribute)
        {
              if($attribute=="price")
              {
                 $hotel = $this->hetHotel(); 
                 $roombed_enum = $this->getVal("roombed_enum"); 
                 $week_period_enum = $this->getVal("week_period_enum"); 
                 $period_type_enum = $this->getVal("period_type_enum");
                 $roombed_men_arr = array();
                 $week_period_men_arr = array();
                 $period_type_men_arr = array();
                 if($hotel)
                 {
                     $roombed_men = $hotel->getVal("roombed_men");
                     $week_period_men = $hotel->getVal("week_period_men");
                     $period_type_men = $hotel->getVal("period_type_men");
                     
                     $roombed_men_arr = explode(",",trim($roombed_men,","));
                     $week_period_men_arr = explode(",",trim($week_period_men,","));
                     $period_type_men_arr = explode(",",trim($period_type_men,",")); 
                 }
                 
                 return (in_array($roombed_enum, $roombed_men_arr) and
                         in_array($week_period_enum, $week_period_men_arr) and 
                         in_array($period_type_enum, $period_type_men_arr));
                 
              } 
              
              return true;
        }
        
        
        
             
}
?>