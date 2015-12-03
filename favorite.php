<?php
if(isset($_COOKIE['favorite'])){
    $cookie = explode(',', $_COOKIE['favorite']);
}
$fav=  sizeof($cookie);

//exit();
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .cookie-div{
                padding: 5px;
            }
            .cookie{
                padding: 5px;
                margin-left: 5px;
                border: 1px solid activecaption;
                background: red;
                text-decoration: none;
                cursor: pointer;
            }
            .cookie:hover{
                background: yellowgreen;
                text-decoration: none;
                cursor: pointer;
            }
            .mark{
                padding: 5px;
                margin-left: 5px;
                border: 1px solid activecaption;
                background: green;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <a href="index.php">Index </a><span class="fav"> <?php echo isset($fav)? $fav :'';  ?></span>
        <?php for ($i = 1; $i < 20; $i++) { 
            if(in_array($i, $cookie)){?>
        
            <div class="cookie-div">
                <span> cookie Number <?php echo $i; ?></span><span class="mark"  data-post-id="<?php echo $i; ?>"><?php echo $i; ?></span>
            </div>
            <?php
            }
        }
        ?>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        
        var total;
        $(document).ready(function () {
            //var postids= new Array();
            var favorite='favorite';
            $('.mark').on('click', function () {
//                alert('alert');
                $(this).removeClass('mark');
                $(this).addClass('cookie');
                
                var id=$(this).data("post-id");
                id=id.toString()
                var total = getCookie(favorite);
                var total = total.split(",");
                console.log(total);
                //index=total.indexOf(id);
                total.splice( $.inArray(id,total) ,1 );
                console.log(total);
                console.log(total.length);
                $('.fav').html(total.length);
                //postids.push(id);
                //alert(name);
                //console.log(postids);
                setCookie(favorite, total);
                
            });
            function setCookie(cname, cvalue) {
                var d = new Date();
                d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + "; " + expires;
                //alert('cookie set');
            }
            
            function getCookie(name) {
                var dc = document.cookie;
                var prefix = name + "=";
                var begin = dc.indexOf("; " + prefix);
                if (begin == -1) {
                    begin = dc.indexOf(prefix);
                    if (begin != 0)
                        return null;
                }
                else
                {
                    begin += 2;
                    var end = document.cookie.indexOf(";", begin);
                    if (end == -1) {
                        end = dc.length;
                    }
                }
                return unescape(dc.substring(begin + prefix.length, end));
            }
        });
        $('.cookie-div').on('click','.cookie', function () {
//                alert('alert');
               $(this).removeClass('cookie');
               $(this).addClass('mark');
                var id = $(this).data("post-id");
                total.push(id);
                //alert(name);
                //console.log(postids);
                setCookie(favorite, total);
                //alert(total.length);
                $('.fav').html(total.length);
            });
    </script>
</html>
