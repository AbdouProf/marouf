<!DOCTYPE html>
<html>
<head>
      <title>Drag and Drop file upload with Dropzone in Laravel 8</title>

      <!-- Meta -->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

</head>
<body>

       <div class='content'>
              <!-- Dropzone -->
             <form action="" class='dropzone' ></form> 
       </div>

       <!-- Script -->
       <script>
       var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

       Dropzone.autoDiscover = false;
       var myDropzone = new Dropzone(".dropzone",{ 
            maxFilesize: 2, // 2 mb
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
       });
       myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("_token", CSRF_TOKEN);
       }); 
       myDropzone.on("success", function(file, response) {

            if(response.success == 0){ // Error
                  alert(response.error);
            }

       });
       </script>

</body>
</html>