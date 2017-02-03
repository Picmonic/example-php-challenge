import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

@Injectable()
export class ApiService {

  constructor(private http: Http) { }
  getStuff() {
    return this.http.get('http://homestead.app/api/commits')
      .map(response => response.json())
  }
}
