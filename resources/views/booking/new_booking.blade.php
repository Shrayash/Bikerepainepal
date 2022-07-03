{{-- @extends('layout.apps')

@section('content')
    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            Validation Error:
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ ucfirst($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
        

    <div class="body-container home-page home-page-bg">
        <div class="container" style="position: relative;">
            <div class="alert alert-success alert-dismissible fade show message" id="vanish" role="alert">
                <strong style="font-size: large">{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h1 class="text-center">
                SMF Health Portal
            </h1>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <p class="text-center"><span> <img src="{{ URL::to('assets/images/Disease.svg')}}" width="60%" alt=""></span></p>
                            <p class="text-center division-name">Diseases</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span> <img src="{{ URL::to('assets/images/Symptoms.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Symptoms</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/Medicine.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Medicine</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/Nutrition.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Nutrition</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/lab Test.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Lab Test</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('pub') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/research.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name"style="font-size:22px;">Research & Publications</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $('#vanish').fadeOut(15000);

    </script>
@endsection --}}

@extends('layout.apps')

@section('content')
    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            Validation Error:
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ ucfirst($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
        

    {{-- <div class="body-container home-page home-page-bg">
        <div class="container" style="position: relative;">
            <div class="alert alert-success alert-dismissible fade show message" id="vanish" role="alert">
                <strong style="font-size: large">{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h1 class="text-center">
                SMF Health Portal
            </h1>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <p class="text-center"><span> <img src="{{ URL::to('assets/images/Disease.svg')}}" width="60%" alt=""></span></p>
                            <p class="text-center division-name">Diseases</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span> <img src="{{ URL::to('assets/images/Symptoms.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Symptoms</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/Medicine.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Medicine</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/Nutrition.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Nutrition</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/lab Test.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Lab Test</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('pub') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/research.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name"style="font-size:22px;">Research & Publications</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <section style="background: rgb(242,242,242); ">
        <div class="main-panel container" >
                       <div class="content-wrapper">
                         <div class="col-12 grid-margin">
                           <div class="card" style="background: white;padding: 20px;border-radius: 9px;">
                             <div class="card-body">
                               <div class="d-flex justify-content-between">
                                               <h3 class="font-weight-semibold">Book New Customer</h3>
                                               
                                             </div>
                                   <form class="form-sample" action="index.html">
                                     <p class="card-description">Fill the details carefully. </p>
                                     <div class="row">
                                       <div class="col-md-6">
                                         <div class="form-group">
                                           <label for="exampleInputEmail1">First name</label>
                                           <input type="text" class="form-control" placeholder="First Name">
                                         </div>
                                       </div>
                                       <div class="col-md-6">
                                         <div class="form-group">
                                           <label for="exampleInputEmail1">Last name</label>
                                           <input type="text" class="form-control" placeholder="Last Name">
                                         </div>
                                       </div>
                                     </div>
                                     <div class="row">
                                       <div class="col-md-6">
                                         <div class="form-group">
                                           <label for="exampleInputEmail1">Mobile No.</label>
                                           <input type="text" class="form-control" placeholder="Mobile Number">
                                         </div>
                                       </div>
                                       <div class="col-md-6">
                                         <div class="form-group">
                                           <label for="exampleInputEmail1">Address</label>
                                           <input type="text" class="form-control" placeholder="Address">
                                         </div>
                                       </div>
                                     </div>
                                                            
                                    <div class="row">
                                      <div class="col-md-12">
                                         <table class="table table-bordered" id="dynamicTable">
                                           <h4>
                                         Enter your vehicle/s details here. If you have more than 1 vehicle to service, click <b>"Add More"</b> and add details of other vehicles.</h4> <br>   
                                           <tr>
                                               <th>Vehicle No.</th>
                                               <th>Service Date</th>
                                               <th>Delivery</th>
                                               <th>Vehicle Remarks</th>
                                               <th>Action</th>
                                           </tr>
                                           <tr>                                     
                                               <td>Ba-025-Pa-2034</td>
                                               <td>06/13/2022 10:30</td>
                                               <td>Self</td>
                                               <td>Blue NS 200CC</td>
                                               <td>--</td>
                                           </tr>
                                           <tr>  
                                               <td><input type="text" name="addmore[0][name]" placeholder="Enter Vehicle Number" class="form-control" /></td>
                                               <td><input type="datetime-local" class="form-control" placeholder="" name="addmore 0][price]"/></td> 
                                               <td><!-- <input type="text" name="addmore[0][qty]" placeholder="Enter your Qty" class="form-control" /> --><select class="form-control" name="product_id">
                                                   <option>Select option</option>
                                                   <option>Self</option>
                                                   <option>Pick Up/Drop</option>
                                               
                                               </select></td>  
                                               <td><input type="text" name="addmore[0][price]" placeholder="Vehicle color/brand name" class="form-control" /></td> 
                                               <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>  
                                           </tr>  
                                       </table> 
                                      </div>
                                    </div><br>
                                    <center>
                                     <a href="index.html">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                       </a>
                                   </center>
                                   </form>
                             </div>
                           </div>
                       </div>
                   </div>
               </div><br><br><br>
   </section>





 


    <section class="contact" id="contact" style="padding-top: 0px!important">
        <div id="map">
        			<!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

           <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.984016467525!2d85.24908401537927!3d27.68688888280037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb239844493f69%3A0xce8ea373ca0441ce!2zU2F0dW5nYWwgQ2hvd2sg4KS44KSk4KWB4KSZ4KWN4KSX4KSyIOCkmuCli-CklQ!5e0!3m2!1sen!2snp!4v1651315224683!5m2!1sen!2snp" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
    </section>
    
    <script>
        $('#vanish').fadeOut(15000);

    </script>
@endsection

