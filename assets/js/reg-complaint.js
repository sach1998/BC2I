function comValidate(){
    var date = document.getElementById("date").value;
    var time = document.forms.comp.time.value;

    var CurrentDate = new Date();
    date1 = new Date(date);
    if(date1.getTime() > CurrentDate.getTime()){
        alert('Date of incident is not a valid date.');
        return false;
    }
}