<?php
// ------------------------------------------------------------------------------------
// ----             auto generated php class of table travel_seat : travel_seat - مقاعد الرحلة 
// ------------------------------------------------------------------------------------

                
$file_dir_name = dirname(__FILE__); 
                
// old include of afw.php

class TravelSeat extends BtbObject{

        public static $MY_ATABLE_ID=13745; 

        
	public static $DATABASE		= ""; public static $MODULE		    = "btb"; public static $TABLE			= ""; public static $DB_STRUCTURE = null; 
    /* = array(
                id => array(SHOW => true, RETRIEVE => true, EDIT => true, TYPE => PK),

		
		travel_bus_id => array(FGROUP=>seat, SHORTNAME => tbus,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false, CSS => width_pct_100,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => travel_bus,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true, ),

		seat_code => array(FGROUP=>seat, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => false, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  "MIN-SIZE" => 2,  CHAR_TEMPLATE => "ARABIC-CHARS,SPACE",  REQUIRED => true,  UTF8 => false,  
				TYPE => "TEXT",  READONLY => true, ),

                
		seat_category => array(FGROUP=>seat, SHORTNAME => category,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => ENUM,  ANSWER => "FUNCTION", CATEGORY=>FORMULA, "FORMULA-RETURN-VALUE"=>true, READONLY => true, ),                
                                
                                

		'price' => array(FGROUP=>seat, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "FLOAT", UNIT=>"ريال", READONLY => false, ),

                
                active => array(FGROUP=>seat,  SHOW => true, EDIT => true, QEDIT => false, "DEFAULT" => Y, TYPE => YN, CSS => width_pct_50),

		'booked' => array(FGROUP=>booking, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true, CSS => width_pct_50,  
				SIZE => 32,  MAXLENGTH => 32,  REQUIRED => true,  UTF8 => false,  
				TYPE => "YN",  CHECKBOX => true, "DEFAULT"=>"N",  READONLY => true, ),

		'booking_id' => array(FGROUP=>booking, SHORTNAME => booking,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => false,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => false,  UTF8 => false,  
				TYPE => FK,  ANSWER => booking,  ANSMODULE => btb,  AUTOCOMPLETE => true,  
				RELATION => OneToMany,  READONLY => true, ),
                                
                'traveler_id' => array(FGROUP=>booking, SHORTNAME => traveler,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => traveler,  ANSMODULE => btb,  
				RELATION => OneToMany,  READONLY => false, ),

		expiry_date => array(FGROUP=>booking, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  MANDATORY => true,  UTF8 => false,  
				TYPE => "GDAT", FORMAT => "FRM",  READONLY => false, ),

        confirmed => array(FGROUP=>booking, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => false,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => "YN",  CHECKBOX => true,  READONLY => false, ),

		confirmed_date => array(FGROUP=>booking, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  MANDATORY => true,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => false, ),

		/*payment_date => array(SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 10,  MAXLENGTH => 10,  MANDATORY => true,  UTF8 => false,  
				TYPE => "DATE",  FORMAT => "HIJRI_UNIT",  READONLY => false, ),* /

		payment_type_id => array(FGROUP=>booking, SHORTNAME => type,  SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  MANDATORY => true,  UTF8 => false,  
				TYPE => FK,  ANSWER => payment_type,  ANSMODULE => crm,  
				RELATION => ManyToOne,  READONLY => false, ),

		payment_ref => array(FGROUP=>booking, SEARCH => false,  QSEARCH => false,  SHOW => true,  RETRIEVE => true,  
				EDIT => true,  QEDIT => true,  
				SIZE => 32,  MAXLENGTH => 32,  "MIN-SIZE" => 3,  CHAR_TEMPLATE => "",  MANDATORY => true,  UTF8 => true,  
				TYPE => "TEXT",  READONLY => false, ),

                
                created_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                created_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                updated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                updated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                validated_by => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => auser, ANSMODULE => ums),
                validated_at => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => DATETIME),
                draft => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, QEDIT => false, "DEFAULT" => Y, TYPE => YN),
                version => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => INT),
                update_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                delete_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                display_groups_mfk => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, ANSWER => ugroup, ANSMODULE => ums, TYPE => MFK),
                sci_id => array("SHOW-ADMIN" => true, RETRIEVE => false, EDIT => false, TYPE => FK, ANSWER => scenario_item, ANSMODULE => pag),
                tech_notes 	    => array(TYPE => TEXT, CATEGORY => FORMULA, "SHOW-ADMIN" => true, 'STEP' =>"all", TOKEN_SEP=>"§", READONLY=>true, "NO-ERROR-CHECK"=>true),
	);
	
	*/ public function __construct(){
		parent::__construct("travel_seat","id","btb");
                $this->QEDIT_MODE_NEW_OBJECTS_DEFAULT_NUMBER = 15;
                $this->DISPLAY_FIELD = "";
                $this->ORDER_BY_FIELDS = "travel_bus_id, seat_code";
                $this->horizontalTabs = true;
                 
                
                $this->UNIQUE_KEY = array('travel_bus_id','seat_code');
                
                $this->showQeditErrors = true;
                $this->showRetrieveErrors = true;
                // $this->after_save_edit = array("class"=>Road,"attribute"=>road_id, "currmod"=> 'btb',"currstep"=>9);
        }
        
        public function getBookedTypeSeat()
        {
             $bookingObj = $this->hetBooking();
             if($bookingObj) return $bookingObj->getTravelerTypeSeat();

             return "";
        }     
        
        
        public function getTypeSeat($wanted_seat_type, $nb_seats, $travelObj=null,$travelBusObj=null)
        {
             // if there's booking put the type of travelers of this booking
             $bookingObj = $this->hetBooking();
             if($bookingObj) return $bookingObj->getTravelerTypeSeat();

             // if no booking on this travel seat : find out from travel policy and following criterea :
             // 1. wanted seat type
             // 2. travel policy of filling seats (currently only one policy)
             //    @todo after experience with reality conclude other policies
             // 3. state of bus filling (limit rows filled for this wanted seat type)
             // 

             if(!$travelBusObj) $travelBusObj = $this->het("tbus");
             if(!$travelBusObj) throw new RuntimeException("travel seat [$this->id] with no travel bus defined, btb integrity error");


             if(!$travelObj)
             {
                   $travelObj = $travelBusObj->het("travel");
             } 
             if(!$travelObj) throw new RuntimeException("travel bus [$travelBusObj->id] with no travel defined, btb integrity error");    

             $rows_policy = $travelBusObj->applySeatsFillingPolicy($travelObj, $wanted_seat_type, $nb_seats);
             // die("rows_policy($wanted_seat_type) = ".var_export($rows_policy,true));

             return $rows_policy[$this->getMyRow()];
        }
        
        public static function loadById($id)
        {
           $obj = new TravelSeat();
           $obj->select_visibilite_horizontale();
           if($obj->load($id))
           {
                return $obj;
           }
           else return null;
        }

        public function afterUpdate($id, $fields_updated, $disableAfterCommitDBEvent = false) {
                if(($fields_updated["price"]) and ($this->estBooked()))
                {
                    if(!$this->estConfirmed())              
                    {
                        $this->hetBooking()->genereBilling();  
                        // depending on settings send SMS to customer ?
                        // sendSMS(.....) @todo
                    }    
                    else
                    {
                        // nothing to do ? 
                        // the pb for confirmed seats the payment done 
                        // if billing need regeneration it should be manual    
                    }
                }
                $this->afterMaj($id, $fields_updated);
	}
        
        
        
        public static function loadByMainIndex($travel_bus_id, $seat_code,$create_obj_if_not_found=false)
        {
           $obj = new TravelSeat();
           if(!$travel_bus_id) throw new AfwRuntimeException("loadByMainIndex : travel_bus_id is mandatory field");
           if(!$seat_code) throw new AfwRuntimeException("loadByMainIndex : seat_code is mandatory field");


           $obj->select("travel_bus_id",$travel_bus_id);
           $obj->select("seat_code",$seat_code);

           if($obj->load())
           {
                if($create_obj_if_not_found) $obj->activate();
                return $obj;
           }
           elseif($create_obj_if_not_found)
           {
                $obj->set("travel_bus_id",$travel_bus_id);
                $obj->set("seat_code",$seat_code);

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
               

               list($data[0],$link[0]) = $this->displayAttribute("travel_bus_id",false, $lang);
               list($data[1],$link[1]) = $this->displayAttribute("seat_code",false, $lang);

               
               return implode(" - ",$data);
        }
        
        
        public function whoTraveler($lang="ar")
        {
               
               $data = array();
               $link = array();
               

               list($data[0],$link[0]) = $this->displayAttribute("traveler_id",false, $lang);
               
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
        
        public function attributeIsApplicable($attribute)
        {
            if($attribute == "booking_id") return $this->estBooked();
            if($attribute == "traveler_id") return $this->estBooked();
            if($attribute == "expiry_date") return $this->estBooked();
            if($attribute == "confirmed") return $this->estBooked();
            if($attribute == "confirmed_date") return $this->estConfirmed();
            if($attribute == "payment_type_id") return $this->estConfirmed();
            if($attribute == "payment_date") return $this->estConfirmed();
            if($attribute == "payment_ref") return $this->estConfirmed();
            
            return true;
        }
        
        public function estBookedForOthers($booking_id)
        {
            return ($this->estBooked() and ($this->getVal("booking_id") != $booking_id));
        }
        
        public function estBookedForMe($booking_id)
        {
            return ($this->estBooked() and ($this->getVal("booking_id") == $booking_id));
        }
        
        public function cancelMyBooking($lang="ar",$return_status=false)
        {
             $this->set("booked","N");
             $this->set("booking_id",0);
             // on ne peut pas annuler un booking paye confirme
             $this->where("(confirmed is null or confirmed != 'Y')");
             $nb_rows = $this->update();
             
             if($nb_rows==1)
             {
                 $info = "booking canceled";
             }
             elseif($nb_rows==0)
             {
                 $info = "no booking to cancel";
             }
             else
             {
                 $this->throwError("strange error : more than one set canceled");
             }
             
             if($return_status) return ($nb_rows==1);
             else return array("",$info);        
        }
        
        public function getFieldGroupInfos($fgroup)
        {
             if($fgroup=="seat") return array("name"=>$fgroup, "css"=>"pct_50");
             if($fgroup=="booking") return array("name"=>$fgroup, "css"=>"pct_50");
              
               
             return array("name"=>$fgroup, "css"=>"none");
        }    
         
         
        /*    
        public function calcSeat_category()
        {
            $travelBusObj = $this->het("tbus");
            if(!$travelBusObj) return 0;
            $bus = $travelBusObj->het("bus");
            if(!$bus) return 0;
            $scatg = $bus->getTheSeatCategoryCode($this->getVal("seat_code"));
            $scatg_id = Bus::decode_of_seat_category($scatg);
            return $scatg_id;
        }*/
                
        public function list_of_seat_category() { 
            $list_of_items = array(); 
            $list_of_items[5] = "مقعد سرير";  //     code : BED 
            $list_of_items[7] = "بجانب الباب";  //     code : DOOR 
            $list_of_items[2] = "مقعد أمامي";  //     code : FRONT 
            $list_of_items[4] = "الدرجة الذهبية";  //     code : GOLDEN 
            $list_of_items[1] = "عادي";  //     code : NORMAL 
            $list_of_items[3] = "الدرجة الفضية";  //     code : SILVER 
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
               $seat_category = intval($this->getVal("seat_category"));
               return self::code_of_seat_category($seat_category);
        }

        public function getMyRow()
        {
                return intval(substr($this->seat_code,1));
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
      
        
             
}
?>