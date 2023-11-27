package PruebaFuniber.Back.Repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import PruebaFuniber.Back.Model.Programs;

public interface ProgramsRepository extends JpaRepository<Programs, Long>{

	List<Programs> findByArea_Id(Long id_area);

	boolean existsByArea_Id(Long id_area);

}
