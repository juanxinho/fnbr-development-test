package PruebaFuniber.Back.Service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import PruebaFuniber.Back.Model.State;
import PruebaFuniber.Back.Repository.StateRepository;

@Service
public class StateService {
	
	@Autowired	
	private   StateRepository stateRepository;
	
	public List<State> getAllstates(){
		return stateRepository.findAll();
	}
	
	public Optional<State> getAllStatesById(Long id){
		if(this.existeState(id)) {
			return stateRepository.findById(id);
		}else {
			throw new RuntimeException("El estado no existe");
		}
	}
	
	public List<State> getStatesByCountry(Long id_country){
		if(this.existeCountry(id_country)) {
			return stateRepository.findByCountry_Id(id_country);
		}else {
			throw new RuntimeException("La ciudad no existe");
		}
	}
	
	public boolean existeState(Long id) {
		return stateRepository.existsById(id);
	}
	public boolean existeCountry(Long id_country) {
		return stateRepository.existsByCountry_Id(id_country);
	}
}
