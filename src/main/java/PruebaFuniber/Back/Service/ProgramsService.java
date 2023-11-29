package PruebaFuniber.Back.Service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import PruebaFuniber.Back.Model.Programs;
import PruebaFuniber.Back.Repository.ProgramsRepository;


@Service
public class ProgramsService {
	
	@Autowired	
	private   ProgramsRepository programsRepository;
	
	public List<Programs> getAllPrograms(){
		return programsRepository.findAll();
	}
	
	public Optional<Programs> getAllProgramsById(Long id){
		if(this.existePrograma(id)){
			return programsRepository.findById(id);
		}
		else {
		throw new RuntimeException("El programa no existe");
		}
	}
	
	public List<Programs> getProgramsByArea(Long id_area){
		if(this.existeArea(id_area)){
			return programsRepository.findByArea_Id(id_area);
		}
		else {
		throw new RuntimeException("El area no existe");
		}
	}
	
	public boolean existePrograma(Long id) {
		return programsRepository.existsById(id);
	}
	public boolean existeArea(Long id_area) {
		return programsRepository.existsByArea_Id(id_area);
	}
}
