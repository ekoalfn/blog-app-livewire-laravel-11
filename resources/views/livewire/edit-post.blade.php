<div class="card">
    <div class="card-header">
        Edit Post
    </div>
    <div class="card-body">
        <form class="my-3" wire:submit="update">
            <div class="col-sm-10">
                <div class="form-floating mb-3">
                  <input type="texxt" class="form-control" name='post_title' wire:model='post_title' value="{{$post->post_title}}" id="floatingInput" placeholder="Title">
                  <label for="floatingInput">Post Title</label>
                </div>

                @error('post_title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="col-sm-10">
                <div class="form-floating mb-3">
                    <input type="texxt" class="form-control" name='content' wire:model='content' value="{{$post->content}}" id="floatingInput" placeholder="Description">
                    <label for="floatingTextarea">Description</label>
                </div>

                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-10">
                <label for="">post image</label>
                <div class="form-floating mb-3">
                    <img width="80px" src="{{ asset('storage/images/' .$post->photo) }}" alt="post image">
                    <input type="file" class="form-control" placeholder="post details" wire:model="photo" id="">
                </div>
                @error('photo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-sm-10">
                </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/my/posts" wire:navigate class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
