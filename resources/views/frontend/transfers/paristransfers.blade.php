

@extends('frontend.layouts.app')

@section('content')
 

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
                             <h3 class="px-2">Book your </h3><h3>Journey Now</h3>
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
              <div class="col-12 site-heading">
               <h4>Paris private taxi service</h4>
               <h2>Paris Transfers</h2>
              </div>
              <div class="col-lg-12">
                 <div class="about-left">
                    
                    
                    <p>Disneyland Paris, located in the Paris suburb of Marne-la- Vallée a new town located 32 km (20 miles) east of the centre of Paris, is considered to be the most visited theme park in Europe which consists of two parks, Disneyland Park and Walt Disney Studios Park, and a shopping district, Disney Village. Start your adventure in dreamy Fantasyland at Sleeping Beauty's Castle and follow the stories of childhood favorites Peter Pan, Snow White and Pinocchio. There are many opportunities for kids to meet and greet their favorite characters, celebrate the magic with Disney characters and colourful parades. With Disney parade – watch your favorite Disney characters coming to life. At every turn, you are awed by the simple majesty of this amazing theme park. Array of awesome shows like Motor stunt show and Animagique and the unlimited rides like Indiana Jones and the Temple of Peril, Crush’s Coaster, Space Mountain, Phantom Manor , Mission 2 Tower of Terror, Pirates of the Caribbean and many more.</p><br/>            
            
                       <p>Enjoy your Disneyland transfer with PrivateTaxi Disney Paris and experience the magic of Disneyland Paris. Let your family and friends enjoy the tour together from the beginning. Whether you are at CDG, ORY, BVA airports or any Paris train station our friendly and trustworthy chauffer will assist you along the way and drop you right in front of the magical world. Be free from handling luggage; be with your kids and family and we will be responsible for everything else. All you have to do is experiencing a hassle free, enjoyable, luxury transfer service with your loved ones. To make your holiday a memorable one travel with Private Taxi Disney Paris to begin with.</p><br/>
                        
                       <p> <span style="color:#EC3323">"Hoping to see you board with Paris Private Transfer Cabs and wishing you a pleasant journey."</span> </p>
                   
                 </div>
              </div>
             
           </div>
        </div>
     </section>
     <!-- About Area End -->
      
      
     
    
      
      
    
      
    

     @endsection