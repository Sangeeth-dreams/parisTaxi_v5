<style>
   .logo_txt{
      font-family: 'Federo';
      font-size: 36px;
      color: #000000;
   }
   .top_logo{
      width: 270px;
      height: 60px;
   }
</style> 
 
 <!-- Header Top Area Start -->
  <section class="gauto-header-top-area">
    <div class="container">
       <div class="row">
          <div class="col-md-7">
             <div class="header-top-left">
                <p><i class="fa fa-phone"></i> Call: (+33) 7818 88 425 / (+33) 7868 52 413</p>
             </div>
          </div>
          <div class="col-md-5">
             <div class="header-top-right">
              
                <div class="dropdown">
                   <button class="btn-dropdown dropdown-toggle" type="button" id="dropdownlang" data-toggle="dropdown" aria-haspopup="true">
                   <img src="{{asset('frontend/assets/img/en.png')}}" alt="lang" /> English
                   </button>
                   <ul class="dropdown-menu" aria-labelledby="dropdownlang">
                      <li><img src="{{asset('frontend/assets/img/ca.png')}}" alt="lang" /> Canada</li>
                      <li><img src="{{asset('frontend/assets/img/fa.png')}}" alt="lang" /> French</li>
                      <li><img src="{{asset('frontend/assets/img/ja.png')}}" alt="lang" /> Japanese</li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- Header Top Area End -->
  
  
 <!-- Main Header Area Start -->
 <header class="gauto-main-header-area">
    <div class="container">
       <div class="row">
          <div class="col-md-9">
             <div class="site-logo">
                
                  <a href="/">
                     <div class="row">
                        {{-- <h2 class="logo_txt">PRIVATE <span style="color:#ffce14;">TA</span></h2><img class="top_logo" src="{{asset('frontend/assets/img/logo.png')}}" alt="logo" /><h2 class="logo_txt"><span style="color:#ffce14;">XI</span></h2> --}}
                        <img class="top_logo" src="{{asset('frontend/assets/img/top_logo.png')}}" alt="logo" />
                     </div>
                     
                 </a>
                
                
             </div>
          </div>
         
          <div class="col-lg-3">
             <div class="header-action">
                <a href="#"><i class="fa fa-phone"></i> Request a call</a>
             </div>
          </div>
       </div>
    </div>
 </header>
 <!-- Main Header Area End -->
  
  
 <!-- Mainmenu Area Start -->
 <section class="gauto-mainmenu-area">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="mainmenu">
                <nav>
                   <ul id="gauto_navigation">
                      <li class="active"><a href="/">home</a></li>
                      {{-- <li><a href="about.html">about</a></li> --}}
                      <li>
                         <a href="#">Book Now</a>
                         <ul>
                            <li><a href="/arrival">Arrival</a></li>
                            <li><a href="#">Departure</a></li>
                            <li><a href="#">Round Trip</a></li>
                            <li><a href="#">Excursion Trip</a></li>

                         </ul>
                      </li>
                      <li><a href="/disneytransfers">DISNEYLAND TRANSFERS</a></li>
                      <li><a href="/paristransfers">Paris TRANSFERS</a></li>

                      <li>
                         <a href="#">RATES</a>
                         <ul>
                            <li><a href="/onewayrates">Oneway trip rates</a></li>
                            <li><a href="#">Round Trip Rates</a></li>
                            <li><a href="#">Oneway trip rates</a></li>

                         </ul>
                      </li>
                      <li><a href="#">FAQs</a></li>
                      <li><a href="#">Comments</a></li>

                      
                      <li><a href="#">contact us</a></li>
                   </ul>
                </nav>
             </div>
          </div>
       
       </div>
    </div>
 </section>
 <!-- Mainmenu Area End -->
  