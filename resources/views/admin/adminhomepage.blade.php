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
                <div class="admin-page-right create-content-page">
                    <h3>Create Content</h3>
                    <div class="create-content-action">
                        <a href="createcontent.php">Create a Video Lecture</a>
                        <div class="d-block d-sm-none">
                            <br>
                        </div>
                        <a class="hollow" href="createpublication.php">Add a Publication</a>
                    </div>

                    <h3>My Contents</h3>

                    <div class="admin-content-box">
                        <div class="content-heading">
                            <h5>Videos</h5>
                        </div>
                        <div class="content-items">
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Bleeding Gum</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>

                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Tuberculosis</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="admin-content-box">
                        <div class="content-heading">
                            <h5>Publications</h5>
                        </div>
                        <div class="content-items">
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Case Study of Covid - 19 Case Increment in Nepal</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Case Study of Covid - 19</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Latest Contents</h3>

                    <div class="admin-content-box">
                        <div class="content-heading latest">
                            <h5>Latest Videos</h5>
                        </div>
                        <div class="content-items">
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Bleeding Gum</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Tuberculosis</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Asthma</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="admin-content-box">
                        <div class="content-heading latest">
                            <h5>Latest Publications</h5>
                        </div>
                        <div class="content-items">
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Case Study of Covid - 19 Case Increment in Nepal</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Case Study of Covid - 19 Case Increment in Nepal</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Case Study of Covid - 19 Case Increment in Nepal</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                            <div class="item-box">
                                <div class="content-title">
                                    <a href="#">Case Study of Covid - 19 Case Increment in Nepal</a>
                                </div>
                                <div class="action-btn">
                                    <span class="edit"><a href="editcontent.php">Edit</a></span>
                                    <span class="delete"><a href="#">Delete</a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="managecontent.php" class="blue-button see-all-contents">See All Contents</a>
                    </div>

                </div>

            </div>

        </div>
    </div>
    @endsection
