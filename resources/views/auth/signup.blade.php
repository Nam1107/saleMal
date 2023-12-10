@extends('auth-index')
@section('auth')
<script type="text/javascript">
    $(function(){
      $('form').submit(function(){

        // $.post(ROOT + "/server/controllers/users.php",{
        //         'create-user' : 1,
        //         'UserName' : $("[name=UserName]").val(),
        //         'Email' : $("[name=Email]").val(),
        //         'Password' : $("[name=Password]").val(),
        //         're_Pass' : $("[name=re_Pass]").val(),
        //       },function(data)  
        //       {  
        //         var obj = JSON.parse(data);
        //         if(obj.rep==1){
        //           window.open(ROOT + "/client/auth/login.html","_self");
        //         }else{
        //           alert(obj.message)
        //         }
        //       } )
        //         return false;
    })
    $('#logo').click(function(){
      // window.open(ROOT + "/client/homepage/index.html","_self");
    })
    
    })
</script>




<div class="item" >
  <div class="text-center" id="logo">
    <a class="text-title" href="{{route('home')}}" style="font-size: 40px;background: none;border: none;">SALE MALL</a>
  </div>
  <div class="tag-title text-center"style="background-color: wheat;">
    <span class="" >Create new account</span>
  </div>
    <div class="tag-title" style="font-size: 15px;">
        <form method="POST">
            
            <div class="mb-3">
                <label  class="form-label" style="padding:10px">User Name</label>
                <input type="text" class="form-control" name="UserName" value="" placeholder="User Name"/>
            </div>
            <div class="mb-3">
                <label  class="form-label" style="padding:10px">User Email</label>
                <input type="email" class="form-control" name="Email" value="" placeholder="User Email" />
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" style="padding:10px">Password</label>
                <input type="password" class="form-control" name="Password" value="" placeholder="Password"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" style="padding:10px">Password Confirm</label>
                <input type="password" class="form-control" name="re_Pass" value="" placeholder="Repeat your password"/>
            </div>
            <div class="atb-2" style="padding:10px">
              <a style="font-style: italic;"  href="{{route('login')}}">Back to Login page</a>
              <p></p>
          </div>
            <button type="submit" name="create-user" class="a-btn">Create</button>
        </form>
      
    </div>
    </div>
@endsection


