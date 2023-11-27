package PruebaFuniber.Back.Config;

import io.swagger.v3.oas.annotations.OpenAPIDefinition;
import io.swagger.v3.oas.annotations.info.Contact;
import io.swagger.v3.oas.annotations.info.Info;
import io.swagger.v3.oas.annotations.info.License;
import io.swagger.v3.oas.models.annotations.OpenAPI30;

/*
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.web.bind.annotation.RestController;

import springfox.documentation.builders.PathSelectors;
import springfox.documentation.builders.RequestHandlerSelectors;
import springfox.documentation.spi.DocumentationType;
import springfox.documentation.spring.web.plugins.Docket;
import springfox.documentation.swagger2.annotations.EnableSwagger2;
*/
@OpenAPIDefinition(
		info= @Info(
				title="Formulario API",
				description="Creacion de contacto",
				summary="Esta api está hecha para obtener paises,ciudades,estados, departamentos,areas y crear el contacto",
				contact= @Contact(
						name="Christian Burgos",
						email= "christianane23@gmail.com"
				),
				version = "v1"
				)
		)
public class SwaggerConfig {
/*
    @Bean
    Docket api() {
		return new Docket(DocumentationType.SWAGGER_2)
				.select()
				.apis(RequestHandlerSelectors.withClassAnnotation(RestController.class))
				.paths(PathSelectors.any())
				.build();
	}*/
}