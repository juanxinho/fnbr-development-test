package PruebaFuniber.Back.Repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import PruebaFuniber.Back.Model.City;

public interface CityRepository extends JpaRepository<City, Long>{
	
	List<City> findByState_Id(Long id_state);

	boolean existsByState_id(Long id_state);

}
