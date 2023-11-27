package PruebaFuniber.Back.Controller;

import java.util.List;
import java.util.Optional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import PruebaFuniber.Back.Model.Programs;
import PruebaFuniber.Back.Service.ProgramsService;


@RestController
@RequestMapping ("/programs")
@CrossOrigin("*")
public class ProgramsController {
	@Autowired
	private  ProgramsService programsService;
	
	@GetMapping("/")
	public List<Programs> getAllprograms(){
		return programsService.getAllPrograms();
	}	
	
	@GetMapping("/{id}")
	public Optional<Programs> getProgramsById(@PathVariable Long id){
			return programsService.getAllProgramsById(id);
	}
	
	@GetMapping("/area/{id_area}")
	public List<Programs> getProgramsByArea(@PathVariable Long id_area){
		return programsService.getProgramsByArea(id_area);
	}
}
