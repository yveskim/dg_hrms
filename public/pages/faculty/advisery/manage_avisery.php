<div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 page-title-color">Manage Advisery</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Advisery</a></li>
                        <li class="breadcrumb-item active">Manage Advisery</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="page-content">
    <div class="row">
                    <!-- /.col -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                  <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                      <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#advisory_list" id="advisory_list_tab" data-toggle="tab">Advisory List</a></li>
                        <li class="nav-item"><a class="nav-link" href="#guidance_record" id="guidance_record_tab" data-toggle="tab">Guidance Records</a></li>
                        <li class="nav-item"><a class="nav-link" href="#health_records" id="health_records_tab" data-toggle="tab">Health Records</a></li>
                        <li class="nav-item"><a class="nav-link" href="#school_records" id="school_records_tab" data-toggle="tab">School Records</a></li>
                        <li class="nav-item"><a class="nav-link" href="#attendance_records" id="attendance_records_tab" data-toggle="tab">Attendance Records</a></li>
                        <li class="nav-item"><a class="nav-link" href="#reports" id="reports_tab" data-toggle="tab">Reports</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body" style="min-height: 600px;">
                      <div class="tab-content">

                        <div class="active tab-pane" id="advisory_list">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Box Comment -->
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 >Program/Strand: <span class="solid-text" id="t_program"></h4> 
                                            </div>
                                            <div class="col-md-4"><h4>Grade:<span class="solid-text" id="t_grade_level"></span></h4></div>
                                            <div class="col-md-4"><h4>Section: <span class="solid-text" id="t_section"></span></h4></div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div>
                                            <table id="table_adv" class="table table-bordered table-striped table-sm table-hover text-dark table-compact" style="white-space: nowrap;">
                                                <thead class="">
                                                    <tr>
                                                        <th>Action</th>
                                                        <th></th>
                                                        <th>Stud. ID</th>
                                                        <th>LRN</th>
                                                        <th>Last Name</th>
                                                        <th>First Name</th>
                                                        <th>Middle Name</th>
                                                        <th>Sex</th>
                                                        <th>Birthday</th>
                                                        <th>Phone No.</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot class="">
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>#</th>
                                                        <th>ID</th>
                                                        <th>LRN</th>
                                                        <th>Last Name</th>
                                                        <th>First Name</th>
                                                        <th>Middle Name</th>
                                                        <th>Sex</th>
                                                        <th>Birthday</th>
                                                        <th>Phone No.</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                        
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>


                            <div class="modal fade" id="student_profile_modal">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Student Profile</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="student_modal_body">
                                        
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                    
                                    </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <div class="tab-pane" id="guidance_record"></div>
                         <div class="tab-pane" id="health_records"></div>
                         <div class="tab-pane" id="school_records"></div>
                         <div class="tab-pane" id="attendance_records"></div>
                         <div class="tab-pane" id="reports"></div>

                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>

