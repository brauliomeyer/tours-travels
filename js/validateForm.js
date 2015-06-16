function validateForm() {
    if (document.addContent.state_name.value === "")
    {
	alert("Please enter name state!");
	document.addContent.state_name.focus();
	return false;
    }
    if (document.addContent.city.value === "")
    {
	alert("Please enter city!");
	document.addContent.city.focus();
	return false;
    }
    if (document.addContent.hotel_name.value === "")
    {
	alert("Please enter name hotel!");
	document.addContent.hotel_name.focus();
	return false;
    }
    if (document.addContent.no_of_adults.value === "")
    {
	alert("Please enter total adults!");
	document.addContent.no_of_adults.focus();
	return false;
    }
    if (document.addContent.no_of_childs.value === "")
    {
	alert("Please enter total childs!");
	document.addContent.no_of_childs.focus();
	return false;
    }
    if (document.addContent.start_date.value === "")
    {
	alert("Please enter Check-In date!");
	document.addContent.start_date.focus();
	return false;
    }
    if (document.addContent.end_date.value === "")
    {
	alert("Please enter Check-Out date!");
	document.addContent.end_date.focus();
	return false;
    }
    return(true);
}
