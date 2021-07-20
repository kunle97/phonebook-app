<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<body>
   <div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Phonebook App - Sign In
            </h1>
            <h2 class="wv-heading--subtitle">
               By Adekunle Ademefun
            </h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="/signin" method="post" name="login">

                  <div class="form-group">
                     <input type="email" name="email" value="testuser1@email.com"  class="form-control my-input" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <input type="password"  name="password" id="password" value="password" class="form-control my-input" placeholder="Password">
                  </div>
                  <div class="text-center ">
                     <button type="submit" class=" btn btn-block send-button tx-tfm">Sign In</button>
                  </div>
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <a href="/sign-up"  >Create an Account?</a>


               </form>
            </div>
         </div>
      </div>
   </div>
</body>
