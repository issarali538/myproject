<form action="samething.php" method="POST" onsubmit="return valid()">
    <input type="text" name="phone" id="phone">
    <small id="stdphone"></small>
    <input type="text" name="phone" id="cnic">
    <small id="stdcnic"></small>
    <input type="submit" id="button" value="Check Phone">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(()=>{
      $("#button").click(()=>{
          var phone = $("#phone").val();
          var cnic  = $("#cnic").val();
          var check = "11202=0361168-3"
          if(phone == ""){
            $("#stdphone").html("Inter a valid phone");
            return false;
          }
          else if(isNaN(phone)){
            $("#stdphone").html("Inter a valid phone");
            return false;
        }
        else if(phone.length !== 11){
        $("#stdphone").html("Inter a valid cnic");
        return false;
    }
    else if(cnic == ""){
        $("#stdcnic").html("Inter a valid cnic");
        return false;
    }
    else if(cnic.length !== 13){
        $("#stdcnic").html("Inter a valid cnic");
        return false;
    }
    else if(cnic.indexOf("-") !== 5 || cnic.lastIndexOf("-") !== 11){
        $("#stdcnic").html("Inter a valid cnic");
    }
          else{
            return true;
          }
      });
  });
</script>