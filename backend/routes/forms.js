const { Router } = require('express')
const { crearFormulario } = require('../controllers/forms')

const router = Router()

router.post(
  '/',
  crearFormulario
)

module.exports = router
