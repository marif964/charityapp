<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    @livewireStyles
</head>
<body>

   <div class="container">
       <div class="row" style="margin-top:50px">
             <div class="col-md-6 offset-md-3">
                 <h1 class="text-center ">Organization Details</h1><hr>
                 <p class="text-center"> Please fill in your organization details in below form.</p>
                 @livewire('multistepform')
             </div>
       </div>
   </div>
    
    @livewireScripts
</body>
</html>


