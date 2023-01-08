
  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    // true for mobile device
    console.log("mobile device");
    document.getElementById("user_id").type = "number";
    $('#user_id').on('keyup', function(event) {
      var regex_length = /^[0-9]$/;
      var input = document.getElementById("user_id").value

      if (!regex_length.test(input)) {
        document.getElementById('user_id').style.borderColor = "red";
        document.getElementById('user_id').style.borderWidth = "2px";
      } else {
        document.getElementById('user_id').style.borderColor = "";
        document.getElementById('user_id').style.borderWidth = "";
      }
    });
    $('#first_name').on('keyup', function(event) {
      var regex = /^[a-zA-Z ]+$/;
      var key = byId("first_name").value
      if (!regex.test(key)) {
        byId('first_name').style.borderColor = "red";
        byId('first_name').style.borderWidth = "2px";
      } else {
        byId('first_name').style.borderColor = "";
        byId('first_name').style.borderWidth = "";
      }
    });

    $('#last_name').on('keyup', function(event) {
      var regex = /^[a-zA-Z ]+$/;
      var key = byId("last_name").value
      if (!regex.test(key)) {
        byId('last_name').style.borderColor = "red";
        byId('last_name').style.borderWidth = "2px";
      } else {
        byId('last_name').style.borderColor = "";
        byId('last_name').style.borderWidth = "";
      }
    });

  } else {
    $('#first_name').on('keypress', function(event) {
      var regex = /[a-zA-Z ]/gi
      var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
      if (!regex.test(key)) {
        return false;
      } else {}
    });

    $('#last_name').on('keypress', function(event) {
      var regex = /[a-zA-Z ]/gi
      var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
      if (!regex.test(key)) {
        return false;
      } else {}
    });

    $('#user_id').on('keypress', function(event) {
      var regex = /[0-9]/;
      var regex_length = /[0-9]$/;
      var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
      var input = document.getElementById("user_id").value
      if (!regex.test(key)) {
        document.getElementById('user_id').style.borderColor = "red";
        document.getElementById('user_id').style.borderWidth = "2px";
        return false;
      } else {
        document.getElementById('user_id').style.borderColor = "";
        document.getElementById('user_id').style.borderWidth = "";

        if (!regex_length.test(input)) {
          document.getElementById('user_id').style.borderColor = "red";
          document.getElementById('user_id').style.borderWidth = "2px";
        } else {
          document.getElementById('user_id').style.borderColor = "";
          document.getElementById('user_id').style.borderWidth = "";
        }

      }
    });

  }