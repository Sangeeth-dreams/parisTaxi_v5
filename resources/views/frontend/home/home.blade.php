

@extends('frontend.layouts.app')

@section('content')
 
<style>
   .fleet_card{
      background: #FFFFFF;
      box-shadow: 0px 4px 4px rgba(206, 206, 206, 0.62), inset 0px 4px 4px rgba(206, 206, 206, 0.25);
   }
</style>
      <!-- Slider Area Start -->
      <section class="gauto-slider-area fix">
        <div class="gauto-slide owl-carousel">
           <div class="gauto-main-slide slide-item-1">
              <div class="gauto-main-caption">
                 <div class="gauto-caption-cell">
                    <div class="container">
                       <div class="row">
                          <div class="col-md-12">
                             <div class="slider-text">
                                {{-- <p>for rent $65 per day</p> --}}
                                <h2>Discover the wonders of Paris with us</h2>
                                <a href="#" class="gauto-btn">Reserve Now!</a>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <div class="gauto-main-slide slide-item-2">
              <div class="gauto-main-caption">
                 <div class="gauto-caption-cell">
                    <div class="container">
                       <div class="row">
                          <div class="col-md-12">
                             <div class="slider-text">
                                {{-- <p>for rent $70 per day</p> --}}
                                <h2>Reserved Now & Get </h2>
                                <a href="#" class="gauto-btn">Book Now!</a>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- Slider Area End -->
      
      
     <!-- Find Area Start -->
     <section class="gauto-find-area">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="find-box">
                    <div class="row">
                       <div class="col-md-4" >
                          <div class="find-text">
                             {{-- <h3>Make your</h3><h3>booking with Us</h3> --}}
                             <h3 class="px-2">Make your booking with us</h3>
                          </div>
                       </div>
                       <div class="col-md-8">
                          <div class="find-form">
                             <form>
                                <div class="row">
                                   <div class="col-md-4">
                                    <p>
                                       <select>
                                          <option data-display="Select Booking Type">Select Booking Type</option>
                                          <option>Arrival</option>
                                          <option>Depature</option>
                                          <option>Round Trip</option>
                                          <option>Excursion Trip</option>
                                       </select>
                                    </p>
                                   </div>
                                   <div class="col-md-4">
                                      <p>
                                         <input type="text" placeholder="Pickup From" />
                                      </p>
                                   </div>
                                   <div class="col-md-4">
                                    <p>
                                       <input type="text" placeholder="Drop To" />
                                    </p>
                                 </div>
                                  
                                </div>
                                <div class="row">
                                   <div class="col-md-4">
                                    <p>
                                       <input type="text" placeholder="Adults" />
                                    </p>
                                      {{-- <p>
                                         <input id="reservation_date" name="reservation_date" placeholder="Journey Date" data-select="datepicker" type="text">
                                      </p> --}}
                                   </div>
                                   <div class="col-md-4">
                                    <p>
                                       <input type="text" placeholder="Kids" />
                                    </p>
                                      {{-- <p class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                         <input type="text" class="form-control" placeholder="Journey Time" />
                                      </p> --}}
                                   </div>
                                   <div class="col-md-4">
                                      <p>
                                         <button type="submit" class="gauto-theme-btn">Continue: € 0 </button>
                                      </p>
                                   </div>
                                </div>
                             </form>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- Find Area End -->
      
      
     <!-- About Area Start -->
     <section class="gauto-about-area section_70">
        <div class="container">
           <div class="row">
              <div class="col-12 about-left">
               <h4>about us</h4>
               <h2>Welcome to Private Taxi Disney Paris Service</h2>
              </div>
              <div class="col-lg-6">
                 <div class="about-left">
                    
                    <p><span style="color:#EC3323">Congratulations</span> on choosing to spend your holiday in Paris, the most amazing holiday destination in the world, the “City of Love” and the “City of Lights”. Paris is one of the leading cities in the world for business, fashion, entertainment art and culture. With our Paris airport transfer service ,you will be able to experience an unforgettable  service throughout your journey. We will ensure that you have a safer Paris transfer service with us, as we provide one of the best services in the city.</p>
                    <p>Once you set your foot in this magical city, you don’t need to worry about anything. We bring you a very comfortable Paris airport  transfer service to transfer you in and around inner city of Paris and outer suburbs at a reasonable rate. With Private Taxi Disney Paris your safety and comfort is guaranteed. We provide a fleet of clean, comfortable and modern vehicles and with our drivers fluent in both French and English you will receive a reliable and exceptional service with minimum fuss and maximum comfort.</p>
                   
                 </div>
              </div>
              <div class="col-lg-6">
                 <div class="about-right">
                    <img src="{{asset('frontend/assets/img/about.png')}}" style="width: 100%" alt="disney_img" />
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- About Area End -->
      
      
     <!-- Service Area Start -->
     <section class="gauto-service-area section_70">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="site-heading">
                    <h4>see our</h4>
                    <h2>Latest Services</h2>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-12">
                 <div class="service-slider owl-carousel">
                    <div class="single-service">
                       <span class="service-number">01 </span>
                       <div class="service-icon">
                          <img src="{{asset('frontend/assets/img/city-transport.png')}}" alt="city trasport" />
                       </div>
                       <div class="service-text">
                          <a href="#">
                             <h3>City transfer</h3>
                          </a>
                       </div>
                    </div>
                    <div class="single-service">
                       <span class="service-number">02 </span>
                       <div class="service-icon">
                          <img src="{{asset('frontend/assets/img/airport-transport.png')}}" alt="airport trasport" />
                       </div>
                       <div class="service-text">
                          <a href="#">
                             <h3>Airport transfer</h3>
                          </a>
                       </div>
                    </div>
                   
                   
                    <div class="single-service">
                       <span class="service-number">03</span>
                       <div class="service-icon">
                           <img src="{{asset('frontend/assets/img/whole_city_tour.png')}}" alt="city tours" />
                        </div>
                       <div class="service-text">
                          <a href="#">
                             <h3>Whole City Tour</h3>
                          </a>
                       </div>
                    </div>
                    <div class="single-service">
                       <span class="service-number">05</span>
                       <div class="service-icon">
                        <img src="{{asset('frontend/assets/img/luggage.png')}}" alt="hospital trasport" />
                     </div>
                       <div class="service-text">
                          <a href="#">
                             <h3>Saftey Luggage Transport</h3>
                          </a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- Service Area End -->
      
      
     <!-- Testimonial Area Start -->
     <section class="gauto-testimonial-area section_70">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="site-heading">
                    <h4>Some words</h4>
                    <h2>testimonial</h2>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-12">
                 <div class="testimonial-slider owl-carousel">
                    <div class="single-testimonial">
                       <div class="testimonial-text">
                          <p>"Dorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit."</p>
                          <div class="testimonial-meta">
                             
                             <div class="client-info">
                                <h3>Marco Ghaly</h3>
                                <p>Customer</p>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="single-testimonial">
                       <div class="testimonial-text">
                          <p>"Forem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit."</p>
                          <div class="testimonial-meta">
                             
                             <div class="client-info">
                                <h3>Sherief Arafa</h3>
                                <p>Customer</p>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="single-testimonial">
                       <div class="testimonial-text">
                          <p>"Dorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit."</p>
                          <div class="testimonial-meta">
                            
                             <div class="client-info">
                                <h3>Marco Ghaly</h3>
                                <p>Customer</p>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="single-testimonial">
                       <div class="testimonial-text">
                          <p>"Dorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit."</p>
                          <div class="testimonial-meta">
                             
                             <div class="client-info">
                                <h3>Marco Ghaly</h3>
                                <p>Customer</p>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- Testimonial Area End -->
      
      
     <!-- Driver Area Start -->
     <section class="gauto-driver-area section_70">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="site-heading">
                    <h4>See Our</h4>
                    <h2>Popular Transfers</h2>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-lg-4 col-md-6  col-sm-12">
                 <div class="single-driver">
                    <div class="tour_image">
                       <img class="transfers_img" src="{{asset('frontend/assets/img/tours/tour_1.jpg')}}" alt="tour" />
                       
                    </div>
                    <div class="tour_text">
                       <div class="col-12">
                         <h3>Marco Ghaly</h3><p class="tour_price">€75</p>
                         
                      </div> 
                      <div class="col-12">
                        <p class="tour_passenger_text">1-3 Passengers</p>
                      </div>
                      <div class="col-12 mt-3">
                        <p class="tour_description">Lorem ipsum dolor sit amet, consec
                           tetur adipiscing elit, sed do eiusmod 
                           tempor incididunt ut labore et dolore
                            magna aliqua. tempor incididunt ut
                            labore et dolore  magna aliqua. </p>
                      </div>
                      <div class="col-md-12">
                        <div class="load-more">
                           <a href="#" class="gauto-btn">BOOK NOW</a>
                        </div>
                     </div>
                          
                       
                    </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                 <div class="single-driver">
                    <div class="tour_image">
                       <img class="transfers_img" src="{{asset('frontend/assets/img/tours/tour_2.jpg')}}" alt="tour" />
                      
                    </div>
                    <div class="tour_text">
                        <div class="col-12">
                           <h3>Marco Ghaly</h3><p class="tour_price">€75</p>
                        </div> 
                        <div class="col-12">
                           <p class="tour_passenger_text">1-3 Passengers</p>
                        </div>
                        <div class="col-12 mt-3">
                           <p class="tour_description">Lorem ipsum dolor sit amet, consec
                              tetur adipiscing elit, sed do eiusmod 
                              tempor incididunt ut labore et dolore
                              magna aliqua. tempor incididunt ut
                              labore et dolore  magna aliqua. </p>
                        </div>
                        <div class="col-md-12">
                           <div class="load-more">
                              <a href="#" class="gauto-btn">BOOK NOW</a>
                           </div>
                        </div>
                     </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                 <div class="single-driver">
                    <div class="tour_image">
                       <img class="transfers_img" src="{{asset('frontend/assets/img/tours/tour_3.jpeg')}}" alt="tour" />
                       
                    </div>
                    <div class="tour_text">
                        <div class="col-12">
                           <h3>Marco Ghaly</h3><p class="tour_price">€75</p>
                        </div> 
                        <div class="col-12">
                           <p class="tour_passenger_text">1-3 Passengers</p>
                        </div>
                        <div class="col-12 mt-3">
                           <p class="tour_description">Lorem ipsum dolor sit amet, consec
                              tetur adipiscing elit, sed do eiusmod 
                              tempor incididunt ut labore et dolore
                              magna aliqua. tempor incididunt ut
                              labore et dolore  magna aliqua. </p>
                        </div>
                        <div class="col-md-12">
                           <div class="load-more">
                              <a href="#" class="gauto-btn">BOOK NOW</a>
                           </div>
                        </div>
                  </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
               <div class="single-driver">
                  <div class="tour_image">
                     <img class="transfers_img" src="{{asset('frontend/assets/img/tours/tour_3.jpeg')}}" alt="tour" />
                     
                  </div>
                  <div class="tour_text">
                      <div class="col-12">
                         <h3>Marco Ghaly</h3><p class="tour_price">€75</p>
                      </div> 
                      <div class="col-12">
                         <p class="tour_passenger_text">1-3 Passengers</p>
                      </div>
                      <div class="col-12 mt-3">
                         <p class="tour_description">Lorem ipsum dolor sit amet, consec
                            tetur adipiscing elit, sed do eiusmod 
                            tempor incididunt ut labore et dolore
                            magna aliqua. tempor incididunt ut
                            labore et dolore  magna aliqua. </p>
                      </div>
                      <div class="col-md-12">
                        <div class="load-more">
                           <a href="#" class="gauto-btn">BOOK NOW</a>
                        </div>
                     </div>
                </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
               <div class="single-driver">
                  <div class="tour_image">
                     <img class="transfers_img" src="{{asset('frontend/assets/img/tours/tour_3.jpeg')}}" alt="tour" />
                     
                  </div>
                  <div class="tour_text">
                      <div class="col-12">
                         <h3>Marco Ghaly</h3><p class="tour_price">€75</p>
                      </div> 
                      <div class="col-12">
                         <p class="tour_passenger_text">1-3 Passengers</p>
                      </div>
                      <div class="col-12 mt-3">
                         <p class="tour_description">Lorem ipsum dolor sit amet, consec
                            tetur adipiscing elit, sed do eiusmod 
                            tempor incididunt ut labore et dolore
                            magna aliqua. tempor incididunt ut
                            labore et dolore  magna aliqua. </p>
                      </div>
                      <div class="col-md-12">
                        <div class="load-more">
                           <a href="#" class="gauto-btn">BOOK NOW</a>
                        </div>
                     </div>
                </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
               <div class="single-driver">
                  <div class="tour_image">
                     <img class="transfers_img" src="{{asset('frontend/assets/img/tours/tour_3.jpeg')}}" alt="tour" />
                     
                  </div>
                  <div class="tour_text">
                      <div class="col-12">
                         <h3>Marco Ghaly</h3><p class="tour_price">€75</p>
                      </div> 
                      <div class="col-12">
                         <p class="tour_passenger_text">1-3 Passengers</p>
                      </div>
                      <div class="col-12 mt-3">
                         <p class="tour_description">Lorem ipsum dolor sit amet, consec
                            tetur adipiscing elit, sed do eiusmod 
                            tempor incididunt ut labore et dolore
                            magna aliqua. tempor incididunt ut
                            labore et dolore  magna aliqua. </p>
                      </div>
                      <div class="col-md-12">
                        <div class="load-more">
                           <a href="#" class="gauto-btn">BOOK NOW</a>
                        </div>
                     </div>
                </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
               <div class="single-driver">
                  <div class="tour_image">
                     <img class="transfers_img" src="{{asset('frontend/assets/img/tours/tour_3.jpeg')}}" alt="tour" />
                     
                  </div>
                  <div class="tour_text">
                      <div class="col-12">
                         <h3>Marco Ghaly</h3><p class="tour_price">€75</p>
                      </div> 
                      <div class="col-12">
                         <p class="tour_passenger_text">1-3 Passengers</p>
                      </div>
                      <div class="col-12 mt-3">
                         <p class="tour_description">Lorem ipsum dolor sit amet, consec
                            tetur adipiscing elit, sed do eiusmod 
                            tempor incididunt ut labore et dolore
                            magna aliqua. tempor incididunt ut
                            labore et dolore  magna aliqua. </p>
                      </div>
                      <div class="col-md-12">
                        <div class="load-more">
                           <a href="#" class="gauto-btn">BOOK NOW</a>
                        </div>
                     </div>
                </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
               <div class="single-driver">
                  <div class="tour_image">
                     <img class="transfers_img" src="{{asset('frontend/assets/img/tours/tour_3.jpeg')}}" alt="tour" />
                     
                  </div>
                  <div class="tour_text">
                      <div class="col-12">
                         <h3>Marco Ghaly</h3><p class="tour_price">€75</p>
                      </div> 
                      <div class="col-12">
                         <p class="tour_passenger_text">1-3 Passengers</p>
                      </div>
                      <div class="col-12 mt-3">
                         <p class="tour_description">Lorem ipsum dolor sit amet, consec
                            tetur adipiscing elit, sed do eiusmod 
                            tempor incididunt ut labore et dolore
                            magna aliqua. tempor incididunt ut
                            labore et dolore  magna aliqua. </p>
                      </div>
                      <div class="col-md-12">
                        <div class="load-more">
                           <a href="#" class="gauto-btn">BOOK NOW</a>
                        </div>
                     </div>
                </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
               <div class="single-driver">
                  <div class="tour_image">
                     <img class="transfers_img" src="{{asset('frontend/assets/img/tours/tour_3.jpeg')}}" alt="tour" />
                     
                  </div>
                  <div class="tour_text">
                      <div class="col-12">
                         <h3>Marco Ghaly</h3><p class="tour_price">€75</p>
                      </div> 
                      <div class="col-12">
                         <p class="tour_passenger_text">1-3 Passengers</p>
                      </div>
                      <div class="col-12 mt-3">
                         <p class="tour_description">Lorem ipsum dolor sit amet, consec
                            tetur adipiscing elit, sed do eiusmod 
                            tempor incididunt ut labore et dolore
                            magna aliqua. tempor incididunt ut
                            labore et dolore  magna aliqua. </p>
                      </div>
                      <div class="col-md-12">
                        <div class="load-more">
                           <a href="#" class="gauto-btn">BOOK NOW</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
           </div>
           
        </div>
     </section>
     <!-- Driver Area End -->
      
      
    
      
      
     <!-- Blog Area Start -->
     <section class="gauto-blog-area section_70">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="site-heading">
                    <h4>See Our</h4>
                    <h2>Fleet</h2>
                 </div>
              </div>
           </div>
           <div class="row">
            <div class="col-md-12">
               {{-- <div class="service-slider owl-carousel">
                  <div class="single-service">
                     <div class="service-icon">
                        <img src="{{asset('frontend/assets/img/city-transport.png')}}" alt="city trasport" />
                     </div>
                     <div class="service-text">
                        <a href="#">
                           <h3>City transfer</h3>
                        </a>
                     </div>
                  </div>
                  <div class="single-service">
                     <div class="service-icon">
                        <img src="{{asset('frontend/assets/img/airport-transport.png')}}" alt="airport trasport" />
                     </div>
                     <div class="service-text">
                        <a href="#">
                           <h3>Airport transfer</h3>
                        </a>
                     </div>
                  </div>
                 
                 
                 
               </div> --}}
               <div class="fleet-slider owl-carousel">
                  <div class="single-service">
                     <div class="col-12">
                        <div class="col-6">

                        </div>
                        <div class="col-6">
                           
                        </div>
                     </div>
                  </div>
                  <div class="single-service">
                     <span class="service-number">02 </span>
                     <div class="service-icon">
                        <img src="{{asset('frontend/assets/img/airport-transport.png')}}" alt="airport trasport" />
                     </div>
                     <div class="service-text">
                        <a href="#">
                           <h3>Airport transfer</h3>
                        </a>
                     </div>
                  </div>
                 
                 
                  
               </div>
               
            </div>
         </div>
        </div>
     </section>
     <!-- Blog Area End -->

     @endsection