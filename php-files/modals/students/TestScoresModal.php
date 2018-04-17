<?php
include("../../../db/config.php");
$dynamicRowId = 0;

$studentId = $_POST['studentId'];

$queryForStudentTestScores = "SELECT * FROM student_test_scores WHERE Student_Id = ".$studentId;
$studentTestResults = mysqli_query($db, $queryForStudentTestScores);

$response = '';

while ($testScoreResults = mysqli_fetch_assoc($studentTestResults)) {
    $testId = $testScoreResults['Id'];
    $schoolYear = $testScoreResults['School_Year'];
    $term = $testScoreResults['Term'];
    $pre_Test = $testScoreResults['Pre_Test'];
    $post_Test = $testScoreResults['Post_Test'];
    $dynamicRowId++;
    $response = '
<div id="currentTest" class="medical-concern-modal">';?>
    <input id="hdnStudentId" style="display:none " value="<?php echo $studentId; ?>" />
<div id="currentTestScores" class="currentTestScores">
    <div class="row form-group">
        <div class="col-2 text-center mt-auto mb-auto">
            <i class="fa fa-bullhorn"></i>
        </div>
        <div class="col-10">
            <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="testId<?php echo $dynamicRowId; ?>" class="mdl-textfield__input testScores" readonly
                       value="<?php echo $testId; ?>"
                       type="text"/>
                <label class="mdl-textfield__label" for="contactName">Test Id</label>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-2 text-center mt-auto mb-auto">
            <i class="fa fa-bullhorn"></i>
        </div>
        <div class="col-10">
            <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="schoolYear<?php echo $dynamicRowId; ?>" class="mdl-textfield__input testScores" readonly
                       value="<?php echo $schoolYear; ?>"
                       type="text"/>
                <label class="mdl-textfield__label" for="contactName">School Year</label>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-2 text-center mt-auto mb-auto">
            <i class="fa fa-pencil-square-o"></i>
        </div>
        <div class="col-10">
            <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="term<?php echo $dynamicRowId; ?>" class="mdl-textfield__input testScores" readonly
                       value="<?php echo $term; ?>"
                       type="text"/>
                <label class="mdl-textfield__label" for="primaryPhone">Term</label>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-2 text-center mt-auto mb-auto">
            <i class="fa fa-comments-o"></i>
        </div>
        <div class="col-10">
            <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="pre_test<?php echo $dynamicRowId; ?>" class="mdl-textfield__input testScores" readonly
                       value="<?php echo $pre_Test; ?>"
                       type="text"/>
                <label class="mdl-textfield__label" for="contactEmail">Pre-Test</label>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-2 text-center mt-auto mb-auto">
            <i class="fa fa-comments-o"></i>
        </div>
        <div class="col-10">
            <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="post_test<?php echo $dynamicRowId; ?>" class="mdl-textfield__input testScores" readonly
                       value="<?php echo $post_Test; ?>"
                       type="text"/>
                <label class="mdl-textfield__label" for="contactEmail">Post-Test</label>
            </div>
        </div>
    </div>
    <hr>
    </div>
    <input id="deleteButton" type="button" class="btn btn-primary pull-right" onclick="DeleteTestScore(<?php echo $testId; ?>)" value="Delete" />
<?php }
$response .= '</div><div id="addTestScore" style="display:none">
        <div class="row form-group" >
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-bullhorn"></i>
            </div>
            <div class="col-10" >
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="newSchoolYear" class="mdl-textfield__input testScores"
                           value=""
                           type="text"/>
                    <label class="mdl-textfield__label" for="contactName">School Year</label>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-pencil-square-o"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="newTerm" class="mdl-textfield__input testScores"
                           value=""
                           type="text"/>
                    <label class="mdl-textfield__label" for="primaryPhone">Term</label>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-comments-o"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="newPre_test" class="mdl-textfield__input testScores" 
                           value=""
                           type="text"/>
                    <label class="mdl-textfield__label" for="contactEmail">Pre-Test</label>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-comments-o"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="newPost_test" class="mdl-textfield__input testScores"
                           value=""
                           type="text"/>
                    <label class="mdl-textfield__label" for="contactEmail">Post-Test</label>
                </div>
            </div>
        </div>
        <input id="addButton" type="button" class="btn btn-primary pull-right" onclick="AddTestScore()" value="Add" />
    </div>    <br />';
$response .= '    <input type="button" class="btn btn-primary pull-right" onclick="EditTestScores()" value="Edit" />';
$response .= '</div>    <input id="updateButton" type="button" class="btn btn-primary pull-right" onclick="UpdateTestScores()" value="Update" style = "margin-right:10px;" disabled="disabled" />';
$response .= '</div>    <input id="addButton" type="button" class="btn btn-primary pull-right" onclick="NewTestScore()" value="New" />';
echo $response;
exit;