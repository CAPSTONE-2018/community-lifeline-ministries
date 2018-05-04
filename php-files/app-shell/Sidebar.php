<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">Community Lifeline</p>
            <p class="app-sidebar__user-designation">Ministries</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="../index-login/Main-Menu.php">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-graduation-cap"></i>
                <span class="app-menu__label"> Students</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="../new/NewStudent.php">
                        <i class="icon fa fa-plus"></i>
                        Add New Student
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../show/ShowStudents.php">
                        <i class="icon fa fa-folder-open"></i>
                        View All
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../new/NewStudentToProgram.php">
                        <i class="icon fa fa-pencil-square-o"></i>
                        Register In Program
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../new/NewStudentToMedicalConcern.php">
                        <i class="icon fa fa-warning"></i>
                        Add Medical Concern
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-address-book-o"></i>
                <span class="app-menu__label"> Contacts</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="../new/NewContact.php">
                        <i class="icon fa fa-plus"></i>
                        Add New Contact
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../show/ShowContacts.php">
                        <i class="icon fa fa-folder-open"></i>
                        View All
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="#">
                        <i class="icon fa fa-pencil-square-o"></i>
                        Add Student to Contact
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-star"></i>
                <span class="app-menu__label"> Volunteers</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="../new/NewVolunteerEmployee.php">
                        <i class="icon fa fa-plus"></i>
                        Add New Volunteer
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../show/ShowVolunteerEmployees.php">
                        <i class="icon fa fa-folder-open"></i>
                        View All
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../new/NewVolunteerEmployeeToProgram.php">
                        <i class="icon fa fa-pencil-square-o"></i>
                        Add Volunteer to Program
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-pencil"></i>
                <span class="app-menu__label"> Programs</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="../new/NewProgram.php">
                        <i class="icon fa fa-plus"></i>
                        Add New Program
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../show/ShowPrograms.php">
                        <i class="icon fa fa-folder-open"></i>
                        View All
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="#">
                        <i class="icon fa fa-calendar-check-o"></i>
                         Attendance
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-warning"></i>
                <span class="app-menu__label"> Medical Concerns</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="../new/NewMedicalConcernType.php">
                        <i class="icon fa fa-plus"></i>
                        Add New Concern Type
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../show/ShowMedicalConcerns.php">
                        <i class="icon fa fa-folder-open"></i>
                        View All
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../new/NewStudentToMedicalConcern.php">
                        <i class="icon fa fa-graduation-cap"></i>
                         Add Student Concern
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label"> Reports</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="../create/CreateStudentReport.php">
                        Student Reports
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../create/CreateContactReport.php">
                        Contact Reports
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../create/CreateVolunteerReport.php">
                        Volunteer Reports
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../create/CreateMedicalReport.php">
                        Medical Reports
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../create/CreateStudentMedicalReport.php">
                        Student Medical Reports
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../create/CreateStudentToProgramReport.php">
                        Program Reports
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../create/CreateAttendanceReport.php">
                        Attendance Reports
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="../create/CreateStudentAttendanceReport.php">
                        Student Attendance Reports
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user-secret"></i>
                <span class="app-menu__label"> Users</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="../new/NewUser.php">
                        Add New User
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="../index-login/UserDocumentation.php">
                <i class="app-menu__icon fa fa-question-circle"></i>
                <span class="app-menu__label">Help</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="../index-login/logout.php">
                <i class="app-menu__icon fa fa-power-off"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
    </ul>
</aside>

<main class="app-content">