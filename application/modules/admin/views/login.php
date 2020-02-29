<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Dreamwed | Admin Login</title>

  <link href="<?=BACKEND_ASSESTS_CSS;?>bootstrap.min.css" rel="stylesheet">
  <link href="<?=BACKEND_ASSESTS;?>font-awesome/css/font-awesome.css" rel="stylesheet">

  <link href="<?=BACKEND_ASSESTS_CSS;?>animate.css" rel="stylesheet">
  <link href="<?=BACKEND_ASSESTS_CSS;?>style.css" rel="stylesheet">
  <link href="<?=BACKEND_ASSESTS_CSS;?>plugins/toastr/toastr.min.css" rel="stylesheet">
  <link href="<?=BACKEND_ASSESTS_CSS;?>custom_css/custom.css" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
</head>

<body class="gray-bg">
  <div class="loginColumns animated fadeInDown">
    <div class="row">
      <div class="col-md-6">
        <h2 class="font-bold">Welcome to Dreamwed</h2>
          <p>
            Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
          </p>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
          </p>
          <p>
            When an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
          <p>
            <small>
              It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
            </small>
          </p>
        </div>
        <div class="col-md-6">
          <div class="ibox-content">
            <?php echo form_open(base_url()."admin/login/update","id=login")?>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email/Username" >
                <spsn class="text-danger error font_12" id="email_error" ></span>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" >
                <spsn class="text-danger error font_12" id="password_error" ></span>
              </div>
              <button type="submit" class="btn btn-primary block full-width m-b">Login</button>  
              <a href="#">
                <small>Forgot password?</small>
              </a>
              <p class="text-muted text-center">
                <small>Do not have an account?</small>
              </p>
              <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            <?php echo form_close();?>
            <p class="m-t">
              <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
            </p>
          </div>
        </div>
      </div>
      <hr/>
      <div class="row">
        <div class="col-md-6">
          Copyright Example Company
        </div>
        <div class="col-md-6 text-right">
          <small>© 2014-2015</small>
        </div>
      </div>
    </div>
    <script src="<?=BACKEND_ASSESTS_JS;?>plugins/toastr/toastr.min.js"></script>
    <script>
      var base_url = '<?php echo base_url();?>';
      $("#login").validate({
        rules: {
          'email': {
            required: true,
            remote: base_url+"admin/login/check_unique_email_login/"},

         'password': {
            required: true,
            maxlength: 20,},
        },
        messages: {
          'email': { 
            required: "Email field is required.",
            email:"Please enter valid email id.",
            remote: jQuery.validator.format("{0} is not registerd with us.")},  

          'password': {
            required: "Password field is required.",
          },
        },
        errorPlacement: function(error, element) {
          if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
          } else {
            error.insertAfter(element);
          }
        },
      });
      var err_unknown = 'Something went wrong.';
      $("#login").submit(function(e){
      e.preventDefault();
      if ($('#login').valid()==false) {
        toster('Warning','Please fill all required field to continue.','Warning');
        return false;
      }
      var formdata = new FormData(this);
      console.log(formdata);
      $(".error").html(''); 
      $.ajax({
        type:"POST",
        url:base_url + "admin/login/update",
        cache:false,
        contentType: false,
        processData: false,
        data: formdata,
        dataType: "json",
        /*beforeSend: function() {
          show_loader();                           
        },
        complete:function(){
          hide_loader(); 
        }, */
        success:function(res){
          $('#preloader').fadeOut(500);
          $("input[name*='csrf_test_name']" ).val(res.csrf);
          if(res.status == 1){
            location.reload();
          } else{
            toastr.error(res.message);
          }
          if(res.status == -1){
            window.setTimeout(function() { window.location = res.url; },500);
          }
        },
        error: function (jqXHR, textStatus, errorThrown){
          toastr.error(res.message);
        }
      });
    });
  </script>
</body>

</html>
