

<table style='overflow-x: visiable;' class="table table-striped table-borderless">
  <thead>
    <tr>
      <th>#.</th>
      <th>Notice Title</th>
      <th>Description</th>
      <th>Image</th>
      <th>Upload Time</th>
      <th>Action</th>
    </tr>  
  </thead>
  <tbody>


    @foreach($notices as $key=>$notice)
    

    <tr>
      <td>{{$key+1}}</td>
      <td>{{$notice->notice_title}}</td>
      <td style='width: 100%;'><p>{{$notice->notice_description}}</p></td>
      <td><img style='width: 150px;' src="{{URL::asset("uploads/notice/". $notice->notice_image)}}" alt=""></td>
      <td>{{$notice->created_at}}</td>
      <td>
       {{-- here is the edit modal --}}
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary btn sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop2{{$key}}">
          Edit 
        </button>

        <div class="modal fade editModal" id="staticBackdrop2{{$key}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop2Label" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdrop2Label">Edit Notice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" id="formupdate" method='POST' enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="up_id" value="{{$notice->id}}">
                  <div class="form-group">
                      <label for="up_notice_title">Notice Title:</label>
                      <input type="text" value="{{$notice->notice_title}}" name='up_notice_title' id="up_notice_title" class='form-control mb-3'>
                  </div>
                  <div class="form-group">
                      <label for="up_notice_image">Notice Image:</label>
                      <input type="file" name='up_notice_image' id="up_notice_image" class='form-control mb-3'>
                  </div>
                  <div class="form-group">
                      <label for="up_notice_description">Notice Description:</label>
                      <textarea type="text" name='up_notice_description' id="up_notice_description" class='form-control mb-3'>{{$notice->notice_description}}</textarea>
                  </div>
                 
                  <div class="form-group">
                      <input type="submit" value='Update Notice' class='btn btn-primary btn-sm updateNotice'>
                  </div>
              </form>  
      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        

        <form action="" id="deleteNotice" method='POST'>
          @csrf
          <input type="hidden" name="delete_id" value="{{$notice->id}}">
          <input type="submit" class='btn btn-danger btn-sm' value="Delete">
        </form>
        
      </td>    
    </tr>
    
    @endforeach
  </tbody>
</table>

{{$notices->links()}}

