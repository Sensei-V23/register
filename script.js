function onsubmitregister() {
    const user = document.getElementById("username").value.trim();
    const pass = document.getElementById("password").value.trim();

    if (user === "" || pass === "") {
        alert("กรุณากรอกข้อมูลให้ครบ!");
        return false;
    }

    return true;
}
