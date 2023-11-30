const { response } = require('express')
const Formulario = require('../models/Formulario')
const nodemailer = require('nodemailer')

const transport = nodemailer.createTransport({
  host: process.env.MAIL_HOST,
  port: process.env.MAIL_PORT,
  auth: {
    user: process.env.MAIL_USER,
    pass: process.env.MAIL_PASS
  }
})

const enviarCorreo = async () => {
  const info = await transport.sendMail({
    from: '"Daniel" <daniel@example.com>',
    to: 'funiber@funiber.com',
    subject: 'Salute',
    text: 'Hello Funiber',
    html: '<b>Hello Funiber</b>'
  })

  console.log('Message sent: %s', info.messageId)
}

const crearFormulario = async (req, res = response) => {
  const forumulario = new Formulario(req.body)

  try {
    const forumularioGuardado = await forumulario.save()
    await enviarCorreo()
    res.json({
      ok: true,
      forumulario: forumularioGuardado
    })
  } catch (error) {
    console.log(error)
    res.status(500).json({
      ok: false,
      msg: 'Talk with the admin'
    })
  }
}

module.exports = {
  crearFormulario
}
