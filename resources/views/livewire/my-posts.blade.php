<div class="card">
    <div class="card-body">
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Posted At</th>
            <th scope="col">Last Update</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr wire:key="{{$item->id}}">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->post_title}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
      </table> 
    </div>
  </div>