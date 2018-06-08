

<div class="modal fade " id="data_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="create-item"  action="{{ route('posts.store') }}" method="POST" >
        @csrf
          <div class="row">
            <div class="col-lg-6 col-sm-6 form-group"><p>Name:</p>
            <input type="text" name="name" class="form-control"></div>

            <div class="col-lg-6 col-sm-6 form-group"><p>Price:</p>
            <input type="text" name="price" class="form-control"></input></div>


            <div class="col-lg-6 col-sm-6 form-group"><p>Description:</p>
            <input type="text" name="description" class="form-control"></input></div>

            
            <div class="col-lg-6 col-sm-6 form-group"><p>Category:</p>
              <input type="text" name="category_id" class="form-control"></input>
            </div>

          </div>
      </div>
      <div class="modal-footer form-group">
          <button id="data_insert" type="submit" class="btn btn-primary">save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-lg" id="data_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="edit-item" >
        @csrf
          <div class="row">

            <div class="col-lg-3 col-sm-3 form-group"><p>ID:</p>
            <input type="text" name="id" class="form-control" readonly></input></div>

            <div class="col-lg-6 col-sm-6 form-group"><p>Name:</p>
            <input type="text" name="name" class="form-control"></div>

            <div class="col-lg-6 col-sm-6 form-group"><p>Price:</p>
            <input type="text" name="price" class="form-control"></input></div>
            
            <div class="col-lg-6 col-sm-6 form-group"><p>Category:</p>
              <input type="text" name="category_id" class="form-control"></input>
            </div>
            <div class="col-lg-12 col-sm-12 form-group md-3"><p>Description:</p>
              <textarea name="description" rows="5" class="form-control" style="height: 10em;"></textarea>
            </div>

          </div>
      </div>
      <div class="modal-footer form-group">
          <button id="edit_submit" type="submit" class="btn btn-primary">save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" id="data_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <div class="row container">
            <table class="table table-hover table-bordered">
            </table>
          </div>
       </div>
      <div class="modal-footer form-group">
          <button id="delete_submit" type="button" class="btn btn-primary">delete</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('#data_insert').on('click', function(event) {
    event.preventDefault();
    var form_action = $("#create-item").attr("action");
    var details = $("#create-item").serialize();
    $.ajax({
      type: 'POST',
      url: form_action,
      data: details,
      dataType: 'json',
      success: function(data){
        console.log(data);
              if(data['msg']='success'){
                $('#data_info').modal('hide');
                alert("dada_insert,successd");
              }
      },
    });
});


$('#edit_submit').on('click', function(event) {
    event.preventDefault();

    var details = $("#edit-item").serialize();
    $.ajax({
      type: 'POST',
      url: "http://localhost/lacrud/public/edit",
      data: details,
      dataType: 'json',
      success: function(data){
        console.log(data);
              if(data['msg']='success'){
                $('#data_edit').modal('hide');
                  alert("dada_edit,successd");
              }
      },
    });
});


$('#delete_submit').on('click', function(event) {

    event.preventDefault();
    var id=$("#data_delete").find('tr:first-child').children('td:last-child').text();
    $.ajax({
      type: 'POST',
      url: "http://localhost/lacrud/public/delete",
      data: {'id':id},
      dataType: 'json',
      success: function(data){
        console.log(data);
              if(data['msg']='success'){
                $('#data_delete').modal('hide');
                  alert("dada_delete,successd");
              }

      },
    });
});

</script>