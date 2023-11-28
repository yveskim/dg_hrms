<div class="card">
    <div class="card-header">
        <h4>Plantilla List</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 nbc-content-div">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm full-size fs-1" data-toggle="modal" data-target="#modalAddPlantilla"><i class="fa fa-plus"></i>&nbsp;Add Plantilla Item</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10">
                                <table class="table table-bordered table-hover table-plantilla table-sm full-size" style=" white-space: nowrap;">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>-</th>
                                            <th>Action</th>
                                            <th>Plantilla Item No.</th>
                                            <th>Postion/Title</th>
                                            <th>SG</th>
                                            <th>Date Recieved</th>
                                            <th>Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="modal fade mb-4" id="modalAddPlantilla">
                        <div class="modal-dialog modal-md  modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-primary">
                            <h4 class="modal-title">Plantilla <span class="form-type text-warning"></span></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body" >
                            <!-- ----------------------------- -->
                            <form id="plantillaForm">
                                <div class="row mb-2">
                                    <input type="hidden" value="0" name="is_edit" id="is_edit">
                                    <input type="hidden" name="plantilla_id" id="plantilla_id">
                                    <div class="col-md-6 mb-2">
                                        <label for="plantilla_item_no" class="form-label">Plantilla Item No.</label>
                                        <input type="text" class="form-control form-control-sm" id="plantilla_item_no" name="plantilla_item_no" form="plantillaForm">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="position_title" class="form-label">Position/Title</label>
                                        <input type="text" class="form-control form-control-sm" id="position_title" name="position_title" form="plantillaForm">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 mb-2">
                                        <label for="salary_grade" class="form-label">Salary Grade</label>
                                        <select class="form-control form-control-sm" name="salary_grade" id="salary_grade" form="plantillaForm">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="date_recieved" class="form-label">Date Recieved</label>
                                        <input type="date" class="form-control form-control-sm" id="date_recieved" name="date_recieved" form="plantillaForm">
                                    </div>
                                </div>
                            
                                <hr class="bg-success">
                                <br>
                                <div class="row mb-2">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success full-size" form="plantillaForm">SAVE/UPDATE</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="pages/platilla/plantilla_list.js"></script>