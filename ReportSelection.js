function onLoad()
{
	document.getElementById("classroomList").style.display="none";
	document.getElementById("studentsEnrolled").style.display="none";
}

function formSelector(choice)
{
	if (choice == 1)
	{
		document.getElementById("classroomList").style.display="block";
		document.getElementById("studentsEnrolled").style.display="none";
	}
	else if(choice == 2)
	{
		document.getElementById("studentsEnrolled").style.display="block";
		document.getElementById("classroomList").style.display="none";
	}
}