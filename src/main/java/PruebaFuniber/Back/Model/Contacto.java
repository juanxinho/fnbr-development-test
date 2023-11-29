package PruebaFuniber.Back.Model;

import jakarta.persistence.*;
import jakarta.validation.Valid;
import jakarta.validation.constraints.Email;
import jakarta.validation.constraints.Pattern;
import jakarta.validation.constraints.Size;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Entity
@Table (name="contacto")
public class Contacto {
		
	@Valid
	@Id
	@GeneratedValue(strategy= GenerationType.IDENTITY)
	private Long id;
		
	@Size(max= 70)
	private String name;
	
	@Size(max= 70)
	private String lastname;
	
	@Email
	private String email;
		
	@Pattern (regexp = "^(\\+\\d{1,3})?\\d{10}$")
	private String telefono;
		
	@ManyToOne
	@JoinColumn(name = "id_country")
	private Country country;
	
	@ManyToOne
	@JoinColumn(name= "id_state")
	private State state;
	
	@ManyToOne
	@JoinColumn(name= "id_city")
	private City city;
	
	@ManyToOne
	@JoinColumn(name= "id_area")
	private Area area;
	
	@ManyToOne
	@JoinColumn(name= "id_programs")
	private Programs programs;
	
	private String comments;
	
}

