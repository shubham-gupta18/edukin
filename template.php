
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script>
    _.templateSettings = {
        interpolate: /\{\@(.+?)\@\}/g
    };
</script>
<script type="text/plain" id="Registered_valuerTemplate">
    <tr class='row{@ id @}'>
	<td>Subject {@ id @}</td>	
	<td><input type="text" name="subject[]" id="subject_{@ id @}"></td>	
	
    </tr>
</script>
<script>
    var Registered_valuerBodyTemplate = _.template(jQuery("#Registered_valuerTemplate").text());
    var Registered_valuerBodyRowCount = 0;
</script>
<script>
    function rowAdd(className) {
        // var counter = window[className + 'RowCount'];
        console.log(className + 'Template');
        console.log(window[className + 'Template']);
        var template = window[className + 'Template'];
        console.log(template);
        window[className + 'RowCount']++;
        jQuery("." + className).append(template({id: window[className + 'RowCount']}));
        console.log(window[className + 'RowCount']);
        //if(className==='experienceBody') initDatePicker(window[className + 'RowCount']  );
        
        jQuery("." + className + " .row" + window[className + 'RowCount'] + " input").each(function(){
        	var attr_name = jQuery(this).attr("name");
        	if(typeof prefilldata[attr_name]!="undefined"){
        	
        		jQuery(this).val(prefilldata[attr_name]);
        	}
        });
        jQuery("#" + className + "RowCount").val(window[className + 'RowCount']);
        dtpicker();
    }
    function initDatePicker(rowCount) {
/*        jQuery('.experienceBody .row' + rowCount +' .input-daterange').datepicker({
            format: "dd/mm/yyyy",
            weekStart: 1,
            endDate: "now",
            maxViewMode: 3,
            clearBtn: true,
            multidate: false,
            daysOfWeekHighlighted: "0,6",
            autoclose: true,
            todayHighlight: true
        });*/
    }
    function rowRemove(className) {
        // var counter = &window[className + 'RowCount'];
        if (window[className + 'RowCount'] > 1) {
            var test = jQuery("." + className + " .row" + window[className + 'RowCount']).remove();
            if (test.length > 0)
                window[className + 'RowCount']--;
        }
    }

    function init() {
        jQuery("input[type='text']").each(function(){
      	jQuery(this).parent().prev("td").css("font-weight","bold !important");
        });
        if(typeof prefilldata["Registered_valuerBodyRowCount"]!="undefined" && prefilldata["Registered_valuerBodyRowCount"]==""){
        	prefilldata["Registered_valuerBodyRowCount"] = 3;
        }
	
	
        for(x=0; x<((typeof prefilldata["Registered_valuerBodyRowCount"]!="undefined")?prefilldata["Registered_valuerBodyRowCount"]:1);x++){
	        rowAdd("Registered_valuerBody");
        }
	
	
        jQuery("input[type='text']").each(function(){
        	var attr_name = jQuery(this).attr("name");
        	if(typeof prefilldata[attr_name]!="undefined"){
        		jQuery(this).parent().html(prefilldata[attr_name]);
        	}
        });     
        jQuery("select").each(function(){
        	var attr_name = jQuery(this).attr("name");
        	if(typeof prefilldata[attr_name]!="undefined"){
        		jQuery(this).before("[" + prefilldata[attr_name] + "]");
        		jQuery(this).hide();
        	}
        });     
        /*jQuery("input[type='checkbox']").each(function(){
        	var attr_name = jQuery(this).attr("name");
        	if(typeof prefilldata[attr_name]!="undefined"){
        		jQuery(this).before("[" + prefilldata[attr_name] + "]");
        		jQuery(this).hide();
        	}
        	else{
        		jQuery(this).before("[No]");
        		jQuery(this).hide();
        	}
        });     
        jQuery("input[type='radio']").each(function(){
        	var attr_name = jQuery(this).attr("name");
        	if(typeof prefilldata[attr_name]!="undefined" && prefilldata[attr_name]==jQuery(this).attr("id")){
        		jQuery(this).before("[Yes]");
        		jQuery(this).hide();
        	}
        	else{
        		jQuery(this).hide();
        	}
        }); */    
    }
jQuery(document).ready(function(){
    init();
    jQuery(".addRow").click(function () {
        var className = jQuery(this).attr("datafld");
        rowAdd(className);
    });
    jQuery(".removeRow").click(function () {
        var className = jQuery(this).attr("datafld");
        rowRemove(className);
    });
    jQuery(".needs-validation").validate();
    
    jQuery.validator.addMethod("regex",function(value, element, regexp) {
          var check = false;
          var re = new RegExp(regexp);
          return this.optional(element) || re.test(value);
      },"");

     jQuery(".panno").rules("add",{ 
 	required: true,
 	regex:"^[A-Z]{5}[0-9]{4}[A-Z]{1}$",
   	messages: { 
 	regex: "Incorrect PAN No." 
	}
     });
     jQuery(".isDesignated").click(function(){
     	jQuery("#Firm_Designated_Partner_MRN").val(jQuery(this).parent().parent().find(".mrn").val());
     	jQuery("#Firm_Designated_Partner_Name").val(jQuery(this).parent().parent().find(".name").val());
     	jQuery("#Firm_Designated_Partner_Email").val(jQuery(this).parent().parent().find(".email").val());
     	jQuery("#Firm_Designated_Partner_Mobile").val(jQuery(this).parent().parent().find(".mobile").val());
     
     });
     
        jQuery("input[type='text']").each(function(){
	jQuery(this).parent().html(jQuery(this).val());
        });     
});
     function dtpicker(){
       /* jQuery('.datetime').datepicker({
            format: "dd/mm/yyyy",
            weekStart: 1,
            endDate: "now",
            maxViewMode: 3,
            clearBtn: true,
            multidate: false,
            daysOfWeekHighlighted: "0,6",
            autoclose: true,
            todayHighlight: true
        });*/
     }

</script>