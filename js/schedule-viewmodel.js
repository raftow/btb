function setCurrentBookerType(type) 
{
   $('#btype').val(type);
}

function getCurrentBookerType()
{
    return  $('#btype').val();
}


function changeBookerType(type) 
{
     old_type = getCurrentBookerType();
     // remove css active from old
     $('#option_'+old_type).removeClass("active");
     $('#option_'+type).addClass("active");
     setCurrentBookerType(type);
}

function toggleSakan() 
{
    // console.log('toggleSakan 0');
    // console.log('toggleSakan 1 v = '+$('#bsakan').val());
    $('#bsakan').val(1-parseInt($('#bsakan').val()));
    // console.log('toggleSakan 2 v = '+$('#bsakan').val());
    if($('#bsakan').val()==1)
    {
        // console.log('addClass active to option_sakan');
        $('#option_sakan').addClass("checked");
    }
    else
    {
        // console.log('removeClass active from option_sakan');
        $('#option_sakan').removeClass("checked");
    }
}


/******************************/

function setCurrentOmraType(type) 
{
   $('#omtype').val(type);
   
   if(type=="both")
   {
   
   }
   
   if(type=="omra")
   {
   
   }
}

function getCurrentOmraType()
{
    return  $('#omtype').val();
}


function changeOmraType(type) 
{
     old_type = getCurrentOmraType();
     // remove css active from old
     $('#option_'+old_type).removeClass("active");
     $('#option_'+type).addClass("active");
     setCurrentOmraType(type);
     
     $('.destination_selector').addClass("hide");
     $('#'+type+'DestinationSelector').removeClass("hide");
}


function toggleOmraSakan() 
{
    console.log('toggleSakan step 0');
    console.log('toggleSakan step 1 v = '+$('#omsakan').val());
    $('#omsakan').val(1-parseInt($('#omsakan').val()));
    console.log('toggleSakan step 2 v = '+$('#omsakan').val());
    if($('#omsakan').val()==1)
    {
        console.log('addClass checked to option_sakan');
        $('#option_omra_sakan').addClass("checked");
    }
    else
    {
        console.log('removeClass checked from option_sakan');
        $('#option_omra_sakan').removeClass("checked");
    }
}