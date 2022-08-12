import { getConnection } from "../database/database";
import { methods as mailer } from "../mailer/mailer";

const getClientes = async (req, res) => {
    try {
        const connection = await getConnection();
        const result = await connection.query("SELECT * FROM cliente");
        res.json(result);
    } catch (error) {
        res.status(500);
        res.send(error.message);
    }
};



const addCliente = async (req, res) => {
    try {
        // console.log(req.body);
        const { area,program, names,lastNames:last_names, email,phone,country,state,city,comment } = req.body;


        const datos = { area,program, names,last_names, email,phone,country,state,city,comment };
        // console.log(datos);
        const connection = await getConnection();
        await connection.query("INSERT INTO cliente SET ?", datos);
        mailer.sendMail(email);
        res.json({
            status:'200',
            message:'medio Guardado',
            error:false
        }).status(200);
    } catch (error) {
        res.status(500);
        res.res.json({
            status:'500',
            message:error.message,
            error:true
        });
    }
};



export const methods = {
    getClientes,
    addCliente
};
