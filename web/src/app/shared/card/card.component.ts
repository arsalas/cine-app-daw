import { Component, Input, OnInit } from '@angular/core';

@Component({
    selector: 'app-card',
    templateUrl: './card.component.html',
    styleUrls: ['./card.component.css']
})
export class CardComponent implements OnInit {

    @Input('id') id = 0;
    @Input('title') title = '';
    @Input('overview') overview = '';
    @Input('posterPath') posterPath = '';
    @Input('voteAverage') voteAverage = 0;

    constructor() { }

    ngOnInit() {
        this.overview = this.overview.split(' ').slice(0, 15).join(' ') + '...';
    }

}
