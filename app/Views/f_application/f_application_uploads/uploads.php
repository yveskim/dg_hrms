
<style>
  .thumbnail-div{
    background-color: rgb(30, 30, 30, .8);
    padding: 2%;
    border-radius: 2em;
    min-height: 40em;
  }

  .thumbnail-div img{
    display: flex;
    flex-wrap: wrap;
    height: 11em;
    width: 100%;
    object-fit: cover;
  }

  .title-div{
    text-align: center;
  }

  .btn-xs{
    padding: .2em;
    width: 40%;
    margin-top: .2em;
    margin-left: .4em;
    font-size: 1vw;
  }


  .file-title{
    line-height: 1.5em;
    height: 3em;
    text-overflow: ellipsis;
    overflow: hidden;
    width: 100%;
    padding-left: 2em;
  }

  .file-title:hover{
    position: relative;
    overflow-y: scroll;
  }

  .img-div{
    background-color: white;
    padding: .2em;
    border-radius: 1em;

  }

  hr{
    padding: 0;
    margin: 0;
    top: 0;
  }

  .prev_image{
    height: 100%;
    width: 100%;
    object-fit: contain;
  }

  .image-div{

  }

</style>



<form action="deleteUpload" method="post" id="form-delete"></form>
<div class="content">

  <div class="row title-div">
    <div class="col-md-12">
      <h1>Uploaded Files</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <button type="file" class="btn btn-info btn-sm" name="button" data-toggle="modal" data-target="#uploadModal">Upload New File</button>
    </div>
  </div>

  <div class="row thumbnail-div">
    <?php foreach ($files as $file): ?>
      <div class="col-md-2">
        <div class="img-div">
          <img src="upload/student_files/admission_files/<?= $file['filename']; ?>" alt="student files" class="img-thumbnail rounded">
          <div class="row file-title">
            <p><?= $file['filename']; ?></p>
          </div>
          <hr>
          <button type="button" class="btn btn-primary btn-xs btn-preview" name="button" data-toggle="modal" data-target="#modalPreview" value="<?= $file['filename']; ?>">Preview</button>
          <button type="submit" value="<?= $file['filename']; ?>" class="btn btn-danger btn-xs" name="filename" form="form-delete" onclick="return confirm('Are you sure you want to delete this file?');">delete</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>


<!-- Modal Upload -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Your files inside the box is automatically uploaded to the server.</p>
        <form action="addFile" method="post" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
          <input type="hidden" name="adm_id_upload" id="admId" value="<?php echo $admission_id; ?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" style="width: 100%;">Done</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Preview-->
<div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="modalPreviewTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="image-div">
          <img class="prev_image" class="img-fluid" alt="selected file">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    refreshPageAfterCloseModal();
    $('.btn-preview').click(function(){
        var filename = $(this).val();
        $(".prev_image").attr("src", "upload/student_files/admission_files/"+filename);
    });
  });



  Dropzone.options.myAwesomeDropzone = { // camelized version of the `id`
   paramName: "file", // The name that will be used to transfer the file
   maxFilesize: 5, // MB
   acceptedFiles: ".jpeg,.jpg,.png,.gif",
   addRemoveLinks: true,
   init: function(){
      this.on("sending", function(file, xhr, formData) {
          file.myCustomName = $.now() + file.name;
          //formData.append("filesize", file.size);
          formData.append("fileName", file.myCustomName);
        //  console.log(file.myCustomName);
      });
   },
   success: function(file, data){
    //  existingFile = file.name;
    //  console.log(file.myCustomName);
   },
   removedfile: function(file) {
     var name = file.myCustomName;
    //console.log(name);
  //  console.log(rname);
      $.ajax({
        type: 'POST',
        url: 'deleteDropzone',
        data: {filename:name},
        success: function(res, data){
           //console.log(data);
           //alert('ok');


        }
      });
      var _ref;
       return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;//allows the dropzone to refresh after deleting.. i dont know how the code works but it worked so nevermind it.
    }

 };

 function refreshPageAfterCloseModal(){
   $('#uploadModal').on('hidden.bs.modal', function () {
      // refresh current page
      location.reload();
    });
 }
</script>
