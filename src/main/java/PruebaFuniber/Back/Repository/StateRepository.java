package PruebaFuniber.Back.Repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import PruebaFuniber.Back.Model.State;

public interface StateRepository extends JpaRepository<State, Long>{

	List<State> findByCountry_Id(Long id_country);

	boolean existsByCountry_Id(Long id_country);

}
