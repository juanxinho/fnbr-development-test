package PruebaFuniber.Back.Service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import PruebaFuniber.Back.Model.Country;
import PruebaFuniber.Back.Repository.CountryRepository;

@Service

public class CountryService {
	
	@Autowired	
	private   CountryRepository countryRepository;
	
	public List<Country> getAllcountries(){
		return countryRepository.findAll();
	}
	
	public Optional<Country> getAllCountryById(Long id){
		if(this.existeCountry(id)) {
			return countryRepository.findById(id);
		}else {
			throw new RuntimeException("El pais no existe");
		}
		
	}
	
	public boolean existeCountry(Long id) {
		return countryRepository.existsById(id);
	}
}
