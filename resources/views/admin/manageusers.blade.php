@extends('layout.apps')

@section('content')
   
    <div class="admin-page">
        <div class="admin-page-wrapper">

            @include('admin.sidebar')

            <div class="admin-sidebar-menu-toggler">
                <span></span>
                <span></span>
                <span></span>
            </div>


            <div class="admin-page-main">
                <div class="admin-page-right manage-users-page">
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger alert-dismissible fade show" id="vanish" role="alert">
                            <strong>Validation Error:</strong>
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)

                                    <li>{{ ucfirst($error) }}</li>

                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>

                    @endif
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" id="vanish" role="alert">
                           {{session()->get('message')}}
                       <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                   @elseif(session()->has('error'))
                       <div class="alert alert-danger" role="alert">{{session()->get('error')}} </div>
                   @endif
                    <h3>Manage Users</h3>

                    <div class="manage-users-section">
                        <div class="manage-users-main-box">
                            <div class="title-row">
                                <span>User Names</span>
                                <div class="settings-title">
                                    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 

                                    <span>Active</span>
                                    <span>Inactive</span>
                                    <span>User Type</span>
                                    <span>Delete</span>
                                </div>
                            </div>

                            <div class="manage-users-blue-line"></div>
                            @foreach ($users as $user)

                                <form method="POST" action="{{ route('user.store', $user->id) }}" data-parsley-validate="">
                                    @csrf
                                    <div class="manage-user-box">
                                        <div class="user-name">
                                            <span>{{ $user->name }}</span>
                                        </div>

                                        <div class="user-settings">
                                            <input class="settings-part" type="radio" name="activeness" id="1" value="1"
                                                {{ $user->status == '1' ? 'checked' : '' }} onchange="this.form.submit()" required="" >
                                            <input class="settings-part red" type="radio" name="activeness" id="0" value="0"
                                                {{ $user->status == '0' ? 'checked' : '' }} onchange="this.form.submit()">

                                            @if (is_null($user->model_has_roles))
                                                <select class="settings-part select-user-type" name="usertype" id="usertype"
                                                    onchange="this.form.submit()" required>
                                                    <option value="">-Choose One-</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select class="settings-part select-user-type" name="usertype" id="usertype"
                                                    onchange="this.form.submit()" required="">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}"
                                                            {{ !is_null($user->model_has_roles) ? ($user->model_has_roles->roles->name == $role->name ? 'selected' : '') : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                            <div style="margin-left: 8%;"> 
                                            <span class="edit"><a onclick="return confirm('Are you sure you want to delete this user?')" href="{{ route('user.delete', $user->id) }}"><i class="fa fa-trash-o" style="font-size:48px;color:red"></i></a></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                

                            @endforeach
                            <nav aria-label="Page navigation example" style="margin-top: 2%;">
                                <ul class="pagination justify-content-center">
                                  {{-- <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                  </li> --}}
                                  {{ $users->links() }}
                                  {{-- <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                  </li> --}}
                                </ul>
                            </nav>


                        </div>
                    </div>
                </div>
                <script>
                    $("input:radio").on('click', function() {

                        var $box = $(this);
                        if ($box.is(":checked")) {

                            var group = "input:radio[name='" + $box.attr("name") + "']";

                            $(group).prop("checked", false);
                            $box.prop("checked", true);
                        } else {
                            $box.prop("checked", false);
                        }
                    });

                  
                 $('#vanish').fadeOut(8000);
 

                </script>

            @endsection
