package PruebaFuniber.Back.Controller;

import java.util.List;
import java.util.Optional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import PruebaFuniber.Back.Model.Area;
import PruebaFuniber.Back.Service.AreaService;

@RestController
@RequestMapping ("/area")
@CrossOrigin("*")
public class AreaController {
	@Autowired
	private  AreaService areaService;
	
	@GetMapping("/")
	public List<Area> getAllAreas(){
		return areaService.getAllareas();
	}	
	
	@GetMapping("/{id}")
	public Optional<Area> getAreasById(@PathVariable Long id){
		return areaService.getAllAreaById(id);
	}
}
