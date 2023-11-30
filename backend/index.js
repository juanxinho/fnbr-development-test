const express = require('express')
const { dbConnection } = require('./database/config')
require('dotenv').config()
const cors = require('cors')

const app = express()

// Base de datos
dbConnection()

// CORS
app.use(cors())

// Directorio publico
// app.use(express.static('dist'))

// Middlewares
app.use(express.json())

// Rutas
app.use('/api/forms', require('./routes/forms'))

app.listen(process.env.PORT, () => {
  console.log(`Servidor corriendo en puerto ${process.env.PORT}`)
})
