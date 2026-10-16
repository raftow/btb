<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table travel_template_seat_pricing : travel_template_seat_pricing - أسعار مقاعد برنامج رحلة 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelTemplateSeatPricing extends BtbObject{

        public static $MY_ATABLE_ID=13785; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		travel_template_id => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true, SHORTNAME => template, 
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => travel_template,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true,  DNA => true, ),

		seat_category_enum => array(SHORTNAME => category,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
                                EDIT => true,  QEDIT => true,  
                                SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
                                TYPE => ENUM,  ANSWER => "FUNCTION", READONLY => false, ),

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

		'price' => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
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
		parent::__construct("travel_template_seat_pricing","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "travel_template_id, seat_category_enum, week_period_enum, period_type_enum, yperiod_id";
                $this->horizontalTabs = true;
                 
                
                $this->UNIQUE_KEY = array('travel_template_id','seat_category_enum','week_period_enum','period_type_enum','yperiod_id');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                $this->after_save_edit = array("class"=>'TravelTemplate',"attribute"=>'travel_template_id', "currmod"=> 'btb',"currstep"=>8);
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
           $obj = new TravelTemplateSeatPricing();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($travel_template_id, $seat_category_enum, $week_period_enum, $period_type_enum, $yperiod_id,$create_obj_if_not_found=false)
        {
           global $arrTravelTemplateSeatPricingCache;

           if($arrTravelTemplateSeatPricingCache["$travel_template_id-$seat_category_enum-$week_period_enum-$period_type_enum-$yperiod_id"]) return $arrTravelTemplateSeatPricingCache["$travel_template_id-$seat_category_enum-$week_period_enum-$period_type_enum-$yperiod_id"];
            $obj = new TravelTemplateSeatPricing();
           if(!$travel_template_id) throw new AfwRuntimeException("loadByMainIndex : travel_template_id is mandatory field");
           if(!$seat_category_enum) throw new AfwRuntimeException("loadByMainIndex : seat_category_enum is mandatory field");
           //if(!$week_period_enum) throw new AfwRuntimeException("loadByMainIndex : week_period_enum is mandatory field");
           //if(!$period_type_enum) throw new AfwRuntimeException("loadByMainIndex : period_type_enum is mandatory field");


           $obj->select("travel_template_id",$travel_template_id);
           $obj->select("seat_category_enum",$seat_category_enum);
           $obj->select("week_period_enum",$week_period_enum);
           $obj->select("period_type_enum",$period_type_enum);
           $obj->select("yperiod_id",$yperiod_id);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                $arrTravelTemplateSeatPricingCache["$travel_template_id-$seat_category_enum-$week_period_enum-$period_type_enum-$yperiod_id"] = $obj;
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("travel_template_id",$travel_template_id);
                $obj->set("seat_category_enum",$seat_category_enum);
                $obj->set("week_period_enum",$week_period_enum);
                $obj->set("period_type_enum",$period_type_enum);
                $obj->set("yperiod_id",$yperiod_id);

                $obj->insert();
                $arrTravelTemplateSeatPricingCache["$travel_template_id-$seat_category_enum-$week_period_enum-$period_type_enum-$yperiod_id"] = $obj;                
                $obj->is_new = true;
                return $obj;
           }
           else return null;
           
        }


        public function getDisplay($lang="ar")
        {
               
               $data = array();
               $link = array();
               

               $data[0] = "تسعيرة مقعد صنف ";
               list($data[1],$link[1]) = $this->displayAttribute("seat_category_enum",false, $lang);
               list($data[3],$link[3]) = $this->displayAttribute("week_period_enum",false, $lang);
               list($data[4],$link[4]) = $this->displayAttribute("period_type_enum",false, $lang);
               
               return implode("-",$data);
        }

        public function getWideDisplay($lang="ar")
        {
               
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("travel_template_id",false, $lang);
               $data[0] .= " &larr; تسعيرة مقعد صنف ";
               list($data[1],$link[1]) = $this->displayAttribute("seat_category_enum",false, $lang);
               list($data[3],$link[3]) = $this->displayAttribute("week_period_enum",false, $lang);
               list($data[4],$link[4]) = $this->displayAttribute("period_type_enum",false, $lang);
               list($data[5],$link[5]) = $this->displayAttribute("yperiod_id",false, $lang);
               list($data[6],$link[6]) = $this->displayAttribute("price",false, $lang);
                
               
               return implode("-",$data);
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
        
  
               
               
        /*       
        public function calcProgram_title()
        {
           $lang = AfwLanguageHelper::getGlobalLanguage();
              list($seat_category,$link) = $this->displayAttribute("seat_category_enum",false, $lang);
              return $seat_category;
        }
        */
        
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

        
        public function afterMaj($id, $fields_updated) 
        {
                // ??
        }

        public function list_of_seat_category_enum() { 
                $list_of_items = array(); 
                $list_of_items[5] = "مقعد سرير";  //     code : BED 
                $list_of_items[7] = "بجانب الباب";  //     code : DOOR 
                $list_of_items[2] = "مقعد أمامي";  //     code : FRONT 
                // $list_of_items[4] = "الدرجة الذهبية";  //     code : GOLDEN 
                $list_of_items[1] = "عادي";  //     code : NORMAL 
                // $list_of_items[3] = "الدرجة الفضية";  //     code : SILVER 
                $list_of_items[6] = "بجانب النافذة";  //     code : WINDOW 
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
        
                return  $code;
        } 
        
        
        public function getSeatCategoryCode()
        {
                $seat_category = intval($this->getVal("seat_category_enum"));
                return self::code_of_seat_category($seat_category);
        }
        
        public function getAllCategories($activated_categs=array())
        {
                $list_of_seat_category = $this->list_of_seat_category_enum();
                $all_arr = array();
                for($c=1;$c<=7;$c++)
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
        
             
}
?>