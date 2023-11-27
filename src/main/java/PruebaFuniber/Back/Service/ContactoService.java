package PruebaFuniber.Back.Service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import PruebaFuniber.Back.Model.Contacto;
import PruebaFuniber.Back.Repository.ContactoRepository;

@Service

public class ContactoService {
	
	@Autowired	
	private  ContactoRepository contactoRepository;
	
	public List<Contacto> getAllContactos(){
		return contactoRepository.findAll();
	}
	
	public Optional<Contacto> getAllContactoById(Long id){
		if(this.existeContacto(id)) {
			return contactoRepository.findById(id);
		}else {
			throw new RuntimeException("El contacto no existe");
		}
			
	}
	
	public Contacto crearContacto (Contacto contacto) {
		return contactoRepository.save(contacto);
	}
	
	public boolean existeContacto(Long id) {
		return contactoRepository.existsById(id);
	}
}