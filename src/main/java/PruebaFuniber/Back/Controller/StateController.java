package PruebaFuniber.Back.Controller;

import java.util.List;
import java.util.Optional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import PruebaFuniber.Back.Model.State;
import PruebaFuniber.Back.Service.StateService;

@RestController
@RequestMapping ("/state")
@CrossOrigin("*")
public class StateController {
	@Autowired
	private  StateService stateService;
	
	@GetMapping("/")
	public List<State> getAllstates(){
		return stateService.getAllstates();
	}	
	
	@GetMapping("/{id}")
	public Optional<State> getStatesById(@PathVariable Long id){
		return stateService.getAllStatesById(id);
	}
	
	@GetMapping("/country/{id_country}")
	public List<State> getStatesByCountry(@PathVariable Long id_country){
		return stateService.getStatesByCountry(id_country);
	}
}
