 <div class="single-comment justify-content-between d-flex" id="listcomment">
    <div class="user justify-content-between d-flex">
        <div class="thumb">
            <img src="{{ asset('images/' . $data['image']) }}" alt="">
        </div>
        <div class="desc">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <h5>
                        <a href="#">{{ $data['username'] }}</a>
                    </h5>
                    <p class="date">{{ $data['created_at'] }}</p>
                </div>
            </div>
            <p class="comment">
                {{ $data['content'] }}
            </p>
        </div>
    </div>
</div>
