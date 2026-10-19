<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table hotel_file : hotel_file - مرفقات المبادرات / التجارب 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class HotelFile extends BtbObject{

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		hotel_id => array(SHORTNAME => hotel,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => hotel,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => false, ),

		description => array(SEARCH => true,  QSEARCH => true,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 128,  "MIN-SIZE" => 5,  CHAR_TEMPLATE => "",  REQUIRED => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),
                
                doc_type_id => array(SHORTNAME => type,  SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 40,  MAXLENGTH => 40,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => doc_type,  ANSMODULE => pag,
                                WHERE=>"concat(',',valid_ext,',') like '%,§afile_ext§,%' and id in (§module_config_token_file_types§)",  
				RELATION => ManyToOne,  READONLY => false, ),

                afile_ext => array(TYPE => TEXT, CATEGORY => SHORTCUT, SHORTCUT=>"workflow_file_id.afile_ext","CAN-BE-SETTED"=>false,"NO-COTE"=>true,),                

		workflow_file_id => array(
			         SHORTNAME => "file",
				 SEARCH => true,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true, INPUT_WIDE=>true,  QEDIT => true,  
				SIZE => 255,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => afile,  ANSMODULE => pag,  AUTOCOMPLETE => true,
                                	WHERE => "stakeholder_id=§MY_COMPANY§ and doc_type_id in (§module_config_token_file_types§)",  
				RELATION => ManyToOne,  READONLY => true, ),

                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                active => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("hotel_file","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "id";
                $this->ORDER_BY_FIELDS = "hotel_id, workflow_file_id";
                 
                
                $this->UNIQUE_KEY = array('hotel_id','workflow_file_id');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
	}
        
        public static function loadById($id)
        {
           $obj = new HotelFile();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }
        
        
        
        public static function loadByMainIndex($hotel_id, $workflow_file_id,$create_obj_if_not_found=false)
        {
           $obj = new HotelFile();
           if(!$hotel_id) throw new AfwRuntimeException("loadByMainIndex : hotel_id is mandatory field");
           if(!$workflow_file_id) throw new AfwRuntimeException("loadByMainIndex : workflow_file_id is mandatory field");


           $obj->select("hotel_id",$hotel_id);
           $obj->select("workflow_file_id",$workflow_file_id);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("hotel_id",$hotel_id);
                $obj->set("workflow_file_id",$workflow_file_id);

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
               
               $fle = $this->hetFile();
               if($fle) return $fle->getShortDisplay($lang);

               list($data[0],$link[0]) = $this->displayAttribute("id",false, $lang);

               
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
        
        
        
        public function beforeMAJ($id, $fields_updated) 
        {
                if(!$this->getVal("doc_type_id")) {
                           /*
                           $prObj = $this->hetHotel();
                           if($prObj)
                           {
                          
                           }
                           */
                }

		return true;
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
        
        
    protected function userCanDeleteMeSpecial($auser)
    {
        return true;
    }

        public function preview()
        {
                $fle = $this->hetFile();
                if($fle) return $fle->pictureView();
                else return "[no-photo]"; 
        }
             
}
?>