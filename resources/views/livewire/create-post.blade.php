<div class="card">
    <div class="card-header">
        add new post
    </div>
    <div class="card-body">
        <form class="my-3" wire:submit="store">
            <div class="col-sm-10">
                <div class="form-floating mb-3">
                  <input type="texxt" class="form-control" name='post_title' wire:model='post_title' id="floatingInput" placeholder="Title">
                  <label for="floatingInput">Post Title</label>
                </div>

                @error('post_title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="col-sm-10">
                <div class="form-floating mb-3">
                  <textarea class="form-control" name='content' wire:model='content' placeholder="Post description" id="floatingTextarea" style="height: 100px;"></textarea>
                  <label for="floatingTextarea">Description</label>
                </div>

                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-10">
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" placeholder="post details" wire:model="photo" id="">
                    <label for="floatingInput">Your post image</label>
                </div>
                @error('photo')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-sm-10">
                </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/user/home" wire:navigate class="btn btn-secondary">cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
