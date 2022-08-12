import express from "express";
import morgan from "morgan";
// Routes
import languageRoutes from "./routes/cliente.routes";

const app = express();

app.use(require("./middlewares/cors"));
app.use(express.urlencoded({ extended: false }));
// Settings
app.set("port",process.env.NODE_DOCKER_PORT  ||  process.env.NODE_LOCAL_PORT);

// Middlewares
app.use(morgan("dev"));
app.use(express.json());

// Routes
app.use("/api/cliente", languageRoutes);

export default app;
