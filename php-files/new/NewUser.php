<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: index.html");
}
$account = $_SESSION['account'];

if ($account != "administrator") {
    header("Location: index.html");
}
include("../scripts/header.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="../add/AddUser.php" method="POST" id="newUserForm"
                          name="newUserForm">
                        <div class="form-content">
                            <div class="header">Register User For Access</div>

                            <h4 class="heading"><i class="fa fa-key"></i> User Account Info</h4>
                            <div class="blue-line-color"></div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="username" class="mdl-textfield__input"
                                               name="username" type="text"/>
                                        <label class="mdl-textfield__label" for="username">Username</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="password" class="mdl-textfield__input" name="password"
                                               type="text"/>
                                        <label class="mdl-textfield__label" for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                        <input type="text" class="mdl-textfield__input" id="account" readonly>
                                        <input type="hidden" name="account">
                                        <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                                        <label for="account" class="mdl-textfield__label">Account Type</label>
                                        <ul for="account" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                            <li class="mdl-menu__item" data-val="administrator">Administrator</li>
                                            <li class="mdl-menu__item" data-val="employee">Employee</li>
                                            <li class="mdl-menu__item" data-val="volunteer">Volunteer</li>
                                            <li class="mdl-menu__item" data-val="report_user">Report User</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="email" class="mdl-textfield__input" name="email"
                                               type="text" pattern="^(?!\.).+@.+\..{2,5}$"/>
                                        <label class="mdl-textfield__label" for="email">Email</label>
                                        <span class="mdl-textfield__error">Invalid Email Entered</span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
                            <div class="blue-line-color"></div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="firstName" class="mdl-textfield__input"
                                               name="firstName"
                                               type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"
                                               onkeypress="return supressEnter()"/>
                                        <label class="mdl-textfield__label" for="firstName">First Name</label>
                                        <span class="mdl-textfield__error">Invalid First Name Entered</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="lastName" class="mdl-textfield__input"
                                               name="lastName"
                                               type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"
                                               onkeypress="return supressEnter()"/>
                                        <label class="mdl-textfield__label" for="lastName">Last Name</label>
                                        <span class="mdl-textfield__error">Invalid Last Name Entered</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card-footer">
                        <div class="right-align">
                            <!--   Button trigger modal -->
                            <button form="newUserForm" type="submit" class="btn btn-right btn-primary">
                                Submit User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../scripts/footer.php"); ?>
