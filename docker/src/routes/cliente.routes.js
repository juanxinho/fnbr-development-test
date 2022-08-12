import { Router } from "express";
import { methods as clienteController } from "../controllers/cliente.controller";

const router = Router();

router.post("/", clienteController.addCliente);
router.get("/", clienteController.getClientes);
// router.get("/:id", languageController.getLanguage);
// router.post("/", languageController.addLanguage);
// router.put("/:id", languageController.updateLanguage);
// router.delete("/:id", languageController.deleteLanguage);

export default router;
