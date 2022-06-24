<div class="admin-page-sidebar">
    <div class="top-heading-section">
        <div class="admin-image">
            <a href="{{route('doctor.bio')}}"><img src="{{ URL::to('assets') }}/images/icons/admin.svg" alt=""></a>
        </div>
        <div class="admin-panel-title">
            <span>ADMIN PANEL</span>
        </div>
    </div>

    <div class="admin-side-nav">
        <div class="admin-nav-item sidebar ">
            <a href="{{route('admin.index')}}">
                <div class="admin-nav-box">
                    <div class="admin-nav-box-right">
                        <img src="{{ URL::to('assets') }}/images/icons/content.svg" alt="">
                        <span class="admin-nav-link">
                        Dashboard
                        </span>
                    </div>
                    {{-- <img class="admin-nav-arrow" src="{{ URL::to('assets') }}/images/icons/admin-arrow.svg" alt=""> --}}
                </div>
            </a>
        </div>
        @role('superadmin')
          
                <div class="admin-nav-item sidebar ">
                    <a href="{{route('admin.manageusers')}}" style="text-decoration: none;">
                        <div class="admin-nav-box" >
                            <div class="admin-nav-box-right">
                                <img src="{{ URL::to('assets') }}/images/icons/users.svg" alt="">
                                <span class="admin-nav-link">
                                Add New Customer
                                </span>
                            </div>
                            {{-- <img class="admin-nav-arrow" src="{{ URL::to('assets') }}/images/icons/admin-arrow.svg" alt=""> --}}
                        </div>
                    </a>
                </div>
           
        @endrole
        <div class="admin-nav-item sidebar ">
     
            <a href="{{route('doctor_media')}}">
                <div class="admin-nav-box">
                   <div class="admin-nav-box-right">
                        <img src="{{ URL::to('assets') }}/images/icons/maintenance.svg" alt="">
                        <span class="admin-nav-link">
                        Load Existing Customer
                        </span>
                   </div>
                    {{-- <img class="admin-nav-arrow" src="{{ URL::to('assets') }}/images/icons/admin-arrow.svg" alt=""> --}}
                </div>
            </a>
        </div>
    </div>
</div>

