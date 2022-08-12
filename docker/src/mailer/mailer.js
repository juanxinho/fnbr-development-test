import { createTransport } from 'nodemailer';
import config from "./../config";

var transport = createTransport({
    host: "smtp.mailtrap.io",
    port: 2525,
    auth: {
      user: config.mailtrapUser,
      pass: config.mailtrapPass
    }
  });


  const sendMail = async (email) => {
    var mailOptions = {
        from: 'cristophersolis@hotmail.com',
        to: email,
        subject: 'Information send',
        text: 'Hey there, it’s our first message sent with Nodemailer ',
        html: '<b>Hey there! </b><br> This is our first message sent with Nodemailer<br /><img src="cid:uniq-mailtrap.png" alt="mailtrap" />',
      };

      transport.sendMail(mailOptions, (error, info) => {
        if (error) {
          return console.log(error);
        }
        console.log('Message sent: %s', info.messageId);
      });
  }


  export const methods = {
   sendMail
};