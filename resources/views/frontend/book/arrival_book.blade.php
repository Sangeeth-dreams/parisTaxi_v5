@extends('frontend.layouts.app')

@section('content')

<link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<style>
    .form_topic{
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-size: 24px;
        text-transform: capitalize;
        text-align: center;
        color: #001238;
    }
    .iti{
      width:100%;
      height: 45px;
    }
</style>
      <!-- Car Listing Area Start -->
      <section class="gauto-car-listing section_70">
        <div class="container">
           <div class="row">
              <div class="col-lg-6">
                 <div class="car-list-left">
                     
                    <div class="sidebar-widget">
                       <form>
                        <h4 class="form_topic mt-4 mb-5">Personal Details</h4>
                        <div class="container">
                            <p>
                                <input type="text" placeholder="Your Name" />
                             </p>
                             <p>
                                <input  id="phone" type="tel" name="phone" />
                             </p>
                             <p>
                                <input type="text" placeholder="Your Email" />
                             </p>
                             <p>
                                    <select class="col-6">
                                       <option data-display="Adult">Adult</option>
                                       <option>1</option>
                                       <option>2</option>
                                    </select>
                                    <select class="col-6">
                                       <option data-display="Kids">Kids</option>
                                       <option>1</option>
                                       <option>2</option>
                                    </select>  
                             </p>
                             <p>
                                <input id="reservation_date" name="reservation_date" placeholder="Journey Date" data-select="datepicker" type="text">
                             </p>
                             <p class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                <input type="text" class="form-control" placeholder="Journey Time" />
                             </p>
                             <p>
                                <button type="submit" class="gauto-theme-btn">Find Car</button>
                             </p>
                        </div>
                         
                       </form>
                    </div>
                  
                 </div>
              </div>
            
           </div>
        </div>
     </section>
     <!-- Car Listing Area End -->

     <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
          utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
      </script>
 @endsection