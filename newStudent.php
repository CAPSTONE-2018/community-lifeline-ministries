<?php
include("scripts/header.php");
?>

      <div id="form_wrapper">

          <form class="form-horizontal" action="addStudent.php" method="POST" id="form2">

              <h1>Add Student Information:</h1>
              <br />

              <div class="row">

                  <div class="form-group">
                      <div class="col-lg-6">
                          <label class="control-label" for="firstname">First Name:</label>
                          <input id="firstname" class="form-control" placeholder="First" type="text" name="fname">
                      </div>
                      <div class="col-lg-6">
                          <label class="control-label" for="lastname">Last Name:</label>
                          <input id="lastname" class="form-control" placeholder="Last" type="text" name="lname">
                      </div>
                  </div>
              </div>
              <div class="row">

                  <div class="form-group">
                      <div class="col-lg-6">
                          <label class="control-label" for="middlename">Middle Name:</label>
                          <input id="middlename" class="form-control" placeholder="Middle Name" type="text" name="mname">
                      </div>
                      <div class="col-lg-6">
                          <label class="control-label" for="suffix">Suffix:</label>
                          <input id="suffix" class="form-control" placeholder="Suffix" type="text" name="suffix">
                      </div>
                  </div>
              </div>


              <div class="row">

                  <div class="form-group">
                      <div class="col-lg-4">
                          <label class="control-label" for="dob">Date of Birth:</label>
                          <input id="dob" class="form-control" placeholder="YYYY/MM/DD" type="text" name="dob">
                      </div>
                      <div class="col-lg-4">
                          <label class="control-label" for="ethnic">Ethnicity:</label>
                          <input id="ethnic" class="form-control" placeholder="Ethnicity" type="text" name="ethnicity">
                      </div>
                      <div class="col-lg-4">
                          <label class="control-label" for="gend">Gender:</label>
                              <select id="gend" class="form-control" name="gender">
                                  <option value="M">Male</option>
                                  <option value="F">Female</option>
                              </select>
                      </div>
                  </div>

              </div>

              <div class="row">

                  <div class="form-group">
                      <div class="col-lg-3">
                          <label class="control-label" for="saddress">Address:</label>
                          <input id="saddress" class="form-control" placeholder="Address" type="text" name="address">
                      </div>
                      <div class="col-lg-3">
                          <label class="control-label" for="scity">City:</label>
                          <input id="scity" class="form-control" placeholder="City" type="text" name="city">
                      </div>
                      <div class="col-lg-3">
                          <!--<label class="control-label" for="sstate">State:</label>
                          <input id="sstate" class="form-control" placeholder="State" type="text" name="state">-->
                          <label class="control-label" for="state">State:</label>
                          <?php
                          include("scripts/states.php");
                          echo stateDropdown()
                          ?>

                      </div>
                      <div class="col-lg-3">
                          <label class="control-label" for="szip">Zip Code:</label>
                          <input id="szip" class="form-control" placeholder="Zip Code" type="text" name="zip">
                      </div>
                  </div>


              </div>

              <div class="row">

                  <div class="form-group">

                      <div class="col-lg-8">
                          <label class="control-label" for="sschool">School:</label>
                          <input id="sschool" class="form-control" placeholder="School" type="text" name="school">
                      </div>

                      <div class="col-lg-4">
                          <label class="control-label" for="sprogramname">Program Name:</label>
                          <select id="sprogramname" class="form-control" name="program">
                              <option value="G.E.M.S">G.E.M.S</option>
                              <option value="Sons of Thunder">Sons of Thunder</option>
                              <option value="Both">Both</option>
                          </select>
                      </div>
                  </div>
              </div>

              <div class="row">

                  <div class="form-group">

                      <div class="col-lg-3">
                          <label class="control-label" for="spermission">Permission Slip on File:</label>
                          <select id="spermission" class="form-control" name="permission_slip">
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                          </select>
                      </div>

                      <div class="col-lg-3">
                          <label class="control-label" for="sbirthcert">Birth Certificate on File:</label>
                          <select id="sbirthcert" class="form-control" name="birth_certificate">
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                          </select>
                      </div>


                      <div class="col-lg-3">
                          <label class="control-label" for="sreducedlunch">Reduced Lunch Eligible:</label>
                          <select id="sreducedlunch" class="form-control" name="reduced_lunch_eligible">
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                          </select>
                      </div>

                      <div class="col-lg-3">
                          <label class="control-label" for="siep">Immediate Emotional Problem:</label>
                          <select id="siep" class="form-control" name="iep">
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                          </select>
                      </div>

                  </div>

              </div>

              <br />

              <h1>Allergies:</h1>
              <br />

              <div class="row">

                  <div class="form-group">

                      <div class="col-lg-3">
                          <label class="control-label" for="satype">Type:</label>
                          <input id="satype" class="form-control" placeholder="Allergy Type" type="text" name="atype">
                      </div>
                      <div class="col-lg-9">
                          <label class="control-label" for="sanote">Note:</label>
                          <input id="sanote" class="form-control" placeholder="Allergy Note" type="text" name="anote">
                      </div>

                  </div>
              </div>

              <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit"><br><br>

          </form>

      </div>

  </div>
  <?php
  include("scripts/footer.php");
  ?>
