<style>
    .data-content{
        margin-bottom: 5%;
    }
</style>
<br>
<div class="row bg-secondary" style="color: white; padding-top: .4rem;">
    <div class="col-md-12">
        <h2>DOCUMENTS</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <br>
        <p>The webserver that houses all files uploaded to <strong>my.iloilonhs.edu.ph</strong> should not be used as an archive for files. 
            The admins might remove outdated files when memory space is needed. The website and institution will not be liable for any uploaded files by the stakeholders. 
        </p>
        <br>
        <p>Please upload the following documents required for admission assessments.</p>
        <ol>
            <li>Scanned image of your PSA/NSO Birth Certificate in .jpg/.jpeg/.png format only.</li>
            <li>Scanned image of your School Form 9 (Card) front and back in .jpg/.jpeg/.png format only.</li>
            <li>Scanned image of Good Moral Certificate if available. In .jpg/.jpeg/.png format only.</li>
        </ol>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAddFiles" id="btn_add_files" style="width:100%;">
            <i class="bi bi-plus-square"></i>   Upload File
        </button>
    </div>
</div>
<hr>
<div class="row data-content" style="padding: 2rem;">

</div>



<!-- The Modal -->
<div class="modal fade mb-4" id="modalAddFiles">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Upload Files</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" id="document_form"></form>
                <div class="row">
                    <div class="col-md-12">
                        <h6>PLEASE READ!</h6>
                        <p>PLEASE FOLLOW THE INSTRUCTIONS ON THE PROPER UPLOADING OF FILES:</p>
                        <p><i>Any Files that dont follow the proper format and requirements will be suject for deletion by the admin. </i></p>
                        <ol>
                            <li>The file must be in image form with a type of the following (.png, .jpg, .jpeg) only. Other format may not work properly.</li>
                            <li>The image must be clear and readable.</li>
                            <li>The image must be in good quality and not blury.</li>
                            <li>Do not upload any unecessary files for it will be deleted by the admin.</li>
                            <li>Upload files one at a time.</li>
                        </ol>
                        <hr style="border: 2px solid gray; background-color: gray;">
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="row" style="margin-left: 1.5rem;">
                            <div class="col-md-12">
                                <p>Make sure that you can see the file in the box. If not, change the format.</p>
                                <div style="width: 35rem; height: 20rem; box-shadow: 2px 2px 4px 1px gray; border: 3px solid gray;">
                                    <!-- <img src="upload/system_file/noimage.png" alt="chosen image" id="chosen-file" style="width: 100%; height: 100%; object-fit: cover"> -->
                                    <iframe src="upload/system_file/noimage.png" id="chosen-file" frameborder="0" style="width: 100%; height: 100%; object-fit: fill"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Browse Image</label>
                        <input type="file" class="form-control" id="post_document" name="post_document" form="document_form">
                    </div>
                </div>
                <hr>

                <div class="row mb-4">
                    <div class="col-md-12" style="padding: 0 15% 5% 15%;">
                        <button class="btn btn-primary" type="submit" style="width: 100%;" form="document_form">Upload</button>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('#document_form').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let applicant_id = $('#applicant_id').val();
            formData.append('applicant_id', applicant_id);

            $.ajax({
                url: 'postApplicantDocument',
                method: 'post',
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {

                },
                complete: function() {
                    $('#modalAddFiles').modal('toggle');
                    $('.modal-backdrop').remove();
                    $("#chosen-file").attr("src", "upload/system_file/noimage.png");
                    getDocuments();
                },
                success: function(res) {

                    if (res.status == 1) {
                        
                        console.log(res.message);
                    } else {
                        console.log(res.message)
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
            
        })

        $('#modalAddFiles').on('hide.bs.modal', function(){
            $("#chosen-file").attr("src", "upload/system_file/noimage.png");
        })


        $('#post_document').change(function(){
                readURL(this);
            })
            
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#chosen-file').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

        
    


    })
</script>