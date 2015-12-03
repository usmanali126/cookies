<?php
if (isset($_COOKIE['favorite'])) {
    $cookie = explode(',', $_COOKIE['favorite']);
    $fav = sizeof($cookie);
}


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
            .remove{
                cursor: pointer;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <a href="index.php">Index </a><sup class="fav"> <?php echo isset($fav) ? $fav : ''; ?></sup>
        <?php
        for ($i = 1; $i < 20; $i++) {
            if (isset($cookie) && in_array($i, $cookie)) {
                ?>

                <div class="cookie-div">
                    <span> cookie Number <?php echo $i; ?></span><span class="mark"  data-post-id="<?php echo $i; ?>"><?php echo $i; ?></span>
                </div>
                <?php
            }
        }
        ?>
        <div><span class="remove">Remove All</span></div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>

        var favorite = 'favorite';
        var exdays= 365;
        var total = getCookie(favorite);
        //alert(total);
        if(total!=null){
        var total = total.split(",");
    }else{
        total = new Array();
        }
//        $(document).ready(function () {
            //var postids= new Array();
            
            $('.cookie-div').on('click', '.mark', function () {
//                alert('alert');
                $(this).removeClass('mark');
                $(this).addClass('cookie');

                var id = $(this).data("post-id");
                id = id.toString()
                console.log(total);
                //index=total.indexOf(id);
                total.splice($.inArray(id, total), 1);
                console.log(total);
                console.log(total.length);
                $('.fav').html(total.length);
                //postids.push(id);
                //alert(name);
                //console.log(postids);
                if(total.length!=0){
                  setCookie(favorite, total, exdays);  
                }
                else{
                    setCookie(favorite, total, -2);
                }
                

            });

//        });

        $('.remove').on('click',function(){
           setCookie(favorite, total, -2);
           $('.cookie-div').find('.mark').toggleClass('mark cookie');
           $('.fav').html(0);
        });
        
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
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

        $('.cookie-div').on('click', '.cookie', function () {
//                alert('alert');
            $(this).removeClass('cookie');
            $(this).addClass('mark');
            var id = $(this).data("post-id");
            total.push(id);
            //alert(name);
            //console.log(postids);
            setCookie(favorite, total, exdays);
            console.log(total);
            //alert(total.length);
            $('.fav').html(total.length);
        });
    </script>
</html>
