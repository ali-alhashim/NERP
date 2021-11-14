<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<script>
              console.log("test form js");
              const openBtn = document.querySelector('.open-btn');
              const closeBtn = document.querySelector('.close-btn');
              const nav = document.querySelector('.navBAR');
              
              const productContainerID = document.getElementById('productContainerID');
              
              openBtn.addEventListener('click', ()=>{
                nav.classList.add('visible');
               // nav.style.position='relative';
               productContainerID.classList.remove('col-12');
               productContainerID.classList.add('col-10');
                });

              closeBtn.addEventListener('click', ()=>{
                nav.classList.remove('visible');
                
                productContainerID.classList.remove('col-10');
                productContainerID.classList.add('col-12');
              //  nav.style.position='fixed';
                });
             
            </script> 


</body>
</html>