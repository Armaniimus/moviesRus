function clearform() {
    console.log("hello");
    setTimeout(function () {
        document.getElementById('name').value = "";
        document.getElementById('day').value = "";
        document.getElementById('month').value = "";
        document.getElementById('year').value = "";
        document.getElementById('act_fname').value = "";
        document.getElementById('act_lname').value = "";
        document.getElementById('rating').value = "";
    }, 1);
}
