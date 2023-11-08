<header class="short-header">   

    <div class="gradient-block"></div>	

    <div class="row header-content">

        <div class="logo">
          <a href="{{url('/')}}">MAG</a>
       </div>

        <nav id="main-nav-wrap">
             <ul class="main-navigation sf-menu">
                 <li class="current"><a href="{{url('/')}}" title="">Home</a></li>									
                 <li >
                     <a href="#" title="">Categories</a>						
                 </li>
                 <li >
                     <a href="#" title="">Blog</a>								       
                 </li>
                 <li><a href="{{route('aboutpage')}}" title="">About</a></li>	
                 @if(Auth::check())
                    <li><a href="{{url('/logout')}}" title="">Logout</a></li>
                 
                 @else
                    <li><a href="{{url('/regiser')}}" title="">Register</a></li>	
                 <li><a href="{{url('/login')}}"  title="">Login</a></li>	
                 
                 @endif
                 								
             </ul>
     </nav> 

         

         <div class="triggers">
             <a class="menu-toggle" href="#"><span>Menu</span></a>
         </div>
        
    </div>     		
    
</header> 

