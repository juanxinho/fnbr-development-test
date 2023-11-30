const mongoose = require('mongoose')

const dbConnection = async () => {
  try {
    await mongoose.connect(process.env.DB_MONGO)
    console.log('DB online')
  } catch (error) {
    console.log(error.message)
    throw new Error('Error al inicializar base de datos')
  }
}

module.exports = {
  dbConnection
}
