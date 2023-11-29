package PruebaFuniber.Back.Service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import PruebaFuniber.Back.Model.City;
import PruebaFuniber.Back.Repository.CityRepository;

@Service

public class CityService {
	
	@Autowired	
	private   CityRepository cityRepository;
	
	public List<City> getAllcities(){
		return cityRepository.findAll();
	}
	
	public Optional<City> getAllCitiesById(Long id){
		if(this.existeCity(id)) {
			return cityRepository.findById(id);
		}else {
			throw new RuntimeException("La ciudad no existe");
		}
			
	}

	public List<City> getCitiesByState(Long id_state) {
		if (this.existeState(id_state)) {
			return cityRepository.findByState_Id(id_state);
		}else {
			throw new RuntimeException("El estado no existe");
		}
	}
	
	public boolean existeCity(Long id) {
		return cityRepository.existsById(id);
	}
	public boolean existeState(Long id_state) {
		return cityRepository.existsByState_id(id_state);
	}

}
