import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import baserUrl from '../helper';

@Injectable({
  providedIn: 'root'
})
export class ProgramsService {

  constructor(private httpClient: HttpClient) {}

  public  getAllprograms(): Observable<any[]> {
    return this.httpClient.get<any[]>(`${baserUrl}/programs/`);
  }

  public getProgramsById(id: number): Observable<any> {
    return this.httpClient.get<any[]>(`${baserUrl}/programs/${id}`);
  }

  public getProgramsByArea(id_area: number): Observable<any> {
    return this.httpClient.get<any[]>(`${baserUrl}/programs/area/`+id_area);
  }
}
