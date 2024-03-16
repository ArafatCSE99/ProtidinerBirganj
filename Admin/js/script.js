function checkCredential()
{
    var username=$('#username').val();
    var password=$('#password').val();

    if(username=='' || password=='')
    {
        alert("Please Insert UserName & Password!");
    }
    else{
    
        var dataString="username="+username+"&password="+password;

        $.ajax({
            type: "POST",
            url: "API/checkCredential.php",
            data: dataString,
            cache: false,
            success: function(html) {
               if(html=="1"){
                window.location.href = "Home.php";
               }
               else{
                alert("Wrong Username or Password!");
               }
               
            }
            });

    }
}



function GetBasicInfo()
{
    $.ajax({
        type: "POST",
        url: "API/getBasicInfo.php",
        data: '',
        cache: false,
        success: function(html) {
           $('.content-wrapper').html(html)
        }
        });
}


function SaveBasicInfo()
{
    var npn=$('#npn').val();
    var wa=$('#wa').val();
    var ea=$('#ea').val();
    var a=$('#a').val();
    var mn=$('#mn').val();
    var fb=$('#fb').val();
    var yt=$('#yt').val();

    var dataString='npn='+npn+'&wa='+wa+'&ea='+ea+'&a='+a+'&mn='+mn+'&fb='+fb+'&yt='+yt;

    $.ajax({
        type: "POST",
        url: "API/saveBasicInfo.php",
        data: dataString,
        cache: false,
        success: function(html) {
           alert(html);
        }
    });
   
}