<div class="admin-content-box">
    <div class="content-heading">
        <h5>Publications</h5>
    </div>
    <div class="content-items">

        @foreach ($publication as $pub)
            <div class="item-box">
                <div class="content-title">
                    <a href="{{route('pub.show',$pub->id)}}">{{$pub->pub_name}}</a>
                </div>
                <div class="action-btn">
                    <span class="edit"><a href="{{route('pub.edit',$pub->id)}}">Edit</a></span>
                    <span class="delete"><a href="{{route('pub.delete',$pub->id)}}">Delete</a></span>
                </div>
            </div>
        @endforeach
    </div>
</div>