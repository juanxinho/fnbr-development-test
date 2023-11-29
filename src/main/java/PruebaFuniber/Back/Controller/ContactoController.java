package PruebaFuniber.Back.Controller;

import java.util.List;
import java.util.Optional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.mail.MailException;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.mail.javamail.MimeMessageHelper;
import org.springframework.mail.javamail.MimeMessagePreparator;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.thymeleaf.TemplateEngine;
import org.thymeleaf.context.Context;
import org.thymeleaf.spring6.SpringTemplateEngine;

import PruebaFuniber.Back.Config.SwaggerConfig;
import PruebaFuniber.Back.Model.Contacto;
import PruebaFuniber.Back.Service.ContactoService;
import io.swagger.v3.oas.annotations.Operation;

@RestController
@RequestMapping ("/contacto")
@CrossOrigin("*")
public class ContactoController {
	@Autowired
	private  ContactoService contactoService;
	
	
	private SwaggerConfig config;
	
	@Autowired
    private JavaMailSender javaMailSender;
	
	@Autowired
	private TemplateEngine templateEngine;
	
	@GetMapping("/")
	public List<Contacto> getAllContactos(){
		return contactoService.getAllContactos();
	}	
	
	@GetMapping("/{id}")
	public Optional<Contacto> getContactosById(@PathVariable Long id){
		return contactoService.getAllContactoById(id);
	}
	@Operation(
			description = "para ingresar los datos de ciudad, estado, pais, area y programas.Solo se requiere el id ... ej: \"country\": {\r\n"
					+ "      \"id\": 63 },"
					
			)
	@PostMapping("/crear")
    public Contacto crearContacto(@RequestBody Contacto contacto) {
        Contacto nuevoContacto = contactoService.crearContacto(contacto);

        try {
            // Crear el contexto para Thymeleaf
            Context thymeleafContext = new Context();
            thymeleafContext.setVariable("contacto", contacto);

            // Procesar el template de Thymeleaf
            String cuerpoCorreo = templateEngine.process("emailTemplate.html", thymeleafContext);

            // Enviar el correo
            enviarCorreo(contacto.getEmail(), "Asunto del correo", cuerpoCorreo);
        } catch (MailException e) {
            e.printStackTrace();
        }

        return nuevoContacto;
    }

    private void enviarCorreo(String destinatario, String asunto, String cuerpo) throws MailException {
        MimeMessagePreparator messagePreparator = mimeMessage -> {
            MimeMessageHelper messageHelper = new MimeMessageHelper(mimeMessage);
            messageHelper.setTo(destinatario);
            messageHelper.setSubject(asunto);
            messageHelper.setText(cuerpo, true);
        };

        javaMailSender.send(messagePreparator);
    }
}
