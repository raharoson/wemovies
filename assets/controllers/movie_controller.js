import { Controller } from 'stimulus';
import ReactDOM from 'react-dom/client';
import React from 'react';
import YoutubePlayer from '../components/YoutubePlayer';

export default class extends Controller {
    static targets = ['movieItem'];

    static values = {
        movieId: Number,
        videos: Array,
        url: String,
    }

    connect() {
        ReactDOM
            .createRoot(this.element.querySelector('#youtube-player'))
            .render(<YoutubePlayer videos={this.videosValue} />)
        ;
    }

    showMovie(event) {
        this.movieIdValue = event.currentTarget.dataset.movieId;
    }

    async movieIdValueChanged() {
        const response = await fetch(`${this.urlValue}?movie_id=${this.movieIdValue}`);
        this.element.querySelector('.modal-body').innerHTML = await response.text();
    }
}