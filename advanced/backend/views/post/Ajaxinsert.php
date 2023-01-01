<?php


namespace backend\models;
namespace backend\controllers;

use yii\helpers\Url;


?>


<!DOCTYPE html>

                <html lang="en">
                <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Bugloos Backend Coding Challenge</title>

        </head>
            <body>
            <h1>Bugloos Backend Coding Challenge</h1>
            <button onclick="getCategoriesWithXMLHttpRequest()">Get Data with </button>


            <hr />
            <div id="container">

            </div>

<script>
    //*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    function getCategoriesWithXMLHttpRequest(){

        var request=new XMLHttpRequest();


        request.open("GET","https://jsonplaceholder.typicode.com/posts");


        request.onreadystatechange=function(){
            var $json;


            if (this.readyState == 4 && this.status == 200) {

                $json = this.responseText;

                request = $.ajax({
                    url: '<?= Url::to(['post/ajaxinsert']) ?>',
                    method: "POST",
                   processData: false,
                    data: JSON.stringify($json),
                   dataType:'json'
                });
                request.done(function (data) {
                   document.write("Request ok"+data);
                    console.log(data);
                });
                request.fail(function (jqXHR ,success,error, textStatus,complete,callback, errorThrown) {
                  document.write("Request failed <1> " + success + " <2> " + textStatus + " <3> " + errorThrown+"<4>"+error+"<5>"+callback+"<6>"+jqXHR);
                  console.log(data);
                });


            }
        }


        request.send();
    }
    //*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

</script>

</body>
</html>
