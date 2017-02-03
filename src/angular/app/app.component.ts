import { Component, OnInit } from '@angular/core';

import { ApiService } from './core/api.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {
  constructor(private api: ApiService) { }
  ngOnInit() {
    this.api.getStuff().subscribe(stuff => console.log(stuff));
  }
}
