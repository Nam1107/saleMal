<header>

        </head>
        <body>
            <div class="header-nav">
            <ul>  
            
            <li>
              <span>SALEMALL</span>
              
            </li>  
            <li style="float:right">
                <a href="{{route('register')}}">Đăng ký</a>
            </li>  
            <li style="float:right">
            <a href="{{route('login')}}">  Đăng nhập</a>
        </li>
    </ul>
            </div>
        
</header>


<script>
  function logout(){
    $.ajax({  
            url: ROOT + "/server/controllers/authen.php",
            type: 'post',
            data: {
              'logout': 1,
            },
            success:function(data)  
            {  
              window.open(ROOT + "/client/Auth/login.html","_self");
            }  
        });
  }
</script>