//Provide the XMLHttpRequest constructor for Internet Explorer 5.x-6.x:
/*
 if (typeof XMLHttpRequest === "undefined") {	
  XMLHttpRequest = function () {
    try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); }
    catch (e) {}
    try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); }
    catch (e) {}
    try { return new ActiveXObject("Microsoft.XMLHTTP"); }
    catch (e) {}
     throw new Error("This browser does not support XMLHttpRequest.");
  };
}
*/

function isBot(callback){
	alert("Call isBot ... ");
  // Initialize the Ajax request
 // var xhr = new XMLHttpRequest();
  var xhr;
  try{
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhr = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  //xhr.open('get', 'bot-detect.php');
  //alert("XMLHttpRequest State [" + xhr.readyState + "][" + xhr.responseText+ "]>>>");
  // Track the state changes of the request
  xhr.onreadystatechange = function(){
	 
    // Ready state 4 means the request is done
    if(xhr.readyState == 4){
      // 200 is a successful return
       alert("XMLHttpRequest PHP [" + xhr.responseText + "]>>>");
	  if(xhr.status == 200){
        callback(xhr.responseText.trim()); // 'This is the returned text.'
      }else{
        callback ('Error: '+xhr.status); // An error occurred during the request
      }
    }
  };
  xhr.open("GET", "bot-detect.php", true);
  xhr.send();
  }catch(e)
  {
	  alert(" Error [" + e + "]>>>");
  }
}

  // Send the request to send-ajax-data.php
  //xhr.send(null);