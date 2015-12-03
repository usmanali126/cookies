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
                background: green; 
                padding: 5px;
                margin-left: 5px;
                border: 1px solid activecaption;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <a href="favorite.php">Favorites<sup class="fav"> <?php echo isset($fav) ? $fav : ''; ?></sup></a>
        <?php for ($i = 1; $i < 20; $i++) { ?>
            <div class="cookie-div">
                <span> cookie Number <?php echo $i; ?></span><span class="<?php if(isset($cookie)){echo in_array($i, $cookie)?"mark":"cookie";}else{echo "cookie";} ?>"  data-post-id="<?php echo $i; ?>"><?php echo $i; ?></span>
            </div>
            <?php
        }
        ?>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>

        var favorite = 'favorite';
        var exdays= 365;
        var total = getCookie(favorite);
//        alert(total);
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
                    setCookie(favorite, favorite, -2);
                }
                

            });

//        });

        
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
    <script>
        /*$(document).ready(function () {
            var postids = new Array();
            var favorite='favorite';
            $('.cookie').on('click', function () {
//                alert('alert');
                $(this).css("background", "green");
                var id = $(this).data("post-id");
                postids.push(id);
                //alert(name);
                console.log(postids);
                setCookie(favorite, postids);
                //alert(postids.length);
                $('.fav').html(postids.length);
//                var total = getCookie(favorite);
//                if (total == null) {
//                    //alert('not set');
//                }
//                else {
//                    total=total.length;
//                    //alert('set'+total);
//                }
//                alert(total);

            });

            function setCookie(cname, cvalue) {
                var d = new Date();
                d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + "; " + expires;
                //alert('cookie set');
            }

//            function getCookie(cname) {
//                var name = cname;
//                var ca = document.cookie.split(',' + name);
//                console.log(ca);
//                return '';
//                for (var i = 0; i < ca.length; i++) {
//                    var c = ca[i];
//                    while (c.charAt(0) == ' ')
//                        c = c.substring(1);
//                    if (c.indexOf(name) == 0) {
//                        return c.substring(name.length, c.length);
//                    }
//                }
//                return '';
//            }

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
        });*/
    </script>
</html>
