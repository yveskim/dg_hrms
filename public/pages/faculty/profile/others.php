

<div class="row">
    <div class="card col-md-9">
        <div class="card-header bg-secondary">
            <h4>Other Information</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form id="othersForm"></form>
                <div class="">
                    <ol>
                        <li>
                            <div class="form-group row">
                                <p class="col-md-12">    
                                    Are you related by consanguinity or affinity to the appointing or recommending authority, or to the			
                                    chief of bureau or office or to the person who has immediate supervision over you in the Office, 			
                                    Bureau or Department where you will be apppointed,			
                                </p>
                                <h6 class="col-md-7 mb-2">
                                    a. within the third degree?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="_consanguinity_3rd" id="_consanguinity_3rd" class="form-control form-control-sm bg-info" form="othersForm" required>
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="_consanguinity_3rd_details" id="_consanguinity_3rd_details" class="form-control form-control-sm" placeholder="if yes, give details" form="othersForm">
                                </div>
                                 <h6 class="col-md-7 mb-2">
                                    b. within the fourth degree (for Local Government Unit - Career Employees)?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="_consanguinity_4th" id="_consanguinity_4th" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="_consanguinity_4th_details" id="_consanguinity_4th_details" class="form-control form-control-sm" placeholder="if yes, give details" form="othersForm">
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="form-group row">
                                <h6 class="col-md-7 mb-2">
                                    Have you ever been found guilty of any administrative offense?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="admin_offense" id="admin_offense" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="admin_offense_details" id="admin_offense_details" class="form-control form-control-sm" placeholder="if yes, give details" form="othersForm">
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="form-group row">
                                <h6 class="col-md-5 mb-2">
                                    Have you been criminally charged before any court?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="criminal_charge" id="criminal_charge" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <input type="text" name="criminal_charge_date" id="criminal_charge_date" class="form-control form-control-sm" placeholder="date filed" form="othersForm">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="criminal_charge_details" id="criminal_charge_details" class="form-control form-control-sm" placeholder="status of case" form="othersForm">
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="form-group row">
                                <h6 class="col-md-7 mb-2">
                                    Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="_convicted" id="_convicted" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="_convicted_details" id="_convicted_details" class="form-control form-control-sm" placeholder="if yes, give details" form="othersForm">
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="form-group row">
                                <h6 class="col-md-7 mb-2">
                                    Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="_separated" id="_separated" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="_separated_details" id="_separated_details" class="form-control form-control-sm" placeholder="if yes, give details" form="othersForm">
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="form-group row">
                                <h6 class="col-md-7 mb-2">
                                    Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="_candidate" id="_candidate" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="_candidate_details" id="_candidate_details" class="form-control form-control-sm" placeholder="if yes, give details" form="othersForm">
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="form-group row">
                                <h6 class="col-md-7 mb-2">
                                    Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="_resigned" id="_resigned" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="_resigned_details" id="_resigned_details" class="form-control form-control-sm" placeholder="if yes, give details" form="othersForm">
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="form-group row">
                                <h6 class="col-md-7 mb-2">
                                    Have you acquired the status of an immigrant or permanent resident of another country?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="_immigrant" id="_immigrant" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="_immigrant_details" id="_immigrant_details" class="form-control form-control-sm" placeholder="if yes, give details (country)" form="othersForm">
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li>
                            <div class="form-group row">
                                <p class="col-md-12">
                                    Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                                </p>
                                <h6 class="col-md-7 mb-2">
                                    a. Are you a member of any indigenous group?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="_indigenous" id="_indigenous" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="_indigenous_details" id="_indigenous_details" class="form-control form-control-sm" placeholder="if yes, give specify" form="othersForm">
                                </div>
                                <h6 class="col-md-7 mb-2">
                                    b. Are you a person with disability?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="_disability" id="_disability" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="_disability_details" id="_disability_details" class="form-control form-control-sm" placeholder="if yes, give specify (ID No.)" form="othersForm">
                                </div>
                                <h6 class="col-md-7 mb-2">
                                   c. Are you a solo parent?
                                </h6>
                                <div class="col-md-2 mb-2">
                                    <select required name="solo_parent" id="solo_parent" class="form-control form-control-sm bg-info" form="othersForm">
                                        <option></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input type="text" name="solo_parent_details" id="solo_parent_details" class="form-control form-control-sm" placeholder="if yes, give specify (ID No.)" form="othersForm">
                                </div>
                                
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <hr class="bg-success">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <button class="btn btn-secondary full-size" style="float: right; height: 120%; font-size: 1.2rem;" id="cancelOthersForm">CANCEL</button>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-warning full-size" style="float: right; height: 120%; font-size: 1.2rem; color: white;" form="othersForm">APPLY CHANGES</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="assets/myCustomJs/others.js"></script>