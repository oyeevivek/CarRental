function customerForm1() {
    let fname = document.forms["customerForm"]["fname"].value;
    let lname = document.forms["customerForm"]["lname"].value;
    let email = document.forms["customerForm"]["email"].value;
    let pass = document.forms["customerForm"]["pass"].value;

    if (fname == "") {
        alert("First Name must be filled out");
        return false;
    }
    if (lname == "") {
        alert("Last Name must be filled out");
        return false;
    }
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email.match(mailformat)) {
        alert("You have entered an invalid email address!");
        document.forms["customerForm"]["email"].focus();
        return false;
    }
    if (pass == "") {
        alert("Password must be filled out");
        return false;
    }
    if (pass.length < 5 || pass.length > 10) {
        alert("Password length must between 5 to 10");
        return false;
    }
}

function agencyForm1() {
    let aname = document.forms["agencyForm"]["aname"].value;
    let email = document.forms["agencyForm"]["email"].value;
    let pass = document.forms["agencyForm"]["pass"].value;

    if (aname == "") {
        alert("Agency Name must be filled out");
        return false;
    }
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email.match(mailformat)) {
        alert("You have entered an invalid email address!");
        document.forms["agencyForm"]["email"].focus();
        return false;
    }
    if (pass == "") {
        alert("Password must be filled out");
        return false;
    }
    if (pass.length < 5 || pass.length > 10) {
        alert("Password length must between 5 to 10");
        return false;
    }
}

function availableCarForm() {
    let edays = parseInt(document.forms["availableCar"]["edays"].value);
    let sdate = document.forms["availableCar"]["sdate"].value;

    if (!Number.isInteger(edays)) {
        alert("Days should be integer");
        return false;
    }
    if (edays <= 0) {
        alert("Days should be greater than 0");
        return false;
    }
    if (sdate == "") {
        alert("Date can not be empty");
        return false;
    }
}

function editAddCar(formName) {
    let vmodel = document.forms[formName]["vmodel"].value;
    let vnum = document.forms[formName]["vnum"].value;
    let scap = parseInt(document.forms[formName]["scap"].value);
    let rpd = parseInt(document.forms[formName]["rpd"].value);

    if (vmodel == "") {
        alert("Model must be filled out");
        return false;
    }
    if (vnum == "") {
        alert("Vehicle Number must be filled out");
        return false;
    }
    if (!Number.isInteger(scap)) {
        alert("Seat Capacity should be integer");
        return false;
    }
    if (scap <= 0) {
        alert("Seat Capacity should be greater than 0");
        return false;
    }
    if (!Number.isInteger(rpd)) {
        alert("Rent should be integer");
        return false;
    }
    if (rpd <= 0) {
        alert("Rent should be greater than 0");
        return false;
    }

}