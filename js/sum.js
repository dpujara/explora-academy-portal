function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah')
              .attr('src', e.target.result)
              .width(120)
              .height(120);
      };

      reader.readAsDataURL(input.files[0]);
  }
};
function capitalise() {
  var inp=document.getElementById('lname').value;
  document.getElementById('lname').value=inp.charAt(0).toUpperCase() + inp.slice(1).toLowerCase();
  var inp1=document.getElementById('mname').value;
  document.getElementById('mname').value=inp1.charAt(0).toUpperCase() + inp1.slice(1).toLowerCase();
  var inp2=document.getElementById('first_name').value;
  document.getElementById('first_name').value=inp2.charAt(0).toUpperCase() + inp2.slice(1).toLowerCase();
  
}
function sum() {
 var txtFirstNumberValue = document.getElementById('regfeeid').value;

 var txtSecondNumberValue = document.getElementById('aprilfeeid').value;
 var txtThirdNumberValue = document.getElementById('mayfeeid').value;
 var result = 0;
 document.getElementById('total').value="";   
 if(txtFirstNumberValue<0)
{
   result = 0;
   window.alert("must be > 0");
   document.getElementById('regfeeid').value="";
   
   if (txtSecondNumberValue!=0)
   {
	   result = result + parseInt(txtSecondNumberValue);
   }
	if(txtThirdNumberValue != 0)
	{
		result = result + parseInt(txtThirdNumberValue);
	}
	document.getElementById('total').value=result;   
	
}
else if (txtSecondNumberValue<0)
{
   result=0;
   window.alert("must be > 0");
   document.getElementById('aprilfeeid').value="";
   
   
   if (txtFirstNumberValue!=0)
   {
	   result = result + parseInt(txtFirstNumberValue);
   }
	if(txtThirdNumberValue != 0)
	{
		result = result + parseInt(txtThirdNumberValue);
	}
	document.getElementById('total').value=result; 
   
   
}
else if(txtThirdNumberValue < 0)
{
   result = 0;
   window.alert("must be > 0");
   document.getElementById('mayfeeid').value="";
   
   if (txtSecondNumberValue!=0)
   {
	   result = result + parseInt(txtSecondNumberValue);
   }
	if(txtFirstNumberValue != 0)
	{
		result = result + parseInt(txtFirstNumberValue);
	}
	document.getElementById('total').value=result; 
}
else
{
if (txtFirstNumberValue == "")
   
     txtFirstNumberValue = 0;
 if (txtSecondNumberValue == "")
     txtSecondNumberValue = 0;
if (txtThirdNumberValue == "")
     txtThirdNumberValue = 0;

 var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue);
 if (!isNaN(result)) {
     document.getElementById('total').value = result;
 }}
}	

function check_availability(){  
    var FormNumber= $('#FormNumber').val();   
    $.get("check_formno.php", {FormNumber:FormNumber},  
        function(result){  
            if(result == 1){  
                $('#username_availability_result').html(FormNumber + ' is already registered!'); 
					$('#FormNumber').val("");  
            }
            else{  
              $('#username_availability_result').html("");
            }  
    });  

}  
$(document).ready(function sum()
{
 var txtFirstNumberValue = document.getElementById('regfeeid').value;
 var txtSecondNumberValue = document.getElementById('aprilfeeid').value;
 var txtThirdNumberValue = document.getElementById('mayfeeid').value;
 var result = 0;
 document.getElementById('total').value="";   
 if(txtFirstNumberValue<0)
{
   result = 0;
   window.alert("must be > 0");
   document.getElementById('regfeeid').value="";
   
   if (txtSecondNumberValue!=0)
   {
	   result = result + parseInt(txtSecondNumberValue);
   }
	if(txtThirdNumberValue != 0)
	{
		result = result + parseInt(txtThirdNumberValue);
	}
	document.getElementById('total').value=result;   
	
}
else if (txtSecondNumberValue<0)
{
   result=0;
   window.alert("must be > 0");
   document.getElementById('aprilfeeid').value="";
   
   
   if (txtFirstNumberValue!=0)
   {
	   result = result + parseInt(txtFirstNumberValue);
   }
	if(txtThirdNumberValue != 0)
	{
		result = result + parseInt(txtThirdNumberValue);
	}
	document.getElementById('total').value=result; 
}
else if(txtThirdNumberValue < 0)
{
   result = 0;
   window.alert("must be > 0");
   document.getElementById('mayfeeid').value="";
   
   if (txtSecondNumberValue!=0)
   {
	   result = result + parseInt(txtSecondNumberValue);
   }
	if(txtFirstNumberValue != 0)
	{
		result = result + parseInt(txtFirstNumberValue);
	}
	document.getElementById('total').value=result; 
}
else
{
if (txtFirstNumberValue == "")
   
     txtFirstNumberValue = 0;
 if (txtSecondNumberValue == "")
     txtSecondNumberValue = 0;
if (txtThirdNumberValue == "")
     txtThirdNumberValue = 0;

 var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) + parseInt(txtThirdNumberValue);
 if (!isNaN(result)) {
     document.getElementById('total').value = result;
 }}
}	
);