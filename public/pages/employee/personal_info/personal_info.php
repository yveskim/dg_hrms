
<style>
    .card-header{
        color: white;
    }
</style>
<div class="card card-basic-info ">
    <form id="edit-basic-form"></form>
    <div class="card-header p-2 bg-secondary">
        <div class="row">
            <div class="col-lg-8">
                <h5>I. Personal Information</h5>
            </div>
            <button class="col-md-2 btn btn-light full-size btn-sm fs-1" id="btn-cancel-basic" type="button" >Cancel</button>
            <div class="col-lg-2 float-right">
                <button class="btn btn-info full-size btn-sm fs-1" id="btn-edit-basic-info" type="button"  form="edit-basic-form">Edit Content</button>
                <button class="btn btn-warning full-size btn-sm fs-1" id="btn-update-basic-info" type="submit"  form="edit-basic-form">Apply Changes</button>
            </div>
        </div>  <!-- eor -->
    </div>
    <div class="card-body ">
        <div class="row">
            <div class="col-lg-4">
                 <div class="form-group row">
                    <label for="inputFirstName" class="col-sm-4 col-form-label">First Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputFirstName" name="inputFirstName" readonly="true" form="edit-basic-form">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputMiddleName" class="col-sm-4 col-form-label">Middle Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputMiddleName" name="inputMiddleName" readonly="true" form="edit-basic-form">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputLastName" class="col-sm-4 col-form-label">Last Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputLastName" name="inputLastName" readonly="true" form="edit-basic-form">
                    </div>
                </div>
            </div>
        </div>  <!-- eor -->


        <div class="row">
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputGender" class="col-sm-4 col-form-label">Gender:</label>
                    <div class="col-sm-8">
                        <select disabled="true" class="input-minimal-disabled full-size form-select" id="inputGender" name="inputGender" form="edit-basic-form" readonly="true">
                            <option value="">-</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputBirthdate" class="col-sm-4 col-form-label">Birth Date:</label>
                    <div class="col-sm-8">
                        <input type="date" class="input-minimal-disabled full-size" id="inputBirthdate" name="inputBirthdate" readonly="true" form="edit-basic-form">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputBirthplace" class="col-sm-4 col-form-label">Birth Place:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputBirthplace" name="inputBirthplace" readonly="true" form="edit-basic-form">
                    </div>
                </div>
            </div>
         
        </div>  <!-- eor -->

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputMaritalStatus" class="col-sm-4 col-form-label">Marital Status:</label>
                    <div class="col-sm-8">
                         <select disabled="true" class="input-minimal-disabled full-size form-select" id="inputMaritalStatus" name="inputMaritalStatus" form="edit-basic-form" readonly="true">
                            <option value="">-</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widow">Widow</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Seperated">Seperated</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputCitizenship" class="col-sm-4 col-form-label">Citizenship:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputCitizenship" name="inputCitizenship" readonly="true" form="edit-basic-form">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputCitizenBy" class="col-sm-4 col-form-label">Citizen By:</label>
                    <div class="col-sm-8">
                        <select disabled="true" class="input-minimal-disabled full-size form-select" id="inputCitizenBy" name="inputCitizenBy" form="edit-basic-form" readonly="true">
                            <option value="">-</option>
                            <option value="Single">Birth</option>
                            <option value="Married">Naturalization</option>
                        </select>
                    </div>
                </div>
            </div>

            
        </div>  <!-- eor -->

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputCountry" class="col-sm-4 col-form-label">Country:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputCountry" name="inputCountry" readonly="true" form="edit-basic-form">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputReligion" class="col-sm-4 col-form-label">Religion:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputReligion" name="inputReligion" readonly="true" form="edit-basic-form">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputBloodType" class="col-sm-4 col-form-label">Blood Type:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputBloodType" name="inputBloodType" readonly="true" form="edit-basic-form">
                    </div>
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputHeight" class="col-sm-4 col-form-label">Height:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputHeight" name="inputHeight" readonly="true" form="edit-basic-form" placeholder="cm">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group row">
                    <label for="inputWeight" class="col-sm-4 col-form-label">Weight:</label>
                    <div class="col-sm-8">
                        <input type="text" class="input-minimal-disabled full-size" id="inputWeight" name="inputWeight" readonly="true" form="edit-basic-form" placeholder="kg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="bg-primary">


<div class="row">
    <div class="col-lg-6">
        <div class="card card-other">
            <form id="other-form"></form>
            <div class="card-header p-2 bg-secondary">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Other Info</h5>
                    </div>
                    <button class="col-md-2 btn btn-light full-size btn-sm fs-1" id="btn-cancel-other" type="button" >Cancel</button>
                    <div class="col-lg-4 float-right">
                        <button class="btn btn-info full-size btn-sm fs-1" id="btn-edit-other" type="button" name="button" form="other-form">Edit Content</button>
                        <button class="btn btn-warning full-size btn-sm fs-1" id="btn-update-other" type="submit" name="button" form="other-form">Apply Changes</button>
                    </div>
                </div>  <!-- eor -->
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputTin" class="col-lg-3 col-form-label">TIN:</label>
                            <div class="col-lg-9">
                                <input type="text" class="input-minimal-disabled full-size" id="inputTin" name="inputTin" readonly="true" form="other-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputSss" class="col-lg-3 col-form-label">SSS:</label>
                            <div class="col-lg-9">
                                <input type="text" class="input-minimal-disabled full-size" id="inputSss" name="inputSss" readonly="true" form="other-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputGsis" class="col-lg-3 col-form-label">GSIS:</label>
                            <div class="col-lg-9">
                                <input type="text" class="input-minimal-disabled full-size" id="inputGsis" name="inputGsis" readonly="true" form="other-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputPagibig" class="col-lg-3 col-form-label">Pagibig:</label>
                            <div class="col-lg-9">
                                <input type="text" class="input-minimal-disabled full-size" id="inputPagibig" name="inputPagibig" readonly="true" form="other-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputPhilhealth" class="col-lg-3 col-form-label">Philhealth:</label>
                            <div class="col-lg-9">
                                <input type="text" class="input-minimal-disabled full-size" id="inputPhilhealth" name="inputPhilhealth" readonly="true" form="other-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputAgency" class="col-lg-3 col-form-label">Deped ID:</label>
                            <div class="col-lg-9">
                                <input type="text" class="input-minimal-disabled full-size" id="inputAgency" name="inputAgency" readonly="true" form="other-form">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of left col-->
    <div class="col-lg-6">
        <div class="card card-contact-info">
            <form id="contact-info-form"></form>
            <div class="card-header p-2 bg-secondary">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Contact Info</h5>
                    </div>
                    <button class="col-md-2 btn btn-light full-size btn-sm fs-1" id="btn-cancel-contact" type="button" >Cancel</button>
                    <div class="col-lg-4 float-right">
                        <button class="btn btn-info full-size btn-sm fs-1" id="btn-edit-contact-info" type="button" name="button" form="contact-info-form">Edit Content</button>
                        <button class="btn btn-warning full-size btn-sm fs-1" id="btn-update-contact-info" type="submit" name="button" form="contact-info-form">Apply Changes</button>
                    </div>
                </div>  <!-- eor -->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputEmail" class="col-lg-3 col-form-label">Email Address:</label>
                            <div class="col-lg-9">
                                <input type="email" class="input-minimal-disabled full-size full-size" id="inputEmail" name="inputEmail" readonly="true" form="contact-info-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="_phone" class="col-lg-3 col-form-label">Phone No.:</label>
                            <div class="col-lg-9">
                                <input type="text" class="input-minimal-disabled full-size" id="_phone" name="phone" readonly="true" form="contact-info-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="tel_no" class="col-lg-3 col-form-label">Tel No.:</label>
                            <div class="col-lg-9">
                                <input type="text" class="input-minimal-disabled full-size" id="tel_no" name="tel_no" readonly="true" form="contact-info-form">
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div><!-- end of right col-->
    </div>
</div>
<hr class="bg-primary">

<div class="row">
    <div class="col-lg-6">
        <div class="card card-permanent-address">
            <form id="permanent-address-form"></form>
            <div class="card-header p-2 bg-secondary">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Permanent Address</h5>
                    </div>
                    <button class="col-md-2 btn btn-light full-size btn-sm fs-1" id="btn-cancel-per" type="button" >Cancel</button>
                    <div class="col-lg-4 float-right">
                        <button class="btn btn-info full-size btn-sm fs-1" id="btn-edit-permanent-address" type="button" name="button" form="permanent-address-form">Edit Content</button>
                        <button class="btn btn-warning full-size btn-sm fs-1" id="btn-update-permanent-address" type="submit" name="button" form="permanent-address-form">Apply Changes</button>
                    </div>
                </div>  <!-- eor -->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputPerHouse" class="col-sm-4 col-form-label">House/Block/Lot No.:</label>
                            <div class="col-sm-8">
                               <input type="text" class="input-minimal-disabled full-size full-size" id="inputPerHouse" name="inputPerHouse" readonly="true" form="permanent-address-form" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputPerStreet" class="col-sm-4 col-form-label">Street:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputPerStreet" name="inputPerStreet" readonly="true" form="permanent-address-form" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputPerSubdivision" class="col-sm-4 col-form-label">Subdivision/Village:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputPerSubdivision" name="inputPerSubdivision" readonly="true" form="permanent-address-form" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">  
                        <div class="form-group row">
                            <label for="inputPerBarangay" class="col-sm-4 col-form-label">Barangay:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputPerBarangay" name="inputPerBarangay" readonly="true" form="permanent-address-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">  
                        <div class="form-group row">
                            <label for="inputPerMunicipality" class="col-sm-4 col-form-label">Municipality:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputPerMunicipality" name="inputPerMunicipality" readonly="true" form="permanent-address-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">  
                        <div class="form-group row">
                            <label for="inputPerCity" class="col-sm-4 col-form-label">City:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputPerCity" name="inputPerCity" readonly="true" form="permanent-address-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputPerProvince" class="col-sm-4 col-form-label">Province:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputPerProvince" name="inputPerProvince" readonly="true" form="permanent-address-form">
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputPerZip" class="col-sm-4 col-form-label">Zip Code:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputPerZip" name="inputPerZip" readonly="true" form="permanent-address-form">
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-current-address">
            <form id="current-address-form"></form>
            <div class="card-header p-2 bg-secondary">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Current Address</h5>
                    </div>
                    <button class="col-md-2 btn btn-light full-size btn-sm fs-1" id="btn-cancel-cur" type="button" >Cancel</button>
                    <div class="col-lg-4 float-right">
                        <button class="btn btn-info full-size btn-sm fs-1" id="btn-edit-current-address" type="button" name="button" form="current-address-form">Edit Content</button>
                        <button class="btn btn-warning full-size btn-sm fs-1" id="btn-update-current-address" type="submit" name="button" form="current-address-form">Apply Changes</button>
                    </div>
                </div>  <!-- eor -->
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputCurHouse" class="col-sm-4 col-form-label">House/Block/Lot No.:</label>
                            <div class="col-sm-8">
                               <input type="text" class="input-minimal-disabled full-size full-size" id="inputCurHouse" name="inputCurHouse" readonly="true" form="current-address-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputCurStreet" class="col-sm-4 col-form-label">Street:</label>
                            <div class="col-sm-8">
                               <input type="text" class="input-minimal-disabled full-size full-size" id="inputCurStreet" name="inputCurStreet" readonly="true" form="current-address-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputCurSubdivision" class="col-sm-4 col-form-label">Subdivision:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputCurSubdivision" name="inputCurSubdivision" readonly="true" form="current-address-form">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12"> 
                        <div class="form-group row">
                            <label for="inputCurBarangay" class="col-sm-4 col-form-label">Barangay:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputCurBarangay" name="inputCurBarangay" readonly="true" form="current-address-form">
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputCurMunicipality" class="col-sm-4 col-form-label">Municipality:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputCurMunicipality" name="inputCurMunicipality" readonly="true" form="current-address-form">
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputCurCity" class="col-sm-4 col-form-label">City:</label>
                            <div class="col-sm-8">
                               <input type="text" class="input-minimal-disabled full-size full-size" id="inputCurCity" name="inputCurCity" readonly="true" form="current-address-form">
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="inputCurProvince" class="col-sm-4 col-form-label">Province:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputCurProvince" name="inputCurProvince" readonly="true" form="current-address-form">
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-12">  
                        <div class="form-group row">
                            <label for="inputCurZip" class="col-sm-4 col-form-label">Zip Code:</label>
                            <div class="col-sm-8">
                                <input type="text" class="input-minimal-disabled full-size full-size" id="inputCurZip" name="inputCurZip" readonly="true" form="current-address-form">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="pages/employee/personal_info/personal_info.js"></script>