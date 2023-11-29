package PruebaFuniber.Back.Controller;

import java.util.List;
import java.util.Optional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import PruebaFuniber.Back.Model.Country;
import PruebaFuniber.Back.Service.CountryService;
@RestController
@RequestMapping ("/country")
@CrossOrigin("*")
public class CountryController {
	@Autowired
	private  CountryService countryService;
	
	@GetMapping("/")
	public List<Country> getAllcountries(){
		return countryService.getAllcountries();
	}	
	
	@GetMapping("/{id}")
	public Optional<Country> getCountriesById(@PathVariable Long id){
		return countryService.getAllCountryById(id);
	}
}
