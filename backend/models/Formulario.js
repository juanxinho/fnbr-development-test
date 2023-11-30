const { Schema, model } = require('mongoose')

const FormularioScheme = Schema({
  area: {
    type: String,
    required: true
  },
  name: {
    type: String,
    required: true
  },
  email: {
    type: String,
    required: true
  },
  country: {
    type: String,
    required: true
  },
  city: {
    type: String,
    required: true
  },
  program: {
    type: String,
    required: true
  },
  lastnames: {
    type: String,
    required: true
  },
  phone: {
    type: String,
    required: true
  },
  state: {
    type: String,
    required: true
  },
  comment: {
    type: String
  }

})

module.exports = model('Formulario', FormularioScheme)
