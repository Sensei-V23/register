import mysql from "mysql2/promise";

export default async function handler(req, res) {
    if (req.method !== "POST") {
        return res.status(405).json({ message: "Method not allowed" });
    }

    const { username, password } = req.body;

    if (!username || !password) {
        return res.status(400).json({ message: "กรุณากรอกข้อมูลให้ครบ" });
    }

    try {
        const db = await mysql.createConnection({
            host: process.env.DB_HOST,
            user: process.env.DB_USER,
            password: process.env.DB_PASS,
            database: process.env.DB_NAME
        });

        await db.execute(
            "INSERT INTO users (Username, Password) VALUES (?, ?)",
            [username, password]
        );

        return res.status(200).json({ message: "สมัครสมาชิกสำเร็จ" });
    } catch (err) {
        return res.status(500).json({ message: "Error", error: err });
    }
}