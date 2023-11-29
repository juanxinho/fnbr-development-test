package PruebaFuniber.Back.Controller;

import java.util.List;
import java.util.Optional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import PruebaFuniber.Back.Model.City;
import PruebaFuniber.Back.Service.CityService;

@RestController
@RequestMapping ("/city")
@CrossOrigin("*")
public class CityController {
	@Autowired
	private  CityService cityService;
	
	@GetMapping("/")
	public List<City> getAllcities(){
		return cityService.getAllcities();
	}	
	
	@GetMapping("/{id}")
	public Optional<City> getCitiesById(@PathVariable Long id){
		return cityService.getAllCitiesById(id);
	}
	
	@GetMapping("/state/{id_state}")
	public List<City> getCitiesByState(@PathVariable Long id_state){
		return cityService.getCitiesByState(id_state);
	}
}
