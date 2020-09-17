function dateCheck() {

    //EXt Data Call  
    var xhttpGraph1 = new XMLHttpRequest();
    xhttpGraph1.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            var response = JSON.parse(xhttpGraph1.responseText);
            console.log(response);
            if (response.Count > 0) {
                document.getElementById('err').innerHTML =
                    `<h1 class="text-danger">SHIFT ALREADY RECORDED, <br>
                 PLEASE USE UPDATE ON MAIN MENU!</h1>
                 <a href="outstanding.php" class="btn btn-primary">Update HandOver</a>`;
            } else {
                document.getElementById('err').innerHTML = '';
            }
        }
    };

    let DATE = document.getElementById('StartDate').value;
    let SHIFT = document.getElementById('ShiftType').value;

    console.log(`_dateCheck.php?DATE=${DATE}&SHIFT=${SHIFT}`);
    xhttpGraph1.open("GET", `_dateCheck.php?DATE=${DATE}&SHIFT=${SHIFT}`, true);
    xhttpGraph1.send();
}
