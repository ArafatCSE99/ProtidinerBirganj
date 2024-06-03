function GetNewsDetails(id)
{
        
       var dataString='id='+id;
       $.ajax({
        type: "POST",
        url: "Admin/API/getNewsDetails.php",
        data: dataString,
        cache: false,
        success: function(html) {
           $('#contentDiv').html(html);   
           //alert('Its Working');
           $('html, body').animate({
            scrollTop: $('#contentDiv').offset().top
           }, 1000); // Adjust the duration as needed
            //$('#sliderSection').hide();
            
        }
        });
        
      
}

function PrintNews()
{
        var contentToPrint = document.getElementById("contentDiv").innerHTML;
        var originalPage = document.body.innerHTML;
        document.body.innerHTML = contentToPrint;
        window.print();
        document.body.innerHTML = originalPage;
}