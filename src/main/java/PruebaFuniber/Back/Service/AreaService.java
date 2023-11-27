package PruebaFuniber.Back.Service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import PruebaFuniber.Back.Model.Area;
import PruebaFuniber.Back.Repository.AreaRepository;

@Service

public class AreaService {
	
	@Autowired	
	private   AreaRepository areaRepository;
	
	public List<Area> getAllareas(){
		return areaRepository.findAll();
	}
	
	public Optional<Area> getAllAreaById(Long id){
		if(this.existeArea(id)) {
			return areaRepository.findById(id);
		}else {
			throw new RuntimeException("El area no existe");
		}
			
	}
	
	public boolean existeArea(Long id) {
		return areaRepository.existsById(id);
	}
}