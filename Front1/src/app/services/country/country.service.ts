import { EventEmitter, Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { BehaviorSubject, Observable } from 'rxjs';
import baserUrl from '../helper';
import Long from 'long';

@Injectable({
  providedIn: 'root'
})
export class CountryService {
  
  constructor(private httpClient: HttpClient) { }

  public getAllcountries(): Observable<any[]> {
    return this.httpClient.get<any[]>(`${baserUrl}/country/`);
  }

  public getCountriesById(id: Long): Observable<any> {
    return this.httpClient.get<any[]>(`${baserUrl}/country/${id}`);
  }

}