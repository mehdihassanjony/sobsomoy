<div class="subscribe-title">
<label><?php echo $text_newsletter; ?>:</label>
</div>
<div class="subscribe-content" id="subscribe-form">
<input  type="text" name="subscribe-input" id="subscribe-input" value="" placeholder="Enter Your Email" class="form-control input-text required-entry validate-email" />
<button class="button" type="button" name="submit_newsletter" id="submit_newsletter" onclick="return TSEmailValidation()" ><span><?php echo $text_newsletter_subscribe;?></span></button>
<p id="subscriber_content" class="required"></p>
</div>
<script language="javascript">
function TSEmailValidation(mail)   
{  
	subscribemail = document.getElementById("subscribe-input").value;
	var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
	if (subscribemail != '') { 

	    if ( subscribemail.search(emailRegEx)!=-1 ) {  
		    

		    email = document.getElementById("subscribe-input").value;
		    var xmlhttp;
		    if (window.XMLHttpRequest){
			    xmlhttp=new XMLHttpRequest();
		    }else{
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    
		    xmlhttp.onreadystatechange=function() {
			    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				    document.getElementById("subscriber_content").innerHTML=xmlhttp.responseText;
			    }
		    }
		    xmlhttp.open("GET","index.php?route=extension/module/newslettersubscription/addsubscriberemail&email="+email,true);
		    xmlhttp.send();
		    return (true) ; 
	  }  
		  document.getElementById("subscriber_content").innerHTML="Please enter an email address.";
		  return (false); 
	}
		document.getElementById("subscriber_content").innerHTML="This is a required field.";
		return false;
}  
</script>