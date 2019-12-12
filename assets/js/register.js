jQuery(document).ready(function(){

$('#inputPassword, #conPassword').on('keyup', function () {
    if ($('#inputPassword').val() == "") {
        $('#message').html('');
    } else
    if ($('#inputPassword').val() == $('#conPassword').val()) {
      $('#message').html('Password Matched').css('color', 'green');
    } else 
      $('#message').html('Password does not match').css('color', 'red');
  });

//   function check() {
//     if(document.getElementById('inputPassword').value ===
//             document.getElementById('conPassword').value) {
//         document.getElementById('message').innerHTML = "match";
//     } else {
//         document.getElementById('message').innerHTML = "no match";
//     }
// }
});