
var counter = 0;
let base_url = "http://localhost/ass5/";
function showForm() {
    var x = document.getElementById("f1");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function view() {

    var y = document.getElementById("r1");
    if (counter == 0) {
        document.getElementById("s8").innerHTML = "------------------************No data Found************------------------ ";

        y.style.display = "none";
    }
    else if (counter != 0) {
        if (y.style.display === "none") {
            document.getElementById("s8").innerHTML = " "
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
    }


}

function addRow(formID, tableID) {
    var table = document.getElementById(tableID);
    var form = document.forms[formID];
    var rowCount = table.rows.length;

    var fname = document.myform.fname.value;
    var mobile = document.myform.mobile.value;
    var email = document.myform.email.value;
    var country = document.myform.country.value;
    var gender = document.myform.gender.value;

    var nameregex = /^[a-zA-Z\s]+$/;
    var mobregex = /^[1-9]\d{9}$/;
    // Regular expression for basic email validation
    var Eregex = /^\S+@\S+\.\S+$/;


    if (fname == "") {
        document.getElementById("s1").innerHTML = "Please enter your fullname";
        return false;
    }
    else if (nameregex.test(fname) === false) {
        document.getElementById("s1").innerHTML = "Please enter a valid name";
        return false;
    }
    // Validate mobile number
    else if (mobile == "") {
        document.getElementById("s2").innerHTML = "Please enter your mobile number";
        return false;
    }
    else if (mobregex.test(mobile) === false) {
        document.getElementById("s2").innerHTML = "Please enter a valid 10 digit mobile number";
    }// Validate email address
    else if (email == "") {
        document.getElementById("s3").innerHTML = "Please enter your email address";
        return false;
    } else if (Eregex.test(email) === false) {
        document.getElementById("s3").innerHTML = "Please enter a valid email address";
        return false;
    }
    else if (country == "Select") {
        document.getElementById("s4").innerHTML = "Please select your country";
        return false;
    } else if (gender == "") {
        document.getElementById("s5").innerHTML = "Please select your gender";
        return false;
    }
    else if (document.myform.s.checked == false && document.myform.m.checked == false
        && document.myform.c.checked == false && document.myform.p.checked == false) {
        document.getElementById("s6").innerHTML = "Please select your hobbies";
        return false;
    }




    else {
        let url1=base_url+"insert.php?&fname="+fname+"&mobile="+mobile+"&email="+email+"&standard="+country+"&gender="+gender;
        counter++;

        document.getElementById("s8").innerHTML = " ";
        document.getElementById("s7").innerHTML = "Your data inserted sucessfully!!";
        var row = table.insertRow(rowCount);
        var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
        element1.type = "checkbox";
        cell1.appendChild(element1);

        var cell2 = row.insertCell(1);
        cell2.innerHTML = rowCount + 1 - 1;

        var cell3 = row.insertCell(2);
        cell3.innerHTML = form.elements['name'].value;
        document.getElementById("s1").innerHTML = " ";
        form.elements['name'].value = null;


        var cell4 = row.insertCell(3);
        cell4.innerHTML = form.elements['mobile'].value;
        document.getElementById("s2").innerHTML = " ";
        form.elements['mobile'].value = null;

        var cell5 = row.insertCell(4);
        cell5.innerHTML = form.elements['email'].value;
        document.getElementById("s3").innerHTML = " ";
        form.elements['email'].value = null;

        if (form.elements['country'].value != "Select") {
            var cell6 = row.insertCell(5);
            cell6.innerHTML = form.elements['country'].value;
            document.getElementById("s4").innerHTML = " ";
        }

        var ele = document.getElementsByName('gender');
        for (i = 0; i < ele.length; i++) {
            if (ele[i].checked) {
                var cell7 = row.insertCell(6);
                cell7.innerHTML = ele[i].value;
                document.getElementById("s5").innerHTML
                    = "Gender: " + ele[i].value;

                document.getElementById("s5").innerHTML = null;
            }
        }


        form.elements['gender'].value = null;
        var hobbies = document.myform.getElementsByClassName('hobbies');
        var txt = "";
        var i;
        for (i = 0; i < hobbies.length; i++) {
            if (hobbies[i].checked === true) {
                txt = txt + hobbies[i].value + ", ";
            }
        }
        var cell8 = row.insertCell(7);
        cell8.innerHTML = txt;
        document.getElementById("s6").innerHTML
            = null;

        form.elements['hobbies'].value = null;



    }

}
