import { config } from "dotenv";

config();

export default {
    host: process.env.DB_HOST || "",
    port:process.env.DB_PORT|| "",
    database: process.env.DB_DATABASE || "",
    user: process.env.DB_USER || "",
    password: process.env.DB_PASSWORD || "",
    mailtrapUser:process.env.MAILTRAP_USER,
    mailtrapPass:process.env.MAILTRAP_PASS
};
