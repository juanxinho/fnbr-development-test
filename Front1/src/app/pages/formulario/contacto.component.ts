import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import { ContactoService } from '../../services/contacto/contacto.service';
import { MatSnackBar } from '@angular/material/snack-bar';
import Swal from 'sweetalert2';
import { CountryService } from '../../services/country/country.service';
import { StateService } from '../../services/state/state.service';
import { CityService } from '../../services/city/city.service';
import { AreaService } from '../../services/area/area.service';
import { ProgramsService } from '../../services/programs/programs.service';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-contacto',
  templateUrl: './contacto.component.html',
  styleUrl: './contacto.component.css'
})
export class ContactoComponent implements OnInit {
  
  contactoForm !: FormGroup
  country:any;
  state:any;
  city:any;
  area:any;
  programs:any;

  constructor(
    public fb: FormBuilder,
    public CountryService: CountryService,
    public StateService: StateService,
    public CityService: CityService,
    public AreaService: AreaService,
    public ProgramsService: ProgramsService,
    public ContactoService: ContactoService,
    private httpClient:HttpClient,
    private snack:MatSnackBar){}

  ngOnInit():void{

    this.contactoForm = this.fb.group({
      name : ['',Validators.required],
      lastname : ['',Validators.required],
      email : ['',Validators.required,],
      telefono : ['',Validators.required],
      country : ['',Validators.required],
      state : ['',Validators.required],
      city : [''],
      area : ['',Validators.required],
      programs : ['',Validators.required],
      comments :['',''],
      acceptTerms: [false, Validators.requiredTrue],
    });

    this.CountryService.getAllcountries().subscribe(resp=>{
      this.country= resp
    });
    
    this.contactoForm.get('country')?.valueChanges.subscribe(value=>{
       this.StateService.getStatesByCountry(value.id).subscribe(resp=>{
       this.state=resp;
    },
    );
   
    });

    this.contactoForm.get('state')?.valueChanges.subscribe(value=>{
      this.CityService.getCitiesByState(value.id).subscribe(resp=>{
      this.city=resp;
   },
   );
  
   });
    
    this.AreaService.getAllAreas().subscribe(resp=>{
      this.area=resp
    });

    this.contactoForm.get('area')?.valueChanges.subscribe(value=>{
      this.ProgramsService.getProgramsByArea(value.id).subscribe(resp=>{
      this.programs=resp;
   },
   );
  
   });
  }
  

  formSubmit() {
   
    const isFormIncomplete = Object.values(this.contactoForm.value).some(value => value === '');
  
    const isCheckboxChecked = this.contactoForm.get('acceptTerms')?.value;
  
    if (isFormIncomplete || !isCheckboxChecked) {
      this.snack.open('Faltan campos por completar o el checkbox no está marcado', 'Aceptar', {
        duration: 3000
      });
      return;
    }
  
    if (this.contactoForm.valid) {
      this.ContactoService.crearContacto(this.contactoForm.value).subscribe(
        (data) => {
          console.log(data);
          Swal.fire('Formulario enviado', 'Formulario enviado con éxito', 'success');
          this.limpiarCampos();
        },
        (error) => {
          console.log(error);
          this.snack.open('Ha ocurrido un error en el sistema !!', 'Aceptar', {
            duration: 3000
          });
        }
      );
    } else {
      this.snack.open('Faltan campos por completar o el checkbox no está marcado', 'Aceptar', {
        duration: 3000
      });
    }
  }

  limpiarCampos(){
    this.contactoForm = this.fb.group({
      name : '',
      lastname : '',
      email : '',
      telefono :'',
      country : null,
      state : null,
      city : null,
      area : null,
      programs : null,
      comments :'',
      acceptTerms: false,
    });
    this.state = null;
    this.city = null;
    this.programs = null;
  }
}
