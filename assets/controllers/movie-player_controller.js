import { Controller } from "stimulus";
import ReactDOM from 'react-dom/client';
import React from 'react';
import YoutubePlayer from '../components/YoutubePlayer';

export default class extends Controller
{
    static values = {
        videos: Array
    }

    connect() {
        ReactDOM
            .createRoot(this.element.querySelector('#modal-youtube-player'))
            .render(<YoutubePlayer videos={this.videosValue} />)
        ;
    }
} 