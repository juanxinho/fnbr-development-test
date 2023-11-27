import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import baserUrl from '../helper';



@Injectable({
  providedIn: 'root'
})
export class CityService {

  constructor(private httpClient: HttpClient) {}

  public getAllcities(): Observable<any[]> {
    return this.httpClient.get<any[]>(`${baserUrl}/city/`);
  }

  public getCitiesById(id: number): Observable<any> {
    return this.httpClient.get<any[]>(`${baserUrl}/city/${id}`);
  }

  public getCitiesByState(id_state: number): Observable<any> {
    return this.httpClient.get<any[]>(`${baserUrl}/city/state/${id_state}`);
  }
}
