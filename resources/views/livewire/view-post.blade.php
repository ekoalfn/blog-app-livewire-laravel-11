<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/images/' . $post->photo) }}" height="200px" alt="Post Image" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->post_title }}</h5>
                        {{ str($post->content)->words(10) }}
                        <a href="/view/post/{{$post->id}}" wire:navigate wire:click="addViewers({{$post->id}})" class="card-link mx-1">read more</a>
                    </p>
                    <div class="row">
                        <div class="col-xl-6"></div>
                        <livewire:like-component :postId="$post->id" />
                    </div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ date('d-m-Y h:i', strtotime($post->created_at)) }}</small>
                </div>
            </div>
        </div>
    @endforeach
</div>
