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
                    <h3>Manage {{ ucfirst($users->name) }} Publications</h3>

                    <div class="manage-users-section">
                        <div class="manage-users-main-box">
                            <div class="title-row">
                                <span>Publication Name</span>
                                <div class="settings-title">
                                    <span>Publish</span>
                                    <span>Hold</span>
                                </div>
                            </div>

                            <div class="manage-users-blue-line"></div>


                            @foreach ($publications as $pub)

                                <form method="POST" action="{{ route('publish.storepub', $pub->id )}}">
                                    @csrf
                                    <div class="manage-user-box">
                                        <div class="user-name">

                                            <span>{{ $pub->pub_name }}</span>
                                        </div>

                                        <div class="user-settings">
                                            <input class="settings-part" type="radio" name="activeness" id="1" value="1"
                                            {{ $pub->status  == '1' ? 'checked' : '' }} onchange="this.form.submit()">
                                        <input class="settings-part red" type="radio" name="activeness" id="0" value="0"
                                            {{ $pub->status == '0' ? 'checked' : '' }} onchange="this.form.submit()">
                                            </div>
                                        </div>
                                    </form>

                                @endforeach



                            </div>
                        </div>
                    </div>
                    <script>
                        $("input:radio").on('click', function() {
                            
                            var $box = $(this);
                            if ($box.is(":checked")) {
                                // the name of the box is retrieved using the .attr() method
                                // as it is assumed and expected to be immutable
                                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                                // the checked state of the group/box on the other hand will change
                                // and the current value is retrieved using .prop() method
                                $(group).prop("checked", false);
                                $box.prop("checked", true);
                            } else {
                                $box.prop("checked", false);
                            }
                        });

                    </script>

                @endsection





