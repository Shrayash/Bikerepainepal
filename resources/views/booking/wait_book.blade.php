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
  
    <section class="bookbanner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-1">
                    <div class="banner-caption">
                        <center>
                       
                        <!-- <span>We care for you</span> -->
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h2 style="color:#013220;font-weight:bold;">Booking Request Sent!</h2>
                                    <div class="line-dec"></div><br>
                                   Your request has been sent. Please wait for our response as you will recieve a call or text from us soon. If any other queries, feel free to contact us.
                                </div>
                            </div>
                    </div>
                </center>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>

    
    <script>
        $('#vanish').fadeOut(15000);

    </script>
@endsection

