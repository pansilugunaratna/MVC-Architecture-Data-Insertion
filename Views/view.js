function doInsert() {

    const data = new FormData();
    const xhr = new XMLHttpRequest();

    const firstname = document.getElementById("fn").value;
    const lastname = document.getElementById("ln").value;
    const password = document.getElementById("pw").value;

    data.append("f_name", firstname);
    data.append("l_name", lastname);
    data.append("p_word", password);

    xhr.open("POST","../Controllers/controller.php");

    xhr.onload = function(){
        let results = document.getElementById("results"),
            search = JSON.parse(this.response);
        results.innerHTML = "";
        if (search === true) {
            results.innerHTML = "Successfully Submitted!";
        }
    };
    xhr.send(data);
    return false;
}