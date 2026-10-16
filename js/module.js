// JavaScript Document
$(document).ready(function(){

$(".btb_paymode").click(function()
{
        $(".btb_paymode.selected").removeClass("selected");
        console.log('id='+this.id);
        $("#"+this.id).addClass("selected");
        pm_id = $("#"+this.id).attr("alt");
        $("#payment_mode_id").val(pm_id);
}); 
        
        
$(".amount_to_pay").click(function()
{
        $(".amount_to_pay.selected").removeClass("selected");
        console.log('id='+this.id);
        $("#"+this.id).addClass("selected");
        amount = $("#"+this.id).attr("alt");
        $("#amount_to_pay").val(amount);
});       
                 
$(".option_sakan").click(function()
{        
        option_id_arr = this.id.split("_");
        trip_option_id = option_id_arr[0];
        console.log("val of trip_option_id=" +trip_option_id);        
        hotel_id = option_id_arr[1];
        $("."+trip_option_id+"_selected").removeClass(trip_option_id+"_selected");
        $("#"+this.id).addClass(trip_option_id+"_selected");
        trip_option_code = option_id_arr[2];

        
        $("#"+trip_option_id).val(trip_option_code);

});

$(".hotel_option").click(function()
{        
        hotel_id_arr = $("#"+this.id).attr("alt").split("|");
        trip = hotel_id_arr[0];
        hotel_id = hotel_id_arr[1];

        $(".hotel_selected"+trip).removeClass("hotel_selected"+trip);
        $("#"+this.id).addClass("hotel_selected"+trip);

        //console.log("val of hotel"+trip+"_id=" +$("#hotel"+trip+"_id").val());        
        $("#hotel"+trip+"_id").val(hotel_id);

        $(".hotel_main_photo"+trip).addClass("hotel_hide"+trip); 
        $("#main_photo_"+this.id).removeClass("hotel_hide"+trip);

        $(".pricing"+trip).addClass("hotel_hide"+trip); 
        $("#pricing_"+this.id).removeClass("hotel_hide"+trip);
});

$(".hzm_available_seat").click(function()
{
        console.log("The seat clicked has id ="+this.id);
        nb_seats_all = parseInt($("#nb_seats_all").val());
        nb_seats_max = parseInt($("#max_seats").val());
        // if(nb_seats_max==0) nb_seats_max = 99;
        hid_name = "#seat_val_"+this.id;
        if(($(hid_name).val()==1) || (nb_seats_all<nb_seats_max))
        {
                $("#error_seats_container").addClass("hide");
                $("#"+this.id).toggleClass("seat_booking");
                seat_id_arr = this.id.split("_");
                my_seat_id = seat_id_arr[1];
                bus = $("#"+this.id).attr("alt");
                $(hid_name).val(1-$(hid_name).val());

                show_seats_val = $("#seats_bus"+bus).val();
                console.log("show_seats_val #seats_bus"+bus + " before : "+show_seats_val);
                
                new_seat = my_seat_id + "-" ;
                new_seat = new_seat.toUpperCase();
                
                if($(hid_name).val()==1)
                {
                        show_seats_val = show_seats_val + new_seat;
                        $("#nb_seats_all").val(nb_seats_all+1);
                }
                else
                {
                        show_seats_val = show_seats_val.replace("-"+new_seat, "-");
                        $("#nb_seats_all").val(nb_seats_all-1);
                }

                console.log("show_seats_val #seats_bus"+bus + " after : "+show_seats_val);
                
                $("#seats_bus"+bus).val(show_seats_val);
                // alert("#selected_seats_"+bus);
                // alert($("#selected_seats_"+bus).val());
                $("#show_seats"+bus).text(show_seats_val);                
        }
        else
        {
                $("#error_seats").html("لا يمكن تجاوز الحد المسموح به من عدد المقاعد : "+nb_seats_max+" في حال تريد تغيير مقعد بآخر انقر عليه لإزالة التظليل ثم ظلل على المقعد الجديد");
                $("#error_seats_container").removeClass("hide");
                console.log("we are trying to check one more seat : "+hid_name+" val="+$(hid_name).val()+" and current seats number is "+nb_seats_all + " and max is : "+nb_seats_max);
        }
        
        
        
    
});

});
