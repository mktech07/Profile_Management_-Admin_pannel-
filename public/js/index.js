$(document).ready(function () {
    // -----------------------------------------------------
    $('#submitBtn').click(function () {
        var name = $('#name').val();
        if (name.length == "") {
            $('#nameErr').show();
            $('#nameErr').html("**Please Fill the Name");
            $('#name').css("border", "2px solid red");

            $('#nameErr').focus();
            $('#nameErr').css('color', 'red');
            name_err = false;
            return false;
        }
        else {
            $('#name').css("border", "2px solid green");
            $('#nameErr').hide();
        }
        if ((name.length < 3) || (name.length > 30)) {
            $('#nameErr').show();
            $('#name').css("border", "2px solid red");
            $('#nameErr').html("**UserName length must be between 3 and 30");
            $('#nameErr').focus();
            $('#nameErr').css('color', 'red');
            name_err = false;
            return false;
        }
        else {
            $('#nameErr').hide();
        }

        //  email Valdiation Starts-----------------------------------------------------------------------------
        // var email = $('$email')
        if (validateEmail()) {

            // $('#emailErr').show();
            $('#email').focus();
            $('#email').css("border", "2px solid green");
            $('#emailErr').show();
            $('#emailErr').css('color', 'green');
            $('#emailErr').html("valid email");
        } else {
            $('#emailErr').show();
            $('#email').css('border', '2px solid red ');
            $('#emailErr').css('color', 'red');
            $('#emailErr').html('Invalid Email');
            return false;

        }

        //  email Valdiation ends-----------------------------------------------------------------------------

        //  gender Valdiation Starts-----------------------------------------------------------------------------

        if ($('input[type=radio][name=gender]:checked').length == 0) {
            $('#genderErr').show();
            $('#genderErr').html("**Please Select the Gender");
            $('#gender').css("border", "2px solid red");

            $('#genderErr').focus();
            $('#genderErr').css('color', 'red');
            return false;
        } else {
            $('#genderErr').hide();
            $('#genderErr').focus();
            $('#gender').css("border", "2px solid green");
        }

        //  gender Valdiation ends-----------------------------------------------------------------------------
        //  Password Valdiation starts-----------------------------------------------------------------------------
        var passwrdstr = $('#password').val();
        if (passwrdstr.length == '') {
            $('#passwordErr').show();
            $('#password').css("border", "2px solid red");
            $('#passwordErr').html('**Please Fill the Password');
            $('#passwordErr').focus();
            $('#passwordErr').css('color', 'red');
            return false;
        }
        else {
            $('#password').css("border", "2px solid green");
            $('#passwordErr').hide();
        }
        if (passwrdstr.length < 8) {
            $('#passwordErr').show();
            $('#passwordErr').html("**Password Should be atleast 8 digits");
            $('#password').css("border", "2px solid red");
            $('#passwordErr').focus();
            $('#passwordErr').css('color', 'red');
            return false;
        }
        else {
            $('#passwordErr').hide();
        }
        //  Password Valdiation ends-----------------------------------------------------------------------------

        //  Designation Valdiation Start-----------------------------------------------------------------------------
        var designation = $('#designation').val();
        if (designation.length == "") {
            $('#designationErr').show();
            $('#designationErr').html("**Please Select the Designation");
            $('#designation').css("border", "2px solid red");
            $('#designationErr').focus();
            $('#designationErr').css('color', 'red');
            return false;
        }
        else {
            $('#designationErr').hide();
            $('#designation').css("border", "2px solid green");
        }
        //  Designation Valdiation ends-----------------------------------------------------------------------------

        //  Experience Valdiation Starts-----------------------------------------------------------------------------
        var experience = $('#experience').val();
        if (validateExperience(experience)) {
            $('#experienceErr').hide();
            $('#experience').css("border", "2px solid green");
        }
        else {
            $('#experienceErr').show();
            $('#experienceErr').html('**Enter valid Experince');
            $('#experience').css("border", "2px solid red");
            $('#experienceErr').css('color', 'red');
            return false;
        }
        //  Experience Valdiation ends-----------------------------------------------------------------------------
        //  education Valdiation ends-----------------------------------------------------------------------------
        var education = $('#education').val();
        if (education.length == "") {
            $('#educationErr').show();
            $('#educationErr').html("**Please Select the Education");
            $('#education').css("border", "2px solid red");
            $('#educationErr').focus();
            $('#educationErr').css('color', 'red');
            return false;
        }
        else {
            $('#educationErr').hide();
            $('#education').css("border", "2px solid green");
        }
        //  education Valdiation ends-----------------------------------------------------------------------------
        //  mobileNumber Valdiation starts-----------------------------------------------------------------------------
        var mobile = $('#mobile').val();
        if (validateMobile(mobile)) {
            $('#mobileErr').hide();
            $('#mobile').focus();
            $('#mobile').css("border", "2px solid green");
        }
        else {
            $('#mobileErr').show();
            $('#mobileErr').html('**Please Enter Valid Number');
            $('#mobile').css("border", "2px solid red");
            $('#mobileErr').css('color', 'red');
            return false;
        }
        //  mobileNumber Valdiation ends-----------------------------------------------------------------------------

        //  Address Valdiation starts-----------------------------------------------------------------------------
        var address = $('#address').val();
        if (address == "") {
            $('#addressErr').show();
            $('#addressErr').html('**Address is Required');
            $('#address').css("border", "2px solid red");
            $('#addressErr').css('color', 'red');
            return false;
        } else if (address.length < 7) {
            $('#addressErr').show();
            $('#addressErr').html('**Enter Valid Address');
            $('#address').css("border", "2px solid red");
            $('#addressErr').css('color', 'red');
            return false;
        }
        else {
            $('#addressErr').hide();
            $('#address').css("border", "2px solid green");
        }

        //  Address Valdiation ends-----------------------------------------------------------------------------

        //  city Valdiation starts-----------------------------------------------------------------------------
        var city = $('#city').val();
        if (city == "") {
            $('#cityErr').show();
            $('#cityErr').html('**City is Required');
            $('#city').css("border", "2px solid red");
            $('#cityErr').css('color', 'red');
            return false;
        } else if (city.length < 3) {
            $('#cityErr').show();
            $('#cityErr').html('**Enter Valid City Name');
            $('#city').css("border", "2px solid red");
            $('#cityErr').css('color', 'red');
            return false;
        }
        else {
            $('#cityErr').hide();
            $('#city').css("border", "2px solid green");
        }
        //  city Valdiation ends-----------------------------------------------------------------------------
        //  pincode Valdiation starts-----------------------------------------------------------------------------
        var pincode = $('#pincode').val();
        if (pincode == "") {
            $('#pincodeErr').show();
            $('#pincodeErr').html('**Pincode is Required');
            $('#pincode').css("border", "2px solid red");
            $('#pincodeErr').css('color', 'red');
            return false;
        } else if ($.isNumeric(pincode) == false) {
            $('#pincodeErr').show();
            $('#pincodeErr').html('**Pincode Must be number');
            $('#pincode').css("border", "2px solid red");
            $('#pincodeErr').css('color', 'red');
            // pincode_Err = false;
            return false;
        }
        else if (pincode.length != 6) {
            $('#pincodeErr').show();
            $('#pincodeErr').html('**Pincode Must have 6 Digits ');
            $('#pincode').css("border", "2px solid red");
            $('#pincodeErr').css('color', 'red');
            // pincode_Err = false;
            return false;
        }
        else {
            $('#pincodeErr').hide();
            $('#pincode').css("border", "2px solid green");
        }
        //  pincode Valdiation ends-----------------------------------------------------------------------------
        //  state Valdiation starts-----------------------------------------------------------------------------
        var state = $('#state').val();
        if (state.length == "") {
            $('#stateErr').show();
            $('#stateErr').html("**Please Enter the state");
            $('#state').css("border", "2px solid red");

            $('#stateErr').focus();
            $('#stateErr').css('color', 'red');
            // state_err = false;
            return false;
        }
        else {
            $('#state').css("border", "2px solid green");
            $('#stateErr').hide();
        }
        if ((state.length < 3)) {
            $('#stateErr').show();
            $('#state').css("border", "2px solid red");

            $('#stateErr').html("**Enter Valid State Name");
            $('#stateErr').focus();
            $('#stateErr').css('color', 'red');
            // state_err = false;
            return false;
        }
        else {
            $('#stateErr').hide();
        }

        //  state Valdiation ends-----------------------------------------------------------------------------
        //  country  Valdiation ends-----------------------------------------------------------------------------
        var country = $('#country').val();
        if (country.length == "") {
            $('#countryErr').show();
            $('#countryErr').html("**Please Enter the country");
            $('#country').css("border", "2px solid red");

            $('#countryErr').focus();
            $('#countryErr').css('color', 'red');
            // country_err = false;
            return false;
        }
        else {
            $('#country').css("border", "2px solid green");
            $('#countryErr').hide();
        }
        if ((country.length < 3)) {
            $('#countryErr').show();
            $('#country').css("border", "2px solid red");

            $('#countryErr').html("**Enter Valid country Name");
            $('#countryErr').focus();
            $('#countryErr').css('color', 'red');
            // country_err = false;
            return false;
        }

        else {
            $('#countryErr').hide();
        }
        //  country  Valdiation ends-----------------------------------------------------------------------------

        var imagInput = $('#profile_image')[0];
        if (!imagInput.files || !imagInput.files[0]) {
            $('#profileErr').show();
            $('#profileErr').css("color", "red");
            $('#profileErr').focus();
            $('#profileErr').html("**Select a Image");
            return false;
        }
        // Get the file name
        var fileName = imagInput.files[0].name;

        // Set the allowed file extensions
        var allowedExtensions = ['jpg', 'jpeg', 'png'];
        // Get the file extension
        var fileExtension = fileName.split('.').pop().toLowerCase();
        if (allowedExtensions.indexOf(fileExtension) === -1) {
            $('#profileErr').show();
            $('#profileErr').css("color", "red");
            $('#profileErr').html("**Select Valid Image(jpg,jpeg,png)");
            return false;
        }

    });
    // submit Button Validation Ends

    function validateEmail() {
        var email = $('#email').val();
        // using regular expression
        var reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (reg.test(email)) {
            return true;
        } else {
            return false;
        }
    }

    function validateExperience(exp) {
        // using regular expression
        var regex = /^[0-9]{1,2}$/;
        return regex.test(exp);

    }

    function validateMobile(mobile) {
        // using regular expression
        var regex = /^\d{10}$/;
        return regex.test(mobile);

    }
    // -----------------------------------------------------------------------------

    // date picker  
    $(function () {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            "locale": {
                "format": "DD/MM/YYYY",
            }

        }, function (start, end, label) {
            // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });

    // Preview Image Jquery
    $(function previewImage() {
        $('#profile_image').change(function (event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $('#previewImg').css('background-image', 'url(' + x + ')');
            $('#previewImg').css('background-size', 'cover');
        });
    });

});