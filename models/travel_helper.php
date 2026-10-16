<?php 

$file_dir_name = dirname(__FILE__); 



class TravelHelper extends AFWRoot 
{

        public static function decomposeBedOptions($nb_beds, $context="", $root=true)
        {
                $options_arr = array();
                if($nb_beds>=1)
                {
                        if($nb_beds==1) $options_arr[] = array('context' =>$context, 'rs1' =>1, 'rs2' =>0, 'rs3' =>0, 'rs4' =>0, 'rs5' =>0, 'rs6' =>0, );
                        if($nb_beds>1) 
                        {
                                $options_tmp_arr = self::decomposeBedOptions($nb_beds-1, $new_context="low-prio", $root_so_decode_and_ddb=false);
                                foreach($options_tmp_arr as $or => $options_tmp_row)
                                {
                                        $options_tmp_arr[$or]["rs1"] = $options_tmp_arr[$or]["rs1"] + 1;
                                        $options_arr[] = $options_tmp_arr[$or];
                                }
                                //die("decomposeBedOptions($nb_beds) step 1 options_tmp_arr = ".var_export($options_tmp_arr,true));
                        }
                }
                if($nb_beds>=2)                        
                {
                        if($nb_beds==2) $options_arr[] = array('context' =>$context, 'rs1' =>0, 'rs2' =>1, 'rs3' =>0, 'rs4' =>0, 'rs5' =>0, 'rs6' =>0, );
                        if($nb_beds>2) 
                        {
                                if($nb_beds==3) $new_context="low-prio";
                                else $new_context = $context;
                                $options_tmp_arr = self::decomposeBedOptions($nb_beds-2, $new_context, $root_so_decode_and_ddb=false);
                                foreach($options_tmp_arr as $or => $options_tmp_row)
                                {
                                        $options_tmp_arr[$or]["rs2"] = $options_tmp_arr[$or]["rs2"] + 1;
                                        $options_arr[] = $options_tmp_arr[$or];
                                }
                        }
                }

                if($nb_beds>=3)                        
                {
                        if($nb_beds==3) $options_arr[] = array('context' =>$context, 'rs1' =>0, 'rs2' =>0, 'rs3' =>1, 'rs4' =>0, 'rs5' =>0, 'rs6' =>0, );
                        if($nb_beds>3) 
                        {
                                if($nb_beds==4) $new_context="low-prio";
                                else $new_context = $context;
                                $options_tmp_arr = self::decomposeBedOptions($nb_beds-3, $new_context, $root_so_decode_and_ddb=false);
                                foreach($options_tmp_arr as $or => $options_tmp_row)
                                {
                                        $options_tmp_arr[$or]["rs3"] = $options_tmp_arr[$or]["rs3"] + 1;
                                        $options_arr[] = $options_tmp_arr[$or];
                                }
                        }
                }

                if($nb_beds>=4)                        
                {
                        if($nb_beds==4) $options_arr[] = array('context' =>$context, 'rs1' =>0, 'rs2' =>0, 'rs3' =>0, 'rs4' =>1, 'rs5' =>0, 'rs6' =>0, );
                        if($nb_beds>4) 
                        {
                                if($nb_beds==5) $new_context="low-prio";
                                else $new_context = $context;
                                $options_tmp_arr = self::decomposeBedOptions($nb_beds-4, $new_context, $root_so_decode_and_ddb=false);
                                foreach($options_tmp_arr as $or => $options_tmp_row)
                                {
                                        $options_tmp_arr[$or]["rs4"] = $options_tmp_arr[$or]["rs4"] + 1;
                                        $options_arr[] = $options_tmp_arr[$or];
                                }
                        }
                }

                if($nb_beds>=5)                        
                {
                        if($nb_beds==5) $options_arr[] = array('context' =>$context, 'rs1' =>0, 'rs2' =>0, 'rs3' =>0, 'rs4' =>0, 'rs5' =>1, 'rs6' =>0, );
                        if($nb_beds>5) 
                        {
                                if($nb_beds==6) $new_context="low-prio";
                                else $new_context = $context;
                                $options_tmp_arr = self::decomposeBedOptions($nb_beds-5, $new_context, $root_so_decode_and_ddb=false);
                                foreach($options_tmp_arr as $or => $options_tmp_row)
                                {
                                        $options_tmp_arr[$or]["rs5"] = $options_tmp_arr[$or]["rs5"] + 1;
                                        $options_arr[] = $options_tmp_arr[$or];
                                }
                        }
                }

                if($nb_beds>=6)                        
                {
                        if($nb_beds==6) $options_arr[] = array('context' =>$context, 'rs1' =>0, 'rs2' =>0, 'rs3' =>0, 'rs4' =>0, 'rs5' =>0, 'rs6' =>1, );
                        if($nb_beds>6) 
                        {
                                if($nb_beds==7) $new_context="low-prio";
                                else $new_context = $context;
                                $options_tmp_arr = self::decomposeBedOptions($nb_beds-6, $new_context, $root_so_decode_and_ddb=false);
                                foreach($options_tmp_arr as $or => $options_tmp_row)
                                {
                                        $options_tmp_arr[$or]["rs6"] = $options_tmp_arr[$or]["rs6"] + 1;
                                        $options_arr[] = $options_tmp_arr[$or];
                                }
                        }
                }
                
                
                // if(!$context) die("avant ddb decomposeBedOptions($nb_beds, $context) => options_arr = ".var_export($options_arr,true));
                
                // decoder et dedoublonner les options
                if($root)
                {
                        $final_option_arr = array();
                        foreach($options_arr as $option_row)
                        {
                                $name = "";
                                $code = "";
                                for($i=1;$i<=6;$i++) {
                                        $rsi = ${"rs$i"} = $option_row["rs".$i];
                                        if($rsi>0) 
                                        {
                                                if($name) $name .= " و ";
                                                if($code) $code .= "and";
                                                $name .= $rsi . " " . self::decodeSakanRoomSize($i); 
                                                $code .= "${i}x$rsi";
                                        }        
                                }
                                $option_row["name"] = $name;

                                if($code) $final_option_arr[$code] = $option_row;  
                        }
                        // if(!$context) die("apres ddb decomposeBedOptions($nb_beds, $context) => final_option_arr = ".var_export($final_option_arr,true));
                }
                else $final_option_arr = $options_arr;
                
                return $final_option_arr;

        }

        public static function decodeSakanOptionCode($trip_option)
        {
                $trip_option_arr = explode("and",$trip_option);
                $name = "";
                foreach($trip_option_arr as $trip_option_item)
                {
                    list($room_size, $nb_rooms) = explode("x", $trip_option_item);
                    if($name) $name .= " و ";
                    $name .= $nb_rooms . " " . self::decodeSakanRoomSize($room_size);
                }

                return $name;
        }

        public static function decodeSakanRoomSize($rs)
        {
                if($rs == 1) return "سرير عزابي";
                if($rs == 2) return "غرفة سريرين";
                if($rs == 3) return "غرفة 3 سراير";
                if($rs == 4) return "غرفة 4 سراير";
                if($rs == 5) return "غرفة 5 سراير";
                if($rs >= 6) return "جناح $rs سراير";

                return "room size $rs not supported";
                         
        }

        public static function decodeSeatCategory($categ)
        {
                if($categ == 1) return "عادي";
                if($categ == 2) return "مقعد أمامي";
                if($categ == 3) return "الدرجة الفضية";
                if($categ == 4) return "الدرجة الذهبية";
                if($categ == 5) return "مقعد سرير";
                if($categ == 6) return "بجانب النافذة";
                if($categ == 7) return "بجانب الباب";

                return "seat category $categ not supported";
                         
        }

        
}