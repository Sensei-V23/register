function onsubmitregister() {
    const user = document.getElementById("username").value.trim();
    const pass = document.getElementById("password").value.trim();

    if (user === "" || pass === "") {
        alert("กรุณากรอกข้อมูลให้ครบ!");
        return false; // หยุดการส่งฟอร์ม
    }

    return true; // ส่งฟอร์มได้
}
