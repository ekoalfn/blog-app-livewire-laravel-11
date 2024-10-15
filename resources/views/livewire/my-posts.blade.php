<div class="card">
    @if (session()->has('message'))
        <span class="alert alert-success p-2 my-2">{{ session('message') }}</span>
    @endif
    <div class="card-body">
        <h5 class="card-title mb-4">My Dashboard</h5>

        <div class="row mb-4" wire:poll>
            <div class="col-md-3 mb-3">
                <div class="card info-card sales-card shadow-sm" style="background-color: #f0f8ff;">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Followers</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #e0f7fa; width: 50px; height: 50px;">
                                <i class="bi bi-people text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="text-primary">145</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card info-card sales-card shadow-sm" style="background-color: #fff0f0;">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Posts</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #ffe5e5; width: 50px; height: 50px;">
                                <i class="bi bi-pencil text-danger"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="text-danger">{{ $post_count }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <livewire:post-data-counter />

            <div class="col-md-3 mb-3">
                <div class="card info-card sales-card shadow-sm" style="background-color: #f0fff0;">
                    <div class="card-body">
                        <h5 class="card-title text-success">Comments</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #e5ffe5; width: 50px; height: 50px;">
                                <i class="bi bi-chat-dots text-success"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="text-success">145</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover datatable">
            <thead style="background-color: #007bff; color: white;">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Content</th>
                    <th scope="col">Posted At</th>
                    <th scope="col">Last Update</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr wire:key="{{ $item->id }}">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->post_title }}</td>
                        <td>
                            <img src="/storage/images/{{ $item->photo }}" alt="post image" class="img-thumbnail" width="60px">
                        </td>
                        <td>{{ str($item->content)->words(10) }}</td>
                        <td>{{ $item->created_at->format('d-m-Y h:i') }}</td>
                        <td>{{ $item->updated_at->format('d-m-Y h:i') }}</td>
                        <td>
                            <a href="/edit/post/{{ $item->id }}" class="btn btn-primary btn-sm">Edit</a>
                            <button wire:click="destroy({{ $item->id }})" wire:confirm="Are you sure you want to delete this post?" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
