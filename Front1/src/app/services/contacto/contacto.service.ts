import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import baserUrl from '../helper';

@Injectable({
  providedIn: 'root'
})
export class ContactoService {

  constructor(private httpClient: HttpClient) {}

    public crearContacto(contacto: any){
     return this.httpClient.post(`${baserUrl}/contacto/crear`, contacto);
    }
   }