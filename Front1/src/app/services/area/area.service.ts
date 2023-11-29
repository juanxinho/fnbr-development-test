import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import baserUrl from '../helper';

@Injectable({
  providedIn: 'root'
})
export class AreaService {

  constructor(private httpClient: HttpClient) { }

  public getAllAreas(): Observable<any[]> {
    return this.httpClient.get<any[]>(`${baserUrl}/area/`);
  }

  public getAreasById(id: number): Observable<any> {
    return this.httpClient.get<any[]>(`${baserUrl}/area/${id}`);
  }

}
