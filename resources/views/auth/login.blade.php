@extends('auth-index')
@section('auth')
<script type="text/javascript">
    $(document).ready(function(){
      // $.post(ROOT + "/server/controllers/authen.php",{
      //           'authenLogin' : 1,
      //         },function(data)  
      //         {  
      //           var obj = JSON.parse(data);
      //           if(obj.status =='admin'){
      //             window.open(ROOT + "/client/CMS/comics","_self");
      //           }
      //           else if(obj.status =='user'){
      //             window.open(ROOT + "/client/homepage/index.html","_self");
      //           }
      //         } )
      //   return false;
    })
    $(function(){
      $('form').submit(function(){
        alert('1');
        return 1;
        // $.post(ROOT + "/server/controllers/authen.php",{
        //         'signin' : 1,
        //         'Email' : $("[name=Email]").val(),
        //         'Password' : $("[name=Password]").val(),
        //       },function(data)  
        //       {  
        //         var obj = JSON.parse(data);
        //         if(obj.status!='guest'){
        //           window.open(ROOT + "/client/CMS/users","_self");
        //         }else{
        //             var message = '';
        //             for(var i=0;i<obj.errors.length;i++){
        //                 message += obj.errors[i] + '\n';
        //             }
        //             alert(message);
        //         }
        //       } )
        // return false;
    })
    
    })
</script>
<div class="item" >
    
<div class="text-center" id="logo">
    <a class="text-title" href="{{route('home')}}" style="font-size: 40px;background: none;border: none;">SALE MALL</a>
  </div>

        <div class="tag-title text-center" style="background-color: wheat;">
            <span style="font-size:20px;">Log in page</span>
        </div>
        <div class="tag-title" style="font-size: 14px;">
            <form method="POST">
                <div class="mb-3" >
                    <label  class="form-label" style="padding:10px">User Email</label>
                    <input type="email" class="form-control" name="Email" value="" placeholder="User Email" />
                </div>
                <div class="mb-3" >
                    <label for="exampleInputPassword1" class="form-label" style="padding:10px">Password</label>
                    <input type="password" class="form-control" name="Password" value="" placeholder="Password"/>
                </div>
                <div style="padding-top:10px"><a href="{{route('register')}}">Create new user</a></div>
                
                <br>
                <button type="submit" name="create-user" class="a-btn">Login</button>
            </form>
        
        </div>
</div>
@endsection