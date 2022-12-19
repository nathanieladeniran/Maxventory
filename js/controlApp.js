// JavaScript Document

/*Auto Logout*/
	var timoutWarning = 40000; //1 minute 1000 is one millisecond
    var timoutNow = 180000; 
    var logoutUrl = 'logout'; 
    var warningTimer;
    var timeoutTimer; 
	// Show idle timeout warning dialog.
    function IdleWarning() 
    {
       // $('#idle_warning').show(); 
	   alert('You Are Logged Out, Please Login Again');
    }
 
    // Logout the user.
    function IdleTimeout() 
    {
        window.location = logoutUrl;
		alert('You Are Logged Out, Please Login Again');
       // $('#idle_warning').show(); 
    }
    // Start timers.
    function StartTimers()
    {
      //  warningTimer = setTimeout("IdleWarning()", timoutWarning);
        timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
    }
    // Reset timers.
    function ResetTimers() 
    { 
       // console.log('reset');
        clearTimeout(warningTimer); 
        clearTimeout(timeoutTimer);
        StartTimers();
        $('#idle_warning').hide();
    }
 
    
    /*---Code ends for checking if no activity, then display an alert on web page ----*/   
 
    $(document).ready(function()
    {
        StartTimers();
        $(document).on('mousemove scroll keyup keypress mousedown mouseup mouseover',function(){
        ResetTimers();
        });
    });
 
    $(window).on('load',function()
    {
        
        $(window).on('mousemove scroll keyup keypress mousedown mouseup mouseover',function(){
        ResetTimers();
        });
        
    });
/*Auto Logout Ends*/