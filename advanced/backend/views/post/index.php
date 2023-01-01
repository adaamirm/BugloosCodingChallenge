<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugloos Backend Coding Challenge</title>
    <style>
        .category-box{
            width: 750px;
            height: 260px;
            margin: 5px;
            padding:15px;
            float: left;
            box-shadow: 0px 1px 14px 2px #c0c0c0 ;
        }

    </style>
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

                generateCategoryBox(JSON.parse(this.responseText));

            }
        }
        //step 4
        request.send();
    }

    function generateCategoryBox(data){
        for(let i=0;i<data.length; i++){
            createBox(data[i])
            // const element =array[i];
        }
        document.querySelector("#container").innerHTML==data;
    }

    function createBox(Category){
        let box=document.createElement("div");
        box.className="category-box";

        let ID=document.createElement("h3");
        ID.innerText=Category.id

        let useridinfo=document.createElement("p");
        useridinfo.innerText=Category.userId;

        let titleinfo=document.createElement("p");
        titleinfo.innerText=Category.title;

        let bodyinfo=document.createElement("p");
        bodyinfo.innerText=Category.body;

        box.appendChild(ID);
        box.appendChild(useridinfo);
        box.appendChild(titleinfo);
        box.appendChild(bodyinfo);

        document.querySelector("#container").append(box);

    }
</script>

</body>
</html>