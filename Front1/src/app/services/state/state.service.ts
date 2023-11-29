import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import baserUrl from '../helper';
import { Observable } from 'rxjs';
import Long from 'long';


@Injectable({
  providedIn: 'root'
})
export class StateService {

  constructor(private httpClient: HttpClient) {}

  public getAllstates(): Observable<any[]> {
    return this.httpClient.get<any[]>(`${baserUrl}/state/`);
  }

  public getStatesById(id: number): Observable<any> {
    return this.httpClient.get<any[]>(`${baserUrl}/state/${id}`);
  }

  public getStatesByCountry(id_country: number): Observable<any> {
    return this.httpClient.get<any[]>(`${baserUrl}/state/country/`+id_country);
  }
}
