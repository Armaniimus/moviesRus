function clearform() {
    console.log("hello");
    setTimeout(function () {
        document.getElementById('name').value = "";
        document.getElementById('day').value = "";
        document.getElementById('month').value = "";
        document.getElementById('year').value = "";
    }, 1);
}
