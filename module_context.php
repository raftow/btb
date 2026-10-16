<?php
        $contextLabel = array("ar"=>"إختيار  النظام","fr"=>"choix du systeme","en"=>"system choice");
        $contextShortLabel = array("ar"=>"ت.م", "fr"=>"a.p","en"=>"p.a"); 
        
             
        $contextList = array();
        
        
        
     
        $obj = new Orgunit();
        $obj->where("id_domain in (3,5,9)");
        $obj->select("active","Y");
     
        $obj_list = $obj->loadMany();
        
        foreach($obj_list as $obj_item)
        {
              if($obj_item->getId()>0)
              {
                   $contextList[$obj_item->getId()] = $obj_item;
              }
        }
      
        return $contextList;
?>